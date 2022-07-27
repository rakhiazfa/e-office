<?php

use App\Http\Controllers\Letters\NotulenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Notulen Mail Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/notulens', [NotulenController::class, 'index'])->name('notulens');

    Route::get('/notulens/create', [NotulenController::class, 'create'])->name('notulens.create');

    Route::post('/notulens', [NotulenController::class, 'store'])->name('notulens.store');

    Route::get('/notulens/{id}', [NotulenController::class, 'show'])->name('notulens.show');

    Route::get('/notulens/edit/{id}', [NotulenController::class, 'edit'])->name('notulens.edit');

    Route::put('/notulens/{id}', [NotulenController::class, 'update'])->name('notulens.update');

    Route::delete('/notulens/{id}', [NotulenController::class, 'destroy'])->name('notulens.destroy');
});
