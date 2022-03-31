<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FullCalenderController;
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

Route::prefix('dashboard')
    ->group(function () {
    });

Route::middleware('auth')
    ->prefix('dashboard')
    ->group(function () {
        Route::resource('profile', 'DoctorController');
        // Route::get('profile/edit', 'DoctorController@edit')->name('profile.edit');
        // Route::patch('profile', 'DoctorController@update')->name('profile.update');
        // Route::get('profile', 'DoctorController@index')->name('profile.show');
        // Route::delete('profile/delete/${id}', 'DoctorController@destroy')->name('profile.destroy');
    
        Route::resource('reviews', 'ReviewController');

        Route::resource('messages', 'MessageController');

        Route::resource('services', 'ServiceController');

        Route::resource('specializations', 'SpecializationController');
    });
Route::get("{any?}", function ($name = null) {
    return view("guest.home");
})->where("any", ".*")->name('default');
