<?php

use App\Http\Controllers\Letters\MemoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Memo Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/memos', [MemoController::class, 'index'])->name('memos');

    Route::get('/memos/create', [MemoController::class, 'create'])->name('memos.create');

    Route::post('/memos', [MemoController::class, 'store'])->name('memos.store');

    Route::get('/memos/{id}', [MemoController::class, 'show'])->name('memos.show');

    Route::get('/memos/edit/{id}', [MemoController::class, 'edit'])->name('memos.edit');

    Route::put('/memos/{id}', [MemoController::class, 'update'])->name('memos.update');

    Route::delete('/memos/{id}', [MemoController::class, 'destroy'])->name('memos.destroy');
});
