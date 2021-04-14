<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AccountsController;

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

Route::get('/', function () {
	return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    /*return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);*/
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/accounts', [AccountsController::class, 'index'])->middleware(['auth', 'verified'])->name('accounts');

Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees');


Route::get('/accountslist', [AccountsController::class, 'accountslist'])->middleware(['auth', 'verified'])->name('accountslist');

Route::get('/facadeex', function() {
   return TestFacades::testingFacades();
});


require __DIR__.'/auth.php';
