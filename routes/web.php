<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\LogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('/', function () {
    return view('auth.login');
});

Route::post('custom-login',[LoginController::class,'customLogin'])->name('login.custom');
Route::get('register',[RegisterController::class,'create'])->name('register.create');
Route::post('register',[RegisterController::class,'store'])->name('register.store');

Route::group(['middleware' => ['auth']], function () {

    Route::get('home',[HomeController::class,'index'])->name('home');

    Route::get('deposit',[DepositController::class,'index'])->name('deposit');
    Route::post('deposit/store',[DepositController::class,'deposit'])->name('deposit.store');

    Route::get('withdraw',[WithdrawController::class,'index'])->name('withdraw');
    Route::post('withdraw/store',[WithdrawController::class,'withdraw'])->name('withdraw.store');

    Route::get('transfer',[TransferController::class,'index'])->name('transfer');
    Route::post('transfer/store',[TransferController::class,'transfer'])->name('transfer.store');

    Route::get('logout', [LogoutController::class,'perform'])->name('logout.perform');


});
