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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task',function(){
    $data=App\Task::all();

    return view('task')->with('tasks',$data);
});
Route::post('/saveTask','TaskController@store');

Route::get('/markascompleted/{id}','TaskController@updateTaskAsCompleted');

Route::get('/markasnotcompleted/{id}','TaskController@updateTaskAsNotCompleted');

Route::get('/delete/{id}','TaskController@delete');

Route::get('/update/{id}','TaskController@update');

Route::post('/updateTask','TaskController@updateTask');