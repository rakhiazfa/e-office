<?php

use App\Http\Controllers\Letters\DispositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Disposition Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dispositions', [DispositionController::class, 'index'])->name('dispositions');

    Route::get('/dispositions/create', [DispositionController::class, 'create'])->name('dispositions.create');

    Route::post('/dispositions', [DispositionController::class, 'store'])->name('dispositions.store');

    Route::get('/dispositions/{id}', [DispositionController::class, 'show'])->name('dispositions.show');

    Route::get('/dispositions/edit/{id}', [DispositionController::class, 'edit'])->name('dispositions.edit');

    Route::put('/dispositions/{id}', [DispositionController::class, 'update'])->name('dispositions.update');

    Route::delete('/dispositions/{id}', [DispositionController::class, 'destroy'])->name('dispositions.destroy');
});
