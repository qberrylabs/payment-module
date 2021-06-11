<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PaymentMethodeModule\Http\Controllers\API\PaymentMethodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['api','auth','isVerified','isEmailVerified','IsProfileCompleted']], function ($router) {
    //Start Payment Method API
    Route::get('get-payment-methods', [PaymentMethodController::class,'getUserPaymentMethod']);
    Route::get('get-payment-methods-by-country/{country?}',[PaymentMethodController::class,'getPaymentMethodByCountry']);
    //End Payment Method API
});

