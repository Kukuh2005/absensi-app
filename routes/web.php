<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RekapAbsensiController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [AuthController::class, 'index'])->name('login');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/daftar', [AuthController::class, 'daftar']);
Route::post('/user/daftar', [AuthController::class, 'store'])->name('store');
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
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
    
    Route::get('/rekap', [RekapAbsensiController::class, 'index']);
    Route::get('/rekap/{kelas_id}', [RekapAbsensiController::class, 'rekap']);
    Route::get('/rekap/{kelas_id}/cari', [RekapAbsensiController::class, 'cari']);
    Route::get('/rekap/{kelas_id}/{tanggal_dari}/{tanggal_sampai}/print', [RekapAbsensiController::class, 'print']); 
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,guru']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/absensi', [AbsensiController::class, 'index']);
    Route::get('/absensi/{kelas_id}', [AbsensiController::class, 'absensi']);
    Route::post('/absensi/{kelas_id}/store', [AbsensiController::class, 'store']);
});