<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/transaction',[App\Http\Controllers\TransactionController::class,'create'])->name('transaction');

Route::get('/transaction',[App\Http\Controllers\TransactionController::class, 'index'])->name('all-transactions');
Route::get('/transaction/{transaction}',[App\Http\Controllers\TransactionController::class, 'show'])->name('get-transactions');
Route::delete('/transaction/{transaction}',[App\Http\Controllers\TransactionController::class, 'delete'])->name('delete-transaction');