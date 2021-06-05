<?php

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

use Illuminate\Support\Facades\Route;
use Modules\PaymentMethodeModule\Http\Controllers\PaymentMethodController;

Route::group(['middleware' => ['auth','isAdmin']], function() {

    Route::name('admin.')->prefix('payment-methods')->group(function () {
        Route::get('/',[PaymentMethodController::class,'index'])->name('PaymentMethod');
        Route::post('/store', [PaymentMethodController::class,'store']);
        Route::post('/update',[PaymentMethodController::class,'update'])->name('payment-method.update');
    });
    
});


