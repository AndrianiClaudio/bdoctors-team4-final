<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | API Routes |-------------------------------------------------------------------------- | | Here is where you can register API routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | is assigned the "api" middleware group. Enjoy building your API! | */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->namespace('Api')
    ->group(function () {
        // return auth doctor
        Route::get('doctors', 'DoctorController@index');
        // from slug, show doctor
        Route::get('doctors/{slug}', 'DoctorController@show');
        // register a new mail in db. redirect doctor info
        Route::post('doctors/{slug}/message', 'DoctorController@newMessage');
        // register a new review in db, redirect doctor reviews show all
        Route::post('doctors/{slug}/review', 'DoctorController@newReview');
        // filter premium doctor by specialization
        Route::post('doctors', 'DoctorController@filterSpec');
        // filter non premium doctor by specialization
        Route::post('doctors/standard', 'DoctorController@filterSpecNotPremium');

        // random pick good reviews with content
        Route::get('reviews/random', 'ReviewController@random');

        // STATS PER MONTH
        Route::get('message/my', 'MessageController@MonthYear');
        Route::get('review/my', 'ReviewController@MonthYear');
        Route::get('review/vote/my', 'ReviewController@VoteMonthYear');

        Route::get('specializations', 'SpecializationController@index');

        Route::get('doctors/paginate/premium', 'DoctorController@sliderPaginate');

        // SUBSCRIPTIONS
        Route::get('subscriptions', 'SubscriptionController@index');
        // generate token
        Route::get('subscription/generate', 'SubscriptionController@generate');
        // make paymenr
        Route::post('subscription/payment/make', 'SubscriptionController@payment');

        Route::post('getPriceFromName', 'SubscriptionController@priceName');
    });
