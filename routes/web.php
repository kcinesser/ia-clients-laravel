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
    Route::get('/clients/archives', 'ClientsController@archives');
    Route::resource('clients', 'ClientsController');
    Route::resource('registrars', 'RegistrarsController');
    Route::get('/clients/{client}/jobs/archives', 'JobsController@archives');
    Route::patch('/clients/{client}/jobs/{job}/archive', 'JobsController@archive');
    Route::patch('/clients/{client}/sites/{site}/archive', 'SitesController@archive');
    Route::get('/clients/{client}/sites/archives', 'SitesController@archives');
    Route::patch('/clients/{client}/archive', 'ClientsController@archive');
    Route::resource('clients.jobs', 'JobsController');
    Route::get('/clients/{client}/client-sites', 'ClientsController@clientSites');
    Route::resource('clients.sites', 'SitesController');
    Route::resource('clients.sites.domains', 'DomainsController');
    Route::resource('clients.sites.updates', 'UpdatesController');
    Route::post('clients/{client}/sites/{site}/mma-update', 'UpdatesController@mma');
    Route::resource('services', 'ServicesController');
    Route::resource('hosting', 'HostingController');

    Route::get('/jobs/archives', 'JobsController@all_archives');
    Route::get('/sites/archives', 'SitesController@all_archives');
    Route::patch('/clients/{client}/jobs/{job}/notes', 'JobsController@notes');
    Route::patch('/clients/{client}/sites/{site}/notes', 'SitesController@notes');
    Route::patch('/clients/{client}/sites/{site}/services', 'SitesController@services');
    Route::patch('/clients/{client}/notes', 'ClientsController@notes');

    Route::post('/clients/{client}/jobs/{job}/tasks', 'TasksController@store');
    Route::patch('/clients/{client}/jobs/{job}/tasks/{task}', 'TasksController@update');

    Route::post('/comment/{model}/{id}', 'CommentsController@store')->where('model', ('client|job|site'));
    Route::patch('/comment/{comment}', 'CommentsController@update');
    Route::post('/software_license/{model}/{id}', 'SoftwareLicensesController@store')->where('model', ('job|site'));
    Route::patch('/software_license/{software_license}', 'SoftwareLicensesController@update');
    Route::delete('/software_license/{software_license}', 'SoftwareLicensesController@destroy');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index');
    Route::get('/mma', 'SitesController@mma');

    Route::resource('user', 'UserController')->only(['create', 'store', 'edit', 'update', 'destroy']);

    Route::get('/', 'DashboardController@index');

    Route::get('/toolkit', 'ToolkitController@index');

    Route::get('/sort', 'FilterController@sort');
    Route::get('/filter', 'FilterController@filter');

});

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');