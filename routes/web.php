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
Route::resource('profile', 'DoctorController')->middleware('auth');

Route::resource('reviews', 'ReviewController')->middleware('auth');

<<<<<<< HEAD

=======
>>>>>>> c2f3966bea645e47a0ec1eb7bc363b7e437ca94b
Route::resource('messages', 'MessageController')->middleware('auth');

Route::resource('services', 'ServiceController')->middleware('auth');

Route::resource('specializations', 'SpecializationController')->middleware('auth');

Route::get("{any?}", function ($name = null) {
    return view("guest.home");
})->where("any", ".*")->name('default');
