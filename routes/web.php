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

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'index');

    Route::resource('roles', 'RolesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('keywords', 'KeywordsController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('researches', 'ResearchesController');
    Route::resource('researchers', 'ResearchersController');
});

Auth::routes();
