<?php

use Illuminate\Http\Request;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Apis'], function() {

    Route::post('fieldlogin', 'Fieldstaff@login');
    Route::post('current-allocation-by-date', 'Fieldstaff@currentAllocationByDate');
    Route::post('update-bill-by-id','Fieldstaff@updateBillById');
    Route::post('bill-product','Fieldstaff@billProduct');
    Route::post('cash-collection','Fieldstaff@cashCollection');
    Route::post('check-register','Fieldstaff@checkRegister');
    Route::post('sale-return','Fieldstaff@saleReturn');

});

