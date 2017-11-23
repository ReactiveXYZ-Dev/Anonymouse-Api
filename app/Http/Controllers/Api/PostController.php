<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PushNotification;

class PostController extends Controller
{
	/**
	 * Get all posts with optional timestamp
	 * @param  Request $request
	 * @return HTTPResponse
	 */
	public function show(Request $request)
	{
		$timestamp = $request->input('timestamp');
		$posts = [];

		if ($timestamp) {
			$date = Carbon::createFromTimestampUTC($timestamp);
			$posts = Post::where('created_at', '>', $date)->get();
		} else {
			$posts = Post::all();
		}

		return response()->json([
			'status' => 'success',
			'message' => 'Fetched all posts!',
			'data' => [
				'posts' => $posts
			]
		]);
	}

	/**
	 * Create a new post
	 * @param  Request $request
	 * @return HTTPResponse
	 */
    public function create(Request $request)
    {
    	$user = $request->user();
    	$created = $user->posts()->create([
    		'content' => $request->input('content')
    	]);
    	$response = [];
    	if ($created) {
    		$response = [
    			'status' => 'success',
    			'message' => 'Post created!'
    		];
    	} else {
    		$response = [
    			'status' => 'error',
    			'message' => "Failed to create post!"
    		];
    	}
    	return response()->json($response);
    }

    /**
     * Like a post
     * @param  Request $request
     * @return HTTPResponse
     */
    public function like(Request $request, $postId)
    {
    	$post = Post::find($postId);

    	if (!$post) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such post!'
    		]);
    	}

    	$post->likes++;
    	$post->save();

    	return response()->json([
    		'status' => 'success',
    		'message' => 'Successfully liked the post!'
    	]);
    }

    /**
     * Dislike a post
     * @param  Request $request
     * @return HTTPResponse
     */
    public function dislike(Request $request, $postId)
    {
    	$post = Post::find($postId);

    	if (!$post) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such post!'
    		]);
    	}

    	$post->dislikes++;
    	$post->save();

    	return response()->json([
    		'status' => 'success',
    		'message' => 'Successfully disliked the post!'
    	]);
    }
}
