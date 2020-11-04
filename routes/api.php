<?php

use App\Http\Controllers\Api\TradeMessagesController;
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

Route::prefix('v1/trade')->group(function() {
    Route::post('message', [TradeMessagesController::class, 'store']);
    Route::get('message', [TradeMessagesController::class, 'index']);
});

