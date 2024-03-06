<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\RegisterUserController;
use App\Http\Controllers\Api\v1\AuthenticationController;

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

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum','ensure_json_header']], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
