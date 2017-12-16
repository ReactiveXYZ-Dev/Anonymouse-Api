<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// show the new site UI!
Route::get('/', function() {
	return view('index');
});

// fall back to the old site UI
Route::get('/legacy', function () {
    return redirect('http://anonymouseapp.org/');
});
