<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KatalogController;

//User
use App\Http\Controllers\User\PinjamController;

//Admin
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\PinjamController as APinjamController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [KatalogController::class, 'index']);
Route::get('/katalog/{id}', [KatalogController::class, 'show'])->name('katalog.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// setup routing untuk admin
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    //route Admin
    Route::resource('book', BookController::class);
    Route::resource('pinjam', APinjamController::class);
    Route::post('pinjam/{id}/terima', [APinjamController::class, 'terima'])->name('pinjam.terima');
    Route::post('pinjam/{id}/tolak', [APinjamController::class, 'tolak'])->name('pinjam.tolak');
    Route::post('pinjam/{id}/selesai', [APinjamController::class, 'selesai'])->name('pinjam.selesai');
});


// setup routing untuk user
Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    //route User
    Route::resource('pinjam', PinjamController::class);
});
