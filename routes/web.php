<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class,'index'])->name('portarias.index');
Route::get('/create',  [IndexController::class, 'create'])->name('portarias.create');
Route::post('/store', [IndexController::class, 'store'])->name('portarias.store');
Route::get('/portarias/{portaria}', [IndexController::class, 'show'])->name('portarias.show');
Route::get('/portarias/{portaria}/edit', [IndexController::class, 'edit'])->name('portarias.edit');
Route::delete('/portaria/{portaria}', [IndexController::class, 'destroy'])->name('portarias.destroy');
