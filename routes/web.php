<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/* Route::middleware('auth')
 ->namespace('Admin')
 ->name('admin.')
 ->prefix('admin')
 ->group(function () {
 });
 */
Route::resource('profile', 'DoctorController')->middleware('auth');

Route::resource('reviews', 'ReviewController')->middleware('auth');

//fullcalender
Route::get('fullcalendar','FullCalendarController@index')->middleware('auth')->name('calendar');
Route::post('fullcalendar/create','FullCalendarController@create');
Route::post('fullcalendar/update','FullCalendarController@update');
Route::post('fullcalendar/delete','FullCalendarController@destroy');

Route::resource('messages', 'MessageController')->middleware('auth');

Route::resource('services', 'ServiceController')->middleware('auth');

Route::get("{any?}", function ($name = null) {
    return view("guest.home");
})->where("any", ".*")->name('default');


