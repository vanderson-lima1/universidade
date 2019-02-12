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



Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::resource('/', 'AdminController');
});

Route::group(['prefix' => 'institution','namespace' => 'Institution'], function () {
    Route::resource('institutions', 'InstitutionsController');
    Route::resource('unities', 'UnitiesController');
    Route::resource('patients', 'PatientsController');
    Route::resource('courses' , 'CoursesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('teachers', 'TeachersController');
    Route::resource('students', 'StudentsController');
    Route::resource('employees', 'EmployeesController');
});

Auth::routes();

Route::get('/', function () {
    Auth::logout();
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

/* Configuração estável = 02/02/2019 *** Backup

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::resource('institutions', 'InstitutionsController');
});

Route::group(['prefix' => 'institution','namespace' => 'Institution'], function () {
    Route::resource('unities', 'UnitiesController');
    Route::resource('patients', 'PatientsController');
    Route::resource('courses' , 'CoursesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('teachers', 'TeachersController');
    Route::resource('students', 'StudentsController');
}); */