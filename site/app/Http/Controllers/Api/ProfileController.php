<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	/**
	 * Update an user's screen name
	 * @param  Request $request
	 * @return HTTPResponse
	 */
    public function updateScreenName(Request $request)
    {
    	// TODO 
    	// add an interval ???
    	$updated = $request->user()->update([
    		'screen_name' => $request->input('screen_name')
    	]);

    	$response = [];
    	if ($updated) {
    		$response = [
    			'status' => 'success',
    			'message' => 'Updated!'
    		];
    	} else {
    		$response = [
    			'status' => 'error',
    			'message' => 'Failed to updated!'
    		];
    	}

    	return response()->json($response);
    }
}
