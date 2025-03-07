<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/', [AuthController::class,'loginView'])->name('loginView')->middleware('guest');
Route::post('/', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

//Dashboard
Route::get('/home', [DashboardController::class,'index'])->name('home')->middleware('auth');

//Pemasukan
Route::prefix('pendapatan')->group(function () {
    Route::get('/', [PendapatanController::class,'index'])->name('pendapatan.index');
    Route::get('/rekomendasi', [PendapatanController::class,'rekomendasi'])->name('pendapatan.rekomendasi');
    Route::get('/create', [PendapatanController::class,'create'])->name('pendapatan.create');
    Route::post('/store', [PendapatanController::class,'store'])->name('pendapatan.store');
    Route::get('/edit/{id}', [PendapatanController::class,'edit'])->name('pendapatan.edit');
    Route::post('/update/{id}', [PendapatanController::class,'update'])->name('pendapatan.update');
    Route::get('/destroy/{id}', [PendapatanController::class,'destroy'])->name('pendapatan.destroy');
})->middleware('auth');

//Pengeluaran
Route::prefix('pengeluaran')->group(function () {
    Route::get('/', [PengeluaranController::class,'index'])->name('pengeluaran.index');
    Route::get('/create', [PengeluaranController::class,'create'])->name('pengeluaran.create');
    Route::post('/store', [PengeluaranController::class,'store'])->name('pengeluaran.store');
    Route::get('/edit/{id}', [PengeluaranController::class,'edit'])->name('pengeluaran.edit');
    Route::post('/update/{id}', [PengeluaranController::class,'update'])->name('pengeluaran.update');
    Route::get('/destroy/{id}', [PengeluaranController::class,'destroy'])->name('pengeluaran.destroy');
})->middleware('auth');
