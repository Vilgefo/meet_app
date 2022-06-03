<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\VerificationController;
use \App\Http\Controllers\UserInfoController;

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

Route::middleware(['auth:sanctum', 'ability:user'])->group(function(){
    Route::PUT('/user/info/{user_info:user_id}', [UserInfoController::class, 'update']);
});
Route::middleware(['auth:sanctum', 'ability:admin'])->group(function(){
    Route::resource('/hobby', \App\Http\Controllers\HobbiesController::class);
    Route::resource('/interest', \App\Http\Controllers\HobbiesController::class);
});
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/verification', [VerificationController::class, 'authAttempt']);
