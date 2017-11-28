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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('companies', 'CompaniesController');
    Route::resource('employees', 'EmployeesController');
    Route::get('users{id}', 'UsersController@show')->name('users.show');
    Route::get('users', 'UsersController@index')->name('users.index');
});
