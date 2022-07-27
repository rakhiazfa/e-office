<?php

use App\Http\Controllers\Letters\IncomingMailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Incoming Mail Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/incoming-mails', [IncomingMailController::class, 'index'])->name('incoming-mails');

    Route::get('/incoming-mails/create', [IncomingMailController::class, 'create'])->name('incoming-mails.create');

    Route::post('/incoming-mails', [IncomingMailController::class, 'store'])->name('incoming-mails.store');

    Route::get('/incoming-mails/{id}', [IncomingMailController::class, 'show'])->name('incoming-mails.show');

    Route::get('/incoming-mails/edit/{id}', [IncomingMailController::class, 'edit'])->name('incoming-mails.edit');

    Route::put('/incoming-mails/{id}', [IncomingMailController::class, 'update'])->name('incoming-mails.update');

    Route::delete('/incoming-mails/{id}', [IncomingMailController::class, 'destroy'])->name('incoming-mails.destroy');
});
