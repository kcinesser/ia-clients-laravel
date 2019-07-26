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

Route::group(['middleware' => 'auth'], function(){
    Route::resource('clients', 'ClientsController');
    Route::resource('registrars', 'RegistrarsController');
    Route::resource('clients.projects', 'ProjectsController');
    Route::resource('clients.projects.updates', 'UpdatesController');
    Route::resource('services', 'ServicesController');

    Route::get('/projects', 'ProjectsController@index');
    Route::patch('/clients/{client}/projects/{project}/notes', 'ProjectsController@notes');
    
    Route::post('/clients/{client}/projects/{project}/tasks', 'ProjectTasksController@store');
    Route::patch('/clients/{client}/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

    Route::post('/comment/{model}/{id}', 'CommentsController@store')->where('model', ('client|project'));
    Route::patch('/comment/{comment}', 'CommentsController@update');

    Route::get('/clients/{client}/projects/{project}/domains/create', 'DomainsController@create');
    Route::get('/clients/{client}/projects/{project}/domains/{domain}', 'DomainsController@show');
    Route::post('/clients/{client}/projects/{project}/domains', 'DomainsController@store');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index');

    Route::resource('user', 'UserController');

    Route::get('/', 'DashboardController@index');

});

Auth::routes();