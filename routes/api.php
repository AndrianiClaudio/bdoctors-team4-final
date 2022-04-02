<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | API Routes |-------------------------------------------------------------------------- | | Here is where you can register API routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | is assigned the "api" middleware group. Enjoy building your API! | */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->namespace('Api')
    ->group(function () {
        Route::get('doctors', 'DoctorController@index');
        Route::get('doctors/{slug}', 'DoctorController@show');
        Route::post('doctors/{slug}/message', 'DoctorController@newMessage');
        Route::post('doctors/{slug}/review', 'DoctorController@newReview');
        Route::post('doctors', 'DoctorController@filterSpec');

        Route::get('specializations', 'SpecializationController@index');

        Route::get('doctors/paginate/testCla', 'DoctorController@sliderPaginate');
    });
