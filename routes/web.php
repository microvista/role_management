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

// Roles
Route::get('/', 'RolesController@index');
Route::get('roles', 'RolesController@index');
Route::get('roles/add', 'RolesController@create');
Route::put('role/store', 'RolesController@store');
Route::get('role/delete/{id}', 'RolesController@destroy');
Route::get('role/edit/{id}', 'RolesController@edit');
Route::get('role/update/{id}', 'RolesController@update');

// Actions 
Route::get('actions', 'ActionsController@index');