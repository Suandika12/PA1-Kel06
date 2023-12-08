<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LaporPertamananController;

    Route::group(['domain' => ''], function() {
    Route::redirect('/', 'dashboard', 301);
    Route::get('auth/register',[AuthController::class, 'index_register'])->name('auth.register');
    Route::get('auth',[AuthController::class, 'index'])->name('auth.index');
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
    });
    Route::redirect('/', 'dashboard', 301);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('informasi/',[InformasiController::class, 'index'])->name('informasi');

    Route::middleware(['auth:web'])->group(function(){
    Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
    Route::post('forum/addsaran',[ForumController::class, 'input_saran'])->name('forum.input_saran');
    Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');


    Route::resource('jadwal', JadwalController::class);
    Route::resource('petugas', PetugasController::class);
    Route::get('export_excel', [JadwalController::class, 'export_excel'])->name('jadwal.export_excel');
});
Route::resource('lapor', LaporPertamananController::class);
Route::get('about',[DashboardController::class, 'about'])->name('about');
Route::get('about1',[DashboardController::class, 'about1'])->name('about1');
Route::get('about2',[DashboardController::class, 'about2'])->name('about2');
Route::get('contact',[DashboardController::class, 'contact'])->name('contact');
    Route::delete('myproducts/{id}',[JadwalController::class, 'destroyApi'])->name('destroy');
    Route::delete('myjadwalDeleteAll',[JadwalController::class, 'deleteAllApi'])->name('deleteAll');

    Route::delete('mylapors/{id}',[LaporPertamananController::class, 'destroyApi'])->name('destroy');
    Route::delete('mylaporsDeleteAll',[LaporPertamananController::class, 'deleteAllApi'])->name('deleteAll');

});