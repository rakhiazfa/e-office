<?php

use App\Http\Controllers\Letters\OutgoingMailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Outgoing Mail Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/outgoing-mails', [OutgoingMailController::class, 'index'])->name('outgoing-mails');

    Route::get('/outgoing-mails/create', [OutgoingMailController::class, 'create'])->name('outgoing-mails.create');

    Route::post('/outgoing-mails', [OutgoingMailController::class, 'store'])->name('outgoing-mails.store');

    Route::get('/outgoing-mails/{id}', [OutgoingMailController::class, 'show'])->name('outgoing-mails.show');

    Route::get('/outgoing-mails/edit/{id}', [OutgoingMailController::class, 'edit'])->name('outgoing-mails.edit');

    Route::put('/outgoing-mails/{id}', [OutgoingMailController::class, 'update'])->name('outgoing-mails.update');

    Route::delete('/outgoing-mails/{id}', [OutgoingMailController::class, 'destroy'])->name('outgoing-mails.destroy');
});
