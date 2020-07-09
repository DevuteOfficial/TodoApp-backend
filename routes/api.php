<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/login', "AuthController@login");
Route::post('/v1/register', "AuthController@register");
Route::middleware('auth:api')->post('/v1/logout', "AuthController@logout");

Route::middleware('auth:api')->prefix("/v1")->group(function () {


    Route::get('todos', 'TodosController@index');
    Route::post('todo', 'TodosController@store');
    Route::post('todo/{todo}/image', 'TodosController@image');
    Route::patch('todo/{todo:id}', 'TodosController@update');
    Route::delete('todo/{todo_id}', 'TodosController@destroy');


    Route::post('todo/{todo_id}/task', 'TasksController@store');
    Route::patch('todo/{todo_id}/task/{task_id}', 'TasksController@update');
    Route::delete('todo/{todo_id}/task/{task_id}', 'TasksController@destroy');

    Route::post('task/{task_id}/note', 'NotesController@store');
    Route::patch('task/{task_id}/note/{note_id}', 'NotesController@update');
    Route::delete('task/{task_id}/note/{note_id}', 'NotesController@destroy');

});



Route::apiResource('todo.task', "TasksController");