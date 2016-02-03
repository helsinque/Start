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
    return view('welcome');
});

Route::post('oauth/access_token',function(){
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware'=>'oauth'], function(){

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    /*
     * ABAIXO UM EXEMPLO DE CRIAÇÃO DE MIDDLEWARE
     *
     * Route::group(['middleware' =>'checkProjectOwner'], function(){
     *   Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
     *  });
     * */

    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' =>'project'], function(){

        Route::get('{id}/note','ProjectNoteController@index');
        Route::post('note', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}','ProjectNoteController@show');
        Route::put('{id}/note/{noteId}', 'projectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');

        Route::get('{id}/members', 'ProjectController@showMembers');

        Route::get('{id}/task', 'ProjectTaskController@index')->where('id', '[0-9].*');
        Route::post('task', 'ProjectTaskController@store');
        Route::get('{id}/task/{taskId}','ProjectTaskController@show');
        Route::put('{id}/task/{taskId}', 'projectTaskController@update');
        Route::delete('{id}/task/{taskId}', 'ProjectTaskController@destroy');//->where('taskId', '[0-9].*');


    });

});



