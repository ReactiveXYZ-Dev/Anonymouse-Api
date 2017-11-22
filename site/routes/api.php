<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->namespace('Api')->group(function() {

	// registration
	Route::post('register', 'AuthController@register');

});

Route::middleware('auth:api')->namespace('Api')->group(function () {
    
    Route::prefix('profile')->group(function() {
    	// update screen name
    	Route::put('screen-name', 'ProfileController@updateScreenName');
    });

    Route::prefix('posts')->group(function() {
    	// get posts with optional timestamp
    	Route::get('/', 'PostController@show');
    	// create new post
    	Route::post('/', 'PostController@create');
    	Route::prefix('{postId}')->group(function() {
    		// like and dislike
    		Route::post('like', 'PostController@like');
    		Route::post('dislike', 'PostController@dislike');
    		// comments
    		Route::prefix('comments')->group(function() {
    			// get all comments
    			Route::get('/', 'CommentController@show');
    			// post new comments
    			Route::post('/', 'CommentController@create');
    			// create reply
    			Route::prefix('{commentId}/replies')->group(function() {
    				Route::post('/', 'CommentController@reply');
    			});
    		});
    	});
    });
});
