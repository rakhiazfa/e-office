<?php

use App\Http\Controllers\Authenticated\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->get('/', [DashboardController::class, 'index'])->name('dashboard');

/* ====================================
# Auth routes
==================================== */

require_once __DIR__ . '/auth.php';
