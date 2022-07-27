<?php

use App\Http\Controllers\Authenticated\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

Route::get('/ajax/job-levels/{id}/jobs', [JobController::class, 'getJobsByJobLevel']);

Route::get('/ajax/jobs/{id}/superiors', [JobController::class, 'getSuperiorsByJob']);

Route::get('/ajax/job-levels/{id}/parent/jobs', [JobController::class, 'getParentJobsByJobLevel']);
