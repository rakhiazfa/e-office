<?php

use App\Http\Controllers\Authenticated\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Job Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

    Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');

    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');

    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
});
