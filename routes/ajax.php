<?php

use App\Http\Controllers\Authenticated\CompanyController;
use App\Http\Controllers\Authenticated\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

Route::get('/ajax/job-levels/{id}/jobs', [JobController::class, 'getJobsByJobLevel']);

Route::get('/ajax/job-levels/{id}/parent/jobs', [JobController::class, 'getParentJobsByJobLevel']);

Route::get('/ajax/jobs/{id}/superiors', [JobController::class, 'getSuperiorsByJob']);

Route::get('/ajax/jobs/{id}/childrens', [JobController::class, 'getJobChildrensByJob']);

Route::get('/ajax/jobs/{id}/employees', [JobController::class, 'getEmployeesOfJob']);

Route::get('/ajax/companies/{id}', [CompanyController::class, 'getCompanyById']);
