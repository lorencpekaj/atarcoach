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

Route::auth();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');

	Route::get('/subject/select', 'UserSubjectController@index')->name('usersubject.index');
	Route::post('/subject/select', 'UserSubjectController@store')->name('usersubject.store');

});

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::group(['middleware' => 'api:auth'], function () {

		Route::get('/subjects', 'SubjectController@index'); // unused

    });
});
