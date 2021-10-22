<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('transaksi', TransaksiController::class);
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    // Route::resource('kelas', KelasController::class);
    // Route::resource('siswa', SiswaController::class);
    // Route::resource('jurusan', JurusanController::class);
    Route::resource('transaksi', TransaksiController::class);
});


// Route::get('/cari', [TransaksiController::class, 'ambilData']);
