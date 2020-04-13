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


Route::group(['middleware' => ['auth']], function () {
    Route::resource('student', 'StudentController');
    Route::get('/', 'StudentController@index');
    Route::get('/graph' , 'StudentController@chart')->name('chart');
    Route::get('/student/{student}','StudentController@show')->name('show');
    Route::get('/student/{student}/edit', 'StudentController@edit')->name('edit');
    
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
