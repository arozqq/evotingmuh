<?php

use App\Http\Controllers\Admin\ManagementKandidatController;
use App\Http\Controllers\Admin\ManagementPesertaController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuickCountController;
use App\Http\Controllers\VotingController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/quick-count', [QuickCountController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'cek_login'])->name('cek_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth','admin'])->group(function () {
    // USER
    Route::get('management-peserta', [ManagementPesertaController::class, 'index'])->name('management-peserta.index');
    Route::post('store-peserta', [ManagementPesertaController::class, 'store'])->name('management-peserta.store');
    Route::get('peserta/{id}/edit', [ManagementPesertaController::class, 'edit']);
    Route::delete('delete-peserta/delete/{id}', [ManagementPesertaController::class, 'destroy']);
    Route::delete('selected-peserta', [ManagementPesertaController::class, 'deleteSelected'])->name('management-peserta.delete-selected');

    // SETTING
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

    // KANDIDAT
    Route::resource('management-kandidat', ManagementKandidatController::class);
    Route::delete('selected-kandidat', [ManagementKandidatController::class, 'deleteSelected'])->name('management-kandidat.delete-selected');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/reset-voting', [ReportController::class, 'reset'])->name('report.reset');
});

Route::middleware(['auth'])->group(function() {
    //  VOTE
    Route::get('/voting', [VotingController::class, 'index']);
    Route::post('/voting/store', [VotingController::class, 'store']);
});
