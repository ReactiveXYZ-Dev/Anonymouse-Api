<?php

namespace App\Http\Controllers\Api;

use App\{Post, Comment};
use Illuminate\Http\Request;
use App\Jobs\SendPushNotification;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
	/**
	 * Show all comments under a certain post
	 * @param  Request $request
	 * @param  Integer  $postId  Parent post id
	 * @return HTTPResponse
	 */
    public function show(Request $request, $postId)
    {
    	$post = Post::find($postId);

    	if (!$post) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such post!'
    		]);
    	}

    	return response()->json([
    		'status' => 'success',
    		'message' => 'Fetched all comments',
    		'data' => $post->comments()->with('replies')->get()
    	]);
    }

    /**
     * Create a new top-level comment
     * @param  Request $request
     * @return HTTPResponse
     */
    public function create(Request $request, $postId)
    {
    	$post = Post::find($postId);

    	if (!$post) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such post!'
    		]);
    	}

    	$created = $post->comments()->create([
    		'content' => $request->content,
            'user_id' => $request->user()->id
    	]);

    	$response = [];
    	if ($created) {
    		$response = [
    			'status' => 'success',
    			'message' => 'Comment created!'
    		];
            // notify the author of the post
            dispatch(
                (new SendPushNotification(
                    $post->author()->first(),
                    "New comment",
                    $created->content)
                )->onQueue('push-notification')
            );

    	} else {
    		$response = [
    			'status' => 'error',
    			'message' => "Failed to create comment!"
    		];
    	}

    	return response()->json($response);
    }

    /**
     * Create a reply to a specific comment
     * @param  Request $request  
     * @param  Integer  $postId    Parent post id
     * @param  Integer  $commentId Reply to id
     * @return HTTPResponse
     */
    public function reply(Request $request, $postId, $commentId)
    {
    	$post = Post::find($postId);

    	if (!$post) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such post!'
    		]);
    	}

    	$comment = Comment::find($commentId);

    	if (!$comment) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'No such comment!'
    		]);
    	}

    	$created = $comment->replies()->create([
    		'content' => $request->content
    	]);

    	$response = [];
    	if ($created) {
    		$response = [
    			'status' => 'success',
    			'message' => 'Reply created!'
    		];
            // notify the author of the reply
            dispatch(
                (new SendPushNotification(
                    $post->author()->first(),
                    "New reply",
                    $created->content)
                )->onQueue('push-notification')
            );
    	} else {
    		$response = [
    			'status' => 'error',
    			'message' => "Failed to create reply!"
    		];
    	}

    	return response()->json($response);
    }

}
