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


Route::group(['middleware' => ['auth', 'changepwd']], function () {
    Route::resource('students', 'StudentController');
    Route::get('/', 'StudentController@index');
    Route::get('/graph', 'StudentController@chart')->name('students.chart');
    Route::get('/students/{student}','StudentController@show')->name('students.show');
    Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
    Route::get('/fetch' , 'StudentController@fetch')->name('students.fetch');
    Route::post('/students/check' , 'StudentController@checkStar')->name('students.check');

    Route::get('/fullcalendar','FullCalendarController@index')->name('calendar');
    Route::get('/load-events','EventController@load')->name('routeLoadEvents');
    Route::put('/update-events','EventController@update')->name('routeUpdateEvents');
    Route::post('/store-events','EventController@store')->name('routeStoreEvents');
    Route::delete('/delete-events','EventController@delete')->name('routeDeleteEvents');

    Route::get('/todolist','ToDoListController@index')->name('todolists.load');
    Route::post('/store-todolist','ToDoListController@store')->name('todolists.store');
    Route::put('/complete-todoList/{itemId}', 'ToDoListController@complete')->name('todolists.complete');
    Route::put('/update-todolist/{itemId}','ToDoListController@update')->name('todolists.update');
    Route::delete('/delete-todolist/{itemId}','ToDoListController@delete')->name('todolists.delete');
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('edit-password', 'ChangePasswordController@index')->name('edit.password');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('a',function(Request $request)
// {
//     $request->session()->forget('must_change_pwd');
// });

