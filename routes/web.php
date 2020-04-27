<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    Route::resource('students', 'StudentController');
    Route::get('/', 'StudentController@index');
    Route::get('/graph' , 'StudentController@chart')->name('chart');
    Route::get('/students/{student}','StudentController@show')->name('show');
    Route::get('/students/{student}/edit', 'StudentController@edit')->name('edit');
    Route::get('/fetch' , 'StudentController@fetch')->name('student.fetch');
    Route::get('/students/check/{id}/{hasChecked}' , 'StudentController@checkStar')->name('check');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/oop' , 'StudentController@oop');
