<?php

namespace App\Http\Controllers;

use \SplTempFileObject;
use App\Subscription;
use League\Csv\Writer as CSVWriter;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Create a new sign up subscription
     * @param  Request $request
     * @return HTTPResponse
     */
    public function create(Request $request)
    {

        if (!$request->input('email')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please enter your email!'
            ]);
        }

    	$subscription = Subscription::create([
    		'email' => $request->input('email')
    	]);

    	if ($subscription) {
    		return response()->json([
    			'status' => 'success',
    			'message' => 'Signed up successfully!'
    		]);
    	}

    	return response()->json([
    			'status' => 'error',
    			'message' => 'Failed to sign up!'
    		]);
    }

    /**
     * Download subscription
     * @param  Request $request
     * @return FileResponse
     */
    public function download(Request $request)
    {
    	$csv = CSVWriter::createFromFileObject(new SplTempFileObject());
    	Subscription::chunk(50, function($subscriptions) use(&$csv) {
    		$csv->insertAll($subscriptions->toArray());
    	});

    	$csv->output(time()+'.csv');
    	exit;
    }

}
