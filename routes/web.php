<?php

use App\Services\NamecheapDomainsService;
use App\Repositories\RemoteDomainsRepository;
use App\HostedDomain;
use App\RemoteDomain;

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
    Route::get('/clients/archives', 'ClientController@archives');
    Route::resource('clients', 'ClientController');
    Route::get('/clients/{client}/projects/archives', 'ProjectController@client_project_archives');
    Route::patch('/clients/{client}/projects/{project}/archive', 'ProjectController@archive');
    Route::patch('/clients/{client}/sites/{site}/archive', 'SiteController@archive');
    Route::get('/clients/{client}/sites/archives', 'SiteController@client_site_archives');
    Route::patch('/clients/{client}/archive', 'ClientController@archive');
    Route::resource('clients.projects', 'ProjectController')->except(['create', 'edit']);
    Route::get('/clients/{client}/client-sites', 'ClientController@clientSites');
    Route::resource('clients.sites', 'SiteController')->except(['create', 'edit']);
    Route::resource('clients.domains', 'HostedDomainController')->except(['show']);
    Route::resource('clients.sites.urls', 'SiteURLController')->only(['store', 'destroy', 'update']);
    Route::resource('clients.sites.updates', 'UpdateController')->only('store', 'update');
    Route::post('clients/{client}/sites/{site}/mma-update', 'MMAController@store');
    Route::patch('clients/{client}/sites/{site}/mma-update/{update}', 'MMAController@update');
    Route::resource('services', 'ServiceController')->only(['store', 'destroy', 'update']);
    Route::resource('hosting', 'HostingController')->only(['index','store', 'destroy', 'update']);

    Route::get('/projects', 'ProjectController@index');
    Route::get('/sites', 'SiteController@index');
    Route::get('/domains', 'HostedDomainController@index');

    Route::get('/projects/archives', 'ProjectController@all_archives');
    Route::get('/sites/archives', 'SiteController@all_archives');
    Route::patch('/clients/{client}/projects/{project}/notes', 'ProjectController@notes');
    Route::patch('/clients/{client}/sites/{site}/notes', 'SiteController@notes');
    Route::patch('/clients/{client}/sites/{site}/services', 'SiteController@services');
    Route::patch('/clients/{client}/notes', 'ClientController@notes');

    Route::post('/clients/{client}/projects/{project}/tasks', 'TaskController@store');
    Route::patch('/clients/{client}/projects/{project}/tasks/{task}', 'TaskController@update');

    Route::post('/comment/{model}/{id}', 'CommentController@store')->where('model', ('client|project|site'));
    Route::patch('/comment/{comment}', 'CommentController@update');
    Route::post('/software_license/{model}/{id}', 'SoftwareLicenseController@store')->where('model', ('project|site'));
    Route::patch('/software_license/{software_license}', 'SoftwareLicenseController@update');
    Route::delete('/software_license/{software_license}', 'SoftwareLicenseController@destroy');
    Route::post('/upload/{model}/{id}', 'UploadController@store');
    Route::delete('/upload/{upload}', 'UploadController@destroy');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index');
    Route::get('/mma', 'MMAController@mma');

    Route::resource('user', 'UserController')->only(['create', 'store', 'edit', 'update', 'destroy']);

    Route::get('/', 'DashboardController@index');

    Route::get('/toolkit', 'ToolkitController@index');

    Route::get('/sort', 'FilterController@sort');
    Route::get('/filter', 'FilterController@filter');
    Route::get('/search', 'FilterController@search');
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

// Email Preview Routes...
Route::get('mail_preview/domain_renewing/{daysOut}', function ($daysOut) {
    $remoteDomain = resolve(
        RemoteDomain::class,
        [
            'providerName' => 'Namecheap',
            'providerId' => '191284878',
            'domain' => 'jeffsdomain.com',
            'expires' => "2019-10-11T13:16:27.000Z",
            'renewAuto' => TRUE,
            'renewable' => TRUE,
            'status' => 'ACTIVE'
        ]
    );
    
    $hostedDomain = HostedDomain::with('client.accountManager')->where([
        ['remote_provider_type', RemoteDomainsProviders::Namecheap],
        ['remote_provider_id', $remoteDomain->providerId]
    ])->first();

    return new App\Mail\UpcomingDomainRenewal($remoteDomain, $hostedDomain, $daysOut);
});

Route::get('mail_preview/domain_expiring/{daysOut}', function ($daysOut) {
    $remoteDomain = resolve(
        RemoteDomain::class,
        [
            'providerName' => 'Namecheap',
            'providerId' => '191284878',
            'domain' => 'jeffsdomain.com',
            'expires' => "2019-10-11T13:16:27.000Z",
            'renewAuto' => FALSE,
            'renewable' => TRUE,
            'status' => 'ACTIVE'
        ]
        );
    
    $hostedDomain = HostedDomain::with('client.accountManager')->where([
        ['remote_provider_type', RemoteDomainsProviders::Namecheap],
        ['remote_provider_id', $remoteDomain->providerId]
    ])->first();
    
    return new App\Mail\UpcomingDomainExpiration($remoteDomain, $hostedDomain, $daysOut);
});

Route::get('testemail', function () {
    Notification::route('mail', ['info.interactive@firespring.com'])->notify(new App\Notifications\TestEmail());
});
