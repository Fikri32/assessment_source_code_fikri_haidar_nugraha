<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'merchants'], function () {
    Route::get('/', 'MerchantsController@index')->name('merchants.index');
    Route::get('/getData', 'MerchantsController@getMerchants')->name('merchants.data');
    Route::post('/store', 'MerchantsController@store')->name('merchants.store');
    Route::get('/edit/{id}', 'MerchantsController@edit')->name('merchants.edit');
    Route::put('/update/{id}', 'MerchantsController@update')->name('merchants.update');
    Route::delete('/delete/{id}', 'MerchantsController@delete')->name('merchants.delete');
});

Route::group(['prefix' => 'outlets'], function () {
    Route::get('/', 'OutletsController@index')->name('outlets.index');
    Route::get('/getData', 'OutletsController@getOutlets')->name('outlets.data');
    Route::get('/getMerchant', 'OutletsController@getMerchants')->name('outlets.getMerchants');
    Route::post('/store', 'OutletsController@store')->name('outlets.store');
    Route::get('/edit/{id}', 'OutletsController@edit')->name('outlets.edit');
    Route::put('/update/{id}', 'OutletsController@update')->name('outlets.update');
    Route::delete('/delete/{id}', 'OutletsController@delete')->name('outlets.delete');
});

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', 'CustomerController@index')->name('customers.index');
    Route::get('/getData', 'CustomerController@getCustomers')->name('customers.data');
    Route::post('/store', 'CustomerController@store')->name('customers.store');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('customers.edit');
    Route::put('/update/{id}', 'CustomerController@update')->name('customers.update');
    Route::delete('/delete/{id}', 'CustomerController@delete')->name('customers.delete');
});

Route::group(['prefix' => 'staff'], function () {
    Route::get('/', 'StaffController@index')->name('staff.index');
    Route::get('/getData', 'StaffController@getStaff')->name('staff.data');
    Route::post('/store', 'StaffController@store')->name('staff.store');
    Route::get('/edit/{id}', 'StaffController@edit')->name('staff.edit');
    Route::put('/update/{id}', 'StaffController@update')->name('staff.update');
    Route::delete('/delete/{id}', 'StaffController@delete')->name('staff.delete');
});

Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', 'TransactionController@index')->name('transactions.index');
    Route::get('/getData', 'TransactionController@getTransactions')->name('transactions.data');
    Route::get('/getRelationalData', 'TransactionController@getRelationalData')->name('transactions.getRelationalData');
    Route::post('/store', 'TransactionController@store')->name('transactions.store');
    Route::get('/edit/{id}', 'TransactionController@edit')->name('transactions.edit');
    Route::put('/update/{id}', 'TransactionController@update')->name('transactions.update');
    Route::delete('/delete/{id}', 'TransactionController@delete')->name('transactions.delete');
});

Route::group([],function () {
    Route::get('/', 'ReportController@index')->name('report.index');
    Route::get('/getReportTransaction', 'ReportController@getReportTransaction')->name('report.getReportTransaction');
});
// Route::get('/', function () {
//     return view('merchants.index');
// });
