<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostsController@show');
Route::get('/todo', 'TodolistController@show');
Route::put('/todo/{id}/update', 'TodolistController@update');
Route::post('/todo/{id}/delete', 'TodolistController@delete');
Route::post('/todo/create', 'TodolistController@create');
