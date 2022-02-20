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
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::view('/admin/change-password', 'change-password')->name('change-password');
Route::post('/change-password',  [App\Http\Controllers\ChangePasswordController::class, '__invoke'])->name('submit_change_pw');
Route::prefix('admin')->group(function () {
    Route::resource('product', 'ProductController');
});
