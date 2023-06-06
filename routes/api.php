<?php

use App\Http\Controllers\Api\ConversionController;
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

Route::prefix('v1')->group(function () {
    Route::apiResource('/convert', ConversionController::class);
    Route::get('/recent', [ConversionController::class, 'recent']);
    Route::get('/top', [ConversionController::class, 'top']);
});
