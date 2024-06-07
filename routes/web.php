<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});
Route::get('/register', [AuthenticationController::class, 'registerForm'])->name('register.fomm');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register.store');
Route::get('/login', [AuthenticationController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.store');
//this should be authenticated
// Routes protected by authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/choose_company', [AuthenticationController::class, 'chooseCompanyForm'])->name('choose.company');
    Route::post('/choose_company', [AuthenticationController::class, 'chooseCompanySave'])->name('choose.company.store');
    Route::get('/ajax/company/{id}/subscriptions', [AuthenticationController::class, 'ajaxCompanySubscriptions'])->name('ajax.company.subscriptions');

    // Payroll routes
    Route::prefix('/payroll')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Payroll\DashboardController::class, 'dashboard'])->name('payroll.dashboard');
    });

    // HR routes
    Route::prefix('/hr')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Hr\DashboardController::class, 'dashboard'])->name('hr.dashboard');
    });

    // Timetrax routes
    Route::prefix('/timetrax')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Timetrax\DashboardController::class, 'dashboard'])->name('timetrax.dashboard');
    });
});

//create a dashboard route grouped payroll, hr, timetrax for each groups
