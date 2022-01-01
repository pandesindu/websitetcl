<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\apiController;
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
    Route::get('/datasiswa', [SiswaController::class, 'adminIndex']);
    Route::get('/TransaksiSiswa', [TransaksiController::class, 'adminIndex']);
    Route::resource('admin', AdminController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jurusan', JurusanController::class);
});



// Route::get('test/{$id}', [apiController::class, 'getSiswaById']);
// // Route::get('/cari', [TransaksiController::class, 'ambilData']);
