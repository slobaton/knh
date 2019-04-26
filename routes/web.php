<?php
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
    Route::get(
        'partners/{partner}/contacts/create',
        'ContactController@create'
    );
    Route::get(
        'partners/{partner}/contacts/edit/{contact}',
        'ContactController@edit'
    );
    Route::post('contacts.store', 'ContactController@store')
        ->name('contacts.store');
    Route::post('contacts.update', 'ContactController@update')
        ->name('contacts.update');
    Route::delete('contacts/{contact}', 'ContactController@destroy')
        ->name('contacts.destroy');

    Route::get('partners.data', 'PartnerController@getPartners')
        ->name('partners.data');

    //projects
    Route::resource('projects','ProjectController');
    Route::get('projects/{project}/upload', 'ProjectController@uploadForm')
        ->name('projects.upload');
    Route::post('project/{project}/file', 'ProjectController@uploadFile')
        ->name('projects.upload.file');
    Route::get('projects.data', 'ProjectController@getProjects')
        ->name('projects.data');
    Route::get('projects/{project}/documents', 'ProjectController@getDocuments')
        ->name('projects.documents');

    //documents
    Route::resource('documents', 'DocumentController');
});
