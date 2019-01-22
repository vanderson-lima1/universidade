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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'

], function () {
    Route::resource('institutions', 'InstitutionsController');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'

], function () {
    Route::resource('unities', 'UnitiesController');
});

Route::group([
    'prefix' => 'institution',
    'namespace' => 'Institution'

], function () {
    Route::resource('patients', 'PatientsController');
});