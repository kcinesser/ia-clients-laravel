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

Route::group(['middleware' => 'auth'], function(){
    // Route::get('/clients', 'ClientsController@index');
    // Route::get('/clients/create', 'ClientsController@create');
    // Route::post('/clients', 'ClientsController@store');
    // Route::get('/clients/{client}', 'ClientsController@show');
    // Route::get('/clients/{client}/edit', 'ClientsController@edit');
    // Route::patch('/clients/{client}', 'ClientsController@update');

    Route::resource('clients', 'ClientsController');

    Route::get('/projects', 'ProjectsController@index');
    Route::get('/clients/{client}/projects/create', 'ProjectsController@create');
    Route::get('/clients/{client}/projects/{project}', 'ProjectsController@show');
    Route::get('/clients/{client}/projects/{project}/edit', 'ProjectsController@edit');
    Route::post('/clients/{client}/projects', 'ProjectsController@store');
    Route::patch('/clients/{client}/projects/{project}', 'ProjectsController@update');
    
    Route::post('/clients/{client}/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/clients/{client}/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

    Route::get('/clients/{client}/projects/{project}/domains/create', 'DomainsController@create');
    Route::post('/clients/{client}/projects/{project}/domains', 'DomainsController@store');


    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();