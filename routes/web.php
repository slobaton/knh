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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    //roles
    Route::resource('roles','RoleController');
    Route::get('roles.data', 'RoleController@getRoles')
        ->name('roles.data');

    //users
    Route::resource('users','UserController');
    Route::get('users.data', 'UserController@getUsers')
        ->name('users.data');

    //partners
    Route::resource('partners','PartnerController');
    Route::get('partners.data', 'PartnerController@getPartners')
        ->name('partners.data');

    //projects
    Route::resource('projects','ProjectController');
    Route::get('projects.data', 'ProjectController@getProjects')
        ->name('projects.data');
});
