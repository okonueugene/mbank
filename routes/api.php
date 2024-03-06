<?php

use App\Http\Controllers\Api\v1\AuthenticationController;
use App\Http\Controllers\Api\v1\RegisterUserController;
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
Route::group(['prefix' => 'v1', 'middleware' => ['ensure_json_header']], function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [RegisterUserController::class, 'register']);
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum', 'ensure_json_header']], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
