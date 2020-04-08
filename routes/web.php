<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::resource('student', 'StudentController');
Route::get('/', 'StudentController@index')->middleware('auth');
Route::get('/create','StudentController@create');
Route::post('/create','StudentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
