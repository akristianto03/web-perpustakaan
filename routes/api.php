<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\User\BookController;
use App\Http\Controllers\Api\User\Usercontroller;
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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::group(['middleware' => 'auth:api', 'as' => 'api.user.'], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
    Route::apiResource('book', BookController::class);
    Route::delete('book/destroy_pinjam/{pinjam}', [BookController::class, 'destroy_pinjam']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('user', Usercontroller::class);
});
