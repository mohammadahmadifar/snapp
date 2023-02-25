<?php

use App\Http\Controllers\Bank\CardNumberController;
use App\Http\Controllers\Bank\TransactionLogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('card-to-card-operation', [CardNumberController::class, 'cardToCardOperation']);
Route::get('most-transaction-in-10-minutes', [TransactionLogController::class, 'mostTransactionIn10Minutes']);
