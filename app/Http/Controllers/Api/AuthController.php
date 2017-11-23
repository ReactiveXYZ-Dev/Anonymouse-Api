<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	/**
	 * Should be called ONLY ONCE per user
	 * Setup public key, registration id, and screen name (default to Anonymouse)
	 * @param  Request $request Incoming HTTP Request
	 * @return HTTPResponse
	 */
    public function register(Request $request)
    {
    	// extract attributes
    	$screenName = $request->input('screen_name') ?: "Anonymouse";
    	$publicKey = $request->input('public_key');
    	$deviceId = $request->input('apn_reg_id');
    	// validate
    	if (!$publicKey) {
    		return response()->json([
    			'status' => 'error',
    			'message' => 'Requires public key!'
    		]);
    	}
    	// generate api token
    	$apiToken = str_random(60);
    	try {
    		// create new user
    		$user = new User;
    		$user->fill([
    			'screen_name' => $screenName,
    			'public_key' => $publicKey,
    			'apn_reg_id' => $deviceId,
    		]);
    		$user->api_token = $apiToken;
    		$user->save();

    		return response()->json([
    			'status' => 'success',
    			'message' => 'Registration success!',
    			'data' => [
    				'api_token' => $apiToken
    			]
    		]);
    	} catch (Exception $e) {
    		// catch error
    		return response()->json([
    			'status' => 'error',
    			'message' => sprintf("Cannot register user with error: %s", $e->getMessage())
    		]);
    	}
    }
}
