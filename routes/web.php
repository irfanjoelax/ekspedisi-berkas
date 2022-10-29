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
    return redirect('/login');
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

    // MASTER DATA KETERANGAN
    Route::get('/admin/keterangan', [App\Http\Controllers\KeteranganController::class, 'index']);
    Route::get('/admin/keterangan/create', [App\Http\Controllers\KeteranganController::class, 'create']);
    Route::get('/admin/keterangan/edit/{id}', [App\Http\Controllers\KeteranganController::class, 'edit']);
    Route::post('/admin/keterangan/submit/{id?}', [App\Http\Controllers\KeteranganController::class, 'submit']);
    Route::get('/admin/keterangan/delete/{id}', [App\Http\Controllers\KeteranganController::class, 'delete']);
});
