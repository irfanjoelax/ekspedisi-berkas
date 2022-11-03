<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // DASHBOARD ADMIN
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    // UPDATE PROFILE
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'update']);

    // MASTER DATA DESA/KECAMATAN
    Route::get('/admin/desa', [App\Http\Controllers\DesaController::class, 'index']);
    Route::get('/admin/desa/create', [App\Http\Controllers\DesaController::class, 'create']);
    Route::get('/admin/desa/edit/{id}', [App\Http\Controllers\DesaController::class, 'edit']);
    Route::post('/admin/desa/submit/{id?}', [App\Http\Controllers\DesaController::class, 'submit']);
    Route::get('/admin/desa/delete/{id}', [App\Http\Controllers\DesaController::class, 'delete']);

    // MASTER DATA PROSEDUR
    Route::get('/admin/prosedur', [App\Http\Controllers\ProsedurController::class, 'index']);
    Route::get('/admin/prosedur/create', [App\Http\Controllers\ProsedurController::class, 'create']);
    Route::get('/admin/prosedur/edit/{id}', [App\Http\Controllers\ProsedurController::class, 'edit']);
    Route::post('/admin/prosedur/submit/{id?}', [App\Http\Controllers\ProsedurController::class, 'submit']);
    Route::get('/admin/prosedur/delete/{id}', [App\Http\Controllers\ProsedurController::class, 'delete']);

    // MASTER DATA JENIS HAK
    Route::get('/admin/jenis_hak', [App\Http\Controllers\JenisHakController::class, 'index']);
    Route::get('/admin/jenis_hak/create', [App\Http\Controllers\JenisHakController::class, 'create']);
    Route::get('/admin/jenis_hak/edit/{id}', [App\Http\Controllers\JenisHakController::class, 'edit']);
    Route::post('/admin/jenis_hak/submit/{id?}', [App\Http\Controllers\JenisHakController::class, 'submit']);
    Route::get('/admin/jenis_hak/delete/{id}', [App\Http\Controllers\JenisHakController::class, 'delete']);

    // MASTER DATA KETERANGAN
    Route::get('/admin/keterangan', [App\Http\Controllers\KeteranganController::class, 'index']);
    Route::get('/admin/keterangan/create', [App\Http\Controllers\KeteranganController::class, 'create']);
    Route::get('/admin/keterangan/edit/{id}', [App\Http\Controllers\KeteranganController::class, 'edit']);
    Route::post('/admin/keterangan/submit/{id?}', [App\Http\Controllers\KeteranganController::class, 'submit']);
    Route::get('/admin/keterangan/delete/{id}', [App\Http\Controllers\KeteranganController::class, 'delete']);

    // MASTER DATA USER
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/admin/user/submit/{id?}', [App\Http\Controllers\UserController::class, 'submit']);
    Route::get('/admin/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);

    // MASTER DATA PERMOHONAN
    Route::get('/admin/permohonan', [App\Http\Controllers\PermohonanController::class, 'index']);
    Route::get('/admin/permohonan/create', [App\Http\Controllers\PermohonanController::class, 'create']);
    Route::get('/admin/permohonan/edit/{id}', [App\Http\Controllers\PermohonanController::class, 'edit']);
    Route::post('/admin/permohonan/submit/{id?}', [App\Http\Controllers\PermohonanController::class, 'submit']);
    Route::get('/admin/permohonan/delete/{id}', [App\Http\Controllers\PermohonanController::class, 'delete']);
    Route::get('/admin/permohonan/update/status/{id}/{status}', [App\Http\Controllers\PermohonanController::class, 'update_status']);
    Route::get('/admin/permohonan/export', [App\Http\Controllers\PermohonanController::class, 'export']);
});
