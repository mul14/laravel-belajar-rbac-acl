<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index');

    Route::resource('posts', 'PostController');

    Route::resource('users', 'UserController');
    Route::resource('users.roles', 'UserRoleController');
    Route::post('users/{user}/roles', 'UserRoleController@update');
    Route::resource('users.permissions', 'UserPermissionController');
    Route::post('users/{user}/permissions', 'UserPermissionController@update');

    Route::resource('roles', 'RoleController');
    Route::get('roles/{role}/permissions', 'RolePermissionController@index');
    Route::post('roles/{role}/permissions', 'RolePermissionController@update');

});
