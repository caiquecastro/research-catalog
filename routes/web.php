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

Route::view('/', 'index');

Route::resource('roles', 'RolesController');
Route::resource('subjects', 'SubjectsController');
Route::resource('keywords', 'KeywordsController');
Route::resource('projects', 'ProjectsController');
Route::resource('researchers', 'ResearchersController');
