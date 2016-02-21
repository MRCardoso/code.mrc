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
// OAuth generate token
Route::post('oauth/access_token', function(){
    return response()->json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function()
{
    /*
     | -----------------------------------------------------------------------------------------------------------------
     | Client routes
     | -----------------------------------------------------------------------------------------------------------------
     */
    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
    /*
     | -----------------------------------------------------------------------------------------------------------------
     | User routes
     | -----------------------------------------------------------------------------------------------------------------
     */
    Route::resource('user', 'UserController', ['except' => ['create', 'edit']]);
    /*
     | -----------------------------------------------------------------------------------------------------------------
     | Project routes
     | -----------------------------------------------------------------------------------------------------------------
     */
    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
    /*
     * Task and members
     */
    Route::group(['prefix' => 'project'], function()
    {
        /*
         | -----------------------------------------------------------------------------------------------------------------
         | ProjectTask routes
         | -----------------------------------------------------------------------------------------------------------------
         */
        Route::get('{projectId}/tasks', 'ProjectTaskController@tasks');
        Route::post('{projectId}/tasks', 'ProjectTaskController@storeTask');
        Route::get('{projectId}/tasks/{id}', 'ProjectTaskController@showTask');
        Route::put('{projectId}/tasks/{id}', 'ProjectTaskController@updateTask');
        Route::delete('{projectId}/tasks/{id}', 'ProjectTaskController@destroyTask');
        /*
         | -----------------------------------------------------------------------------------------------------------------
         | ProjectMember routes
         | -----------------------------------------------------------------------------------------------------------------
         */
        Route::get('{id}/members', 'ProjectMembersController@members');
        Route::post('{id}/members', 'ProjectController@addMember');
        Route::delete('{id}/members/{member}', 'ProjectController@removeMember');
        Route::get('{id}/members/{member}', 'ProjectMembersController@isMember');
    });
});