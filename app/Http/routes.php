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
    
    // Create controller for exams
    Route::resource('exam', 'ExamController', ['except' => ['edit', 'update']]);

    // Create 
    Route::group(['prefix' => 'exam/{exam}'], function () {
        Route::get('results', 'ExamController@results')->name('exam.results');
            
        Route::group(['prefix' => 'question'], function () {
            Route::get('{question}', 'ExamController@showQuestion')->name('exam.question.show');
            Route::post('{question}', 'ExamController@progressQuestion')->name('exam.question.progress');
        });
    });

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('forceSubject');

	Route::get('/subject/select', 'UserSubjectController@index')->name('usersubject.index');
	Route::post('/subject/select', 'UserSubjectController@store')->name('usersubject.store');

});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    
    // Create controller for admin index
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    
    // Create controller for chapters
    Route::resource('chapter', 'Admin\ChapterController', ['except' => ['show', 'edit', 'update']]);
    
    // Create controller for questions
    Route::resource('question', 'Admin\QuestionController', ['except' => ['show', 'edit', 'update']]);
    
});

// API
Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::group(['middleware' => 'api:auth'], function () {

        // Create subject
		Route::get('/subjects', 'SubjectController@index');
		Route::get('/chapters/{id}', 'Api\ApiChapterController@show');
		
		// Modify question set information
	    Route::get('/question_set/{id}', 'Api\ApiQuestionController@show');
		Route::get('/question_set/{id}/update', 'Api\ApiQuestionController@update');

    });
});
