<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
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

Route::get('/', function () {
    return view('dashboard.index');
});
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas/store', [KelasController::class, 'store']);
Route::get('/kelas/{id}/delete', [KelasController::class, 'destroy']);
Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
Route::put('/kelas/{id}/update', [KelasController::class, 'update']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/{kelas_id}/store', [SiswaController::class, 'store']);
Route::get('/siswa/{kelas_id}/detail', [SiswaController::class, 'show']);
Route::get('/siswa/{id}/{kelas_id}/delete', [SiswaController::class, 'destroy']);
Route::get('/siswa/{id}/{kelas_id}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{id}/{kelas_id}/update', [SiswaController::class, 'update']);

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('/absensi/{kelas_id}', [AbsensiController::class, 'absensi']);
Route::post('/absensi/{kelas_id}/store', [AbsensiController::class, 'store']);