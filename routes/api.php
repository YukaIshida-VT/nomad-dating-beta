<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/auth-user', [AuthUserController::class, 'show']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/has_profile', [UserController::class, 'hasProfile']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::apiResource('likes', LikeController::class)->only(['store', 'destroy']);
    Route::get('/likings', [LikeController::class, 'getLinkings']);
    Route::apiResource('profiles', ProfileController::class)->except('index');
    Route::get('/get_profile', [ProfileController::class, 'getByUserId']);
});