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

Route::get( '/'     ,'HomeController@showWelcome')->name('welcome');
Route::get( 'login' ,'HomeController@login'      )->name('show_login');
Route::post('login' ,'AuthController@login'      )->name('login');
Route::get( 'logout','AuthController@logout'     )->name('logout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/people'                ,'PeopleController@showIndex'   )->name('people_index');
	Route::get('/people/{user_id}'      ,'PeopleController@showProfile' )->name('profile');
	Route::get('/projects'              ,'ProjectController@showIndex'  )->name('project_index');
	Route::get('/projects/{project}'    ,'ProjectController@showProject')->name('project');
	Route::get('/bulletin'              ,'ForumController@showBulletin' )->name('bulletin');
	Route::get('/library'               ,'LibraryController@showIndex'  )->name('library');
	Route::post('/update/user/{user_id}','PeopleController@update'      )->name('update_user');
	Route::post('/detach/tag'           ,'TagController@detach'         )->name('detach_tag');
	Route::resource('photos','PhotoController'  );
});
