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
    Route::resource('activities', 'ActivitiesController')->only(['index']);
    Route::resource('clients', 'ClientsController');
    Route::resource('registrars', 'RegistrarsController');
    Route::get('/clients/{client}/jobs/archives', 'JobsController@archives');
    Route::patch('/clients/{client}/jobs/{job}/archive', 'JobsController@archive');
    Route::resource('clients.jobs', 'JobsController');
    Route::resource('clients.sites', 'SitesController');
    Route::resource('clients.jobs.software-license', 'SoftwareLicensesController')->only(['store', 'update', 'destroy']);
    Route::resource('clients.jobs.updates', 'UpdatesController');
    Route::resource('services', 'ServicesController');

    Route::get('/jobs', 'JobsController@index');
    Route::patch('/clients/{client}/jobs/{job}/notes', 'JobsController@notes');
    Route::patch('/clients/{client}/sites/{site}/notes', 'SitesController@notes');
    
    Route::post('/clients/{client}/jobs/{job}/tasks', 'ProjectTasksController@store');
    Route::patch('/clients/{client}/jobs/{job}/tasks/{task}', 'ProjectTasksController@update');

    Route::post('/comment/{model}/{id}', 'CommentsController@store')->where('model', ('client|job'));
    Route::patch('/comment/{comment}', 'CommentsController@update');

    Route::get('/clients/{client}/sites/{site}/domains/create', 'DomainsController@create');
    Route::get('/clients/{client}/sites/{site}/domains/{domain}', 'DomainsController@show');
    Route::post('/clients/{client}/sites/{site}/domains', 'DomainsController@store');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index');

    Route::get('/user/create', 'UserController@create');
    Route::post('/user', 'UserController@store');

    Route::get('/', 'DashboardController@index');

});

Auth::routes();