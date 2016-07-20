<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Creates the authentication routes
Route::auth();

// Creates the index route (GET)
Route::get('/', 'HomeController@index')->middleware('guest');

// Authenticated user routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->middleware('forceSubject');

	Route::get('/subject/select', 'UserSubjectController@index')->name('usersubject.index');
	Route::post('/subject/select', 'UserSubjectController@store')->name('usersubject.store');

});

// API
Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::group(['middleware' => 'api:auth'], function () {

		Route::get('/subjects', 'SubjectController@index'); // unused

    });
});
