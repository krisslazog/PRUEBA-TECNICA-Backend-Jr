<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

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

Route::post('/accounts', [AccountController::class, 'createAccount']);
Route::get('/accounts/{id}', [AccountController::class, 'findAccount']);
Route::get('/accounts', [AccountController::class, 'listAccount']);
Route::get('/accounts/balance/{id}',[AccountController::class,'getBalance']);

Route::post('/transactions/deposit',[TransactionController::class,'depositTransaction']);
Route::post('/transactions/withdraw',[TransactionController::class,'withdrawTransaction']);
Route::post('/transactions/transfer',[TransactionController::class,'transferTransaction']);
Route::get('/transactions/{accountId}', [TransactionController::class, '']);
