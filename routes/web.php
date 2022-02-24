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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::view('/admin/change-password', 'change-password')->name('change-password');
Route::post('/change-password',  [App\Http\Controllers\ChangePasswordController::class, '__invoke'])->name('submit_change_pw');
Route::resource('item', 'ItemController');
Route::resource('customer', 'CustomerController');
Route::resource('invoice', 'InvoiceController');
Route::get('getItem', 'InvoiceController@getItem')->name('getItem');
Route::get('revenue', 'InvoiceController@revenue');
Route::resource('bill', 'PurchaseController');
