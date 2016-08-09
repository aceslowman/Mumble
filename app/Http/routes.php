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

Route::get('/','HomeController@showWelcome');
Route::post('/','AuthController@login');
Route::get('logout','AuthController@logout');

Route::get('/people',['middleware' => 'auth','uses' =>'PeopleController@showIndex']);
Route::get('/people/{user_id}',['middleware' => 'auth','uses' =>'PeopleController@showProfile']);
Route::get('/projects',['middleware' => 'auth','uses' =>'ProjectController@showIndex']);
Route::get('/projects/{project}',['middleware' => 'auth','uses' =>'ProjectController@showProject']);

Route::get('/bulletin',['middleware' => 'auth','uses' =>'ForumController@showBulletin']);
Route::get('/library',['middleware' => 'auth','uses' =>'LibraryController@showIndex']);

Route::post('/update/user/{user_id}',['middleware' => 'auth','uses' =>'PeopleController@update']);