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

/* ====================================
# Employee routes
==================================== */

require_once __DIR__ . '/employee.php';

/* ====================================
# Job routes
==================================== */

require_once __DIR__ . '/job.php';

/* ====================================
# Incoming mail routes
==================================== */

require_once __DIR__ . '/letters/incoming_mail.php';

/* ====================================
# Outgoing mail routes
==================================== */

require_once __DIR__ . '/letters/outgoing_mail.php';

/* ====================================
# Memo routes
==================================== */

require_once __DIR__ . '/letters/memo.php';

/* ====================================
# Notulen routes
==================================== */

require_once __DIR__ . '/letters/notulen.php';

/* ====================================
# Disposition routes
==================================== */

require_once __DIR__ . '/letters/disposition.php';

/* ====================================
# Ajax routes
==================================== */

require_once __DIR__ . '/ajax.php';
