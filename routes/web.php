<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TwitterLoginController;

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
Route::get('/', [TwitterLoginController::class, 'index'])->name('top');

// ログインURL
Route::get('auth/twitter/login', [TwitterLoginController::class, 'redirectToProvider'])->name('twitterLogin');
// コールバックURL
Route::get('auth/twitter/callback',[TwitterLoginController::class, 'handleProviderCallback']);
// ログアウトURL
Route::get('auth/twitter/logout', [TwitterLoginController::class, 'logout'])->name('twitterLogout');

Route::get('/{any}', [AppController::class, 'index'])->where('any', '.*');
