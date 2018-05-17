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
//use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth\Auth;

Route::get('/', function () {
    return view('Users.index');
});

Auth::routes();
Route::group(['namespace'=>'Apis'], function(){
    Route::get('api-details','ApiPanelController@index');
    Route::get('current-allocation-form','ApiPanelController@currentAllocationForm');
    Route::get('field-staff-login-form','ApiPanelController@fieldStaffLoginForm');
    Route::get('update-bill-form','ApiPanelController@updateBillForm');
    Route::get('bill-product-form','ApiPanelController@billProductForm');
    Route::get('cash-collection-form','ApiPanelController@cashCollectionForm');
    Route::get('get-user-by-id-form','ApiPanelController@getUserByIdForm');
    Route::get('check-register-form','ApiPanelController@checkRegisterForm');
    Route::get('sale-return-form','ApiPanelController@saleReturnForm');
});


Route::group(['namespace'=>'TempBill'],function(){
    Route::get('/temporary-bill/{slug}','BillingController@tempBillSaleReturn');
    Route::post('/temporary-bill-sale-return','BillingController@temporaryBillSaleReturn');
    Route::get('/search-temporary-bill', 'BillingController@searchTemporaryBill' );
    Route::get('/temp', 'BillingController@index' );
    Route::get('/tempbill', 'BillingController@tempBill');
    Route::post('/tempbill-post', 'BillingController@tempbillPost');
    Route::get('/printBills','BillingController@printBills');
    Route::post('/addProduct','ItemController@addProduct');
    Route::post('/addRetailer','RetailerController@addRetailer');

    //Add purchase
    Route::get('/add-purchase', 'AddPurchase@index');
    Route::post('/add-purchase', 'AddPurchase@addPurchaseCreate');


});




Route::get('cheque','Admin\ChequeRegister@index');
Route::get('cheque-completed','Admin\ChequeRegister@chequeCompleted');
Route::post('cheque-completed-post','Admin\ChequeRegister@chequeCompletedPost');
//Route::get('bounce-cheque/{id}','Admin\ChequeRegister@bounceCheque');
Route::get('cleared-cheque/{id}','Admin\ChequeRegister@clearedCheque');
Route::post('complete-registered-check','Admin\ChequeRegister@completeRegisteredCheck');


Route::get('cheque-bounce','Admin\BounceChequeRegister@index');
Route::get('penalty-detail/{id}','Admin\BounceChequeRegister@getPenaltyDetails');
//Route::post('update-bounce-check','Admin\BounceChequeRegister@updateBounceCheck');
Route::post('bounce-check-register-penalty','Admin\BounceChequeRegister@bounceCheckRegisterPenalty');
Route::get('pending-bounce-cheque','Admin\BounceChequeRegister@pendingBounceCheque');
Route::post('entry-in-acount','Admin\BounceChequeRegister@entryInAcount');
Route::get('bounce-cheque','Admin\BounceChequeRegister@bounceCheque');



Route::get('cheque_register',function(){
   // echo "test";
    // return view('');
    return view('Users.Cheque.cheque_bounce');

});


/**
 * Allocation
 */
Route::post('temporary-bill-allocation','Admin\BillController@temporaryBillAllocation');
Route::post('bounce-check-allocation','Admin\BillController@bounceCheckAllocation');
Route::post('removePastAllocationByAjax','Admin\BillAjaxController@removePastAllocationByAjax');
Route::post('send-notification-to-field','Admin\BillAjaxController@sendNotificationToField');
Route::post('pastAllocateBillsByAjax','Admin\BillAjaxController@addPastAllocationByAjax');
Route::post('allocateBillsByAjax','Admin\BillController@allocateBillsByAjax');

Route::post('removeCurrentAllocationByAjax','Admin\BillController@removeCurrentAllocationByAjax');
Route::get('unallocatedBills','Admin\BillController@unallocatedBills');
Route::post('BillNosearch','Admin\BillController@BillNosearch');

        Route::post('sheetUpload','Admin\BillController@sheetUpload');
Route::post('billDetailsUpload','Admin\BillController@billDetailsUpload');

Route::post('authenticate','Auth\LoginController@authenticate');

Route::get('uploadbill','Admin\BillController@uploadBill');
Route::post('searchAllocation','Admin\BillController@searchAllocation');
Route::post('searchBill','Admin\BillController@searchBill');


Route::get('create-allocation-no','Admin\BillController@createAllocationNo');
Route::get('manager-dashboard','Admin\BillController@managerDashboard');


Route::get('cashier-dashboard','Admin\CashierController@cashierDashboard');


Route::post('/storebill','Admin\BillController@storeBill');
Route::get('storebill',function (){


    dd(config('app.company_name')."-".date("dmY")."-"."1");
});

//Route::post('authenticate','');
Route::get('/home','HomeController@index');




//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/login','HomeController@index');


Route::group(['prefix'=> 'ChequePenalty', 'namespace'=>'Admin'], function(){
    Route::get('add','ChequePenalty@add');
    Route::post('store','ChequePenalty@store');
    Route::get('show','ChequePenalty@index');
    Route::get('edit/{id}','RoleController@edit');
    Route::post('update','RoleController@update');
    Route::get('delete/{id}','RoleController@delete');
});



Route::group(['prefix'=> 'Role', 'namespace'=>'Admin'], function(){
    Route::get('add','RoleController@add');
    Route::post('store','RoleController@store');
    Route::get('show','RoleController@show');
    Route::get('edit/{id}','RoleController@edit');
    Route::post('update','RoleController@update');
    Route::get('delete/{id}','RoleController@delete');
});

Route::group(['prefix'=> 'Permission', 'namespace'=>'Admin'], function(){
    Route::get('add','PermissionController@add');
    Route::post('store','PermissionController@store');
    Route::get('show','PermissionController@show');
    Route::get('edit/{id}','PermissionController@edit');
    Route::post('update','PermissionController@update');
    Route::get('delete/{id}','PermissionController@delete');
});

Route::group(['prefix'=> 'Employee','namespace'=>'Admin'], function(){
    Route::get('add','EmployeeController@add');
    Route::get('add1','EmployeeController@add1');
    Route::post('store','EmployeeController@store');
    Route::get('show','EmployeeController@show');
    Route::get('edit/{id}','EmployeeController@edit');
    Route::post('update','EmployeeController@update');
    Route::get('delete/{id}','EmployeeController@delete');

});

Route::group(['prefix'=>'receipt','namespace=>Bills'],function(){
            Route::get('');
});

Route::group(['prefix'=>'receipt','namespace=>Bills'],function(){
//    Route::get('');
});
//
//Route::group(['prefix'=> 'Bill','namespace'=>'Admin'], function(){
//
//    Route::get('add','BillController@add') ->middleware('permission:edit');
//    Route::get('add','BillController@add')->middleware('role:manager');
//
//});

Route::group(['prefix'=> 'Relation','namespace'=>'Admin'], function(){

//    Route::get('add','BillController@add') ->middleware('permission:edit');
    Route::get('EmployeeRelation','RelationController@showEmployeeRelation');
    Route::get('PermissionRelation','RelationController@showPermissionRelation');
    Route::get('editPermissionRelation/{id}','RelationController@editPermissionRelation');
    Route::post('updatePermissionRelation','RelationController@updatePermissionRelation');
    Route::get('editEmployeeRelation/{id}','RelationController@editEmployeeRelation');
    Route::post('updateEmployeeRelation','RelationController@updateEmployeeRelation');

});

Route::get('/manager', function (){
   return view('Users.index');
});
