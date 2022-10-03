<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClaimController;

Route::get('/', [ClaimController::class, 'index'])->name('claims.index');
Route::get('/create', [ClaimController::class, 'create'])->name('claims.create');
Route::get('/{claim}', [ClaimController::class, 'show'])->name('claims.show');
Route::get('/{claim}/edit', [ClaimController::class, 'edit'])->name('claims.edit');
