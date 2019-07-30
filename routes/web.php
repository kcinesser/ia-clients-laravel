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
    Route::resource('clients.sites.domains', 'DomainsController');
    Route::resource('clients.jobs.updates', 'UpdatesController');
    Route::resource('services', 'ServicesController');

    Route::get('/jobs', 'JobsController@index');
    Route::patch('/clients/{client}/jobs/{job}/notes', 'JobsController@notes');
    Route::patch('/clients/{client}/sites/{site}/notes', 'SitesController@notes');
    
    Route::post('/clients/{client}/jobs/{job}/tasks', 'TasksController@store');
    Route::patch('/clients/{client}/jobs/{job}/tasks/{task}', 'TasksController@update');

    Route::post('/comment/{model}/{id}', 'CommentsController@store')->where('model', ('client|job|site'));
    Route::patch('/comment/{comment}', 'CommentsController@update');
    Route::post('/software_license/{model}/{id}', 'SoftwareLicensesController@store')->where('model', ('job|site'));
    Route::patch('/software_license/{software_license}', 'SoftwareLicensesController@update');
    Route::delete('/software_license/{software_license}', 'SoftwareLicensesController@destroy');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index');

    Route::resource('user', 'UserController');

    Route::get('/', 'DashboardController@index');

});

Auth::routes();