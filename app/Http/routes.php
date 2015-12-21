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

Route::get('/', function () {
    return "Welcome";
});

// --------------------Client------------------------------
Route::get('client', 'ClientController@index');
Route::post('client', 'ClientController@store');
Route::get('client/{id}', 'ClientController@show');
Route::put('client/{id}', 'ClientController@update');
Route::delete('client/{id}', 'ClientController@destroy');
// --------------------User--------------------------------
Route::get('user', 'UserController@index');
Route::post('user', 'UserController@store');
Route::get('user/{id}', 'UserController@show');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@destroy');
// --------------------Project-----------------------------
Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::delete('project/{id}', 'ProjectController@destroy');
// --------------------ProjectTask-----------------------------
Route::get('project/{projectId}/tasks', 'ProjectTaskController@tasks');
Route::post('project/{projectId}/tasks', 'ProjectTaskController@storeTask');
Route::get('project/{projectId}/tasks/{id}', 'ProjectTaskController@showTask');
Route::put('project/{projectId}/tasks/{id}', 'ProjectTaskController@updateTask');
Route::delete('project/{projectId}/tasks/{id}', 'ProjectTaskController@destroyTask');
Route::get('project/{id}/members', 'ProjectController@members');
Route::post('project/{id}/members', 'ProjectController@addMember');
Route::delete('project/{id}/members/{member}', 'ProjectController@removeMember');
Route::get('project/{id}/members/{member}', 'ProjectMembersController@isMember');
