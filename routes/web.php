<?php

use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['prefix' => 'user'], function() {
    Route::middleware('auth')->group(function () {

        Route::get('/verify-email', [EmailVerifyController::class, 'emailVerifyVeiw'])->name('emailVerify');
        Route::get('/verify-email/verify/{token}/{userID}', [EmailVerifyController::class, 'submitMailVerify'])->name('submitMailVerify');

        Route::middleware('ifVerify')->group(function () {
            Route::controller(DashboardController::class)->group(function () {
                Route::get('/dashboard', 'index')->name('dashboard');

                Route::post('/encrypt-string', 'encryptString')->name('encryptString');
                Route::post('/decrypt-string', 'decryptString')->name('decryptString');

                Route::group(['prefix' => 'form-side'], function() {
                    Route::get('/dashboard', 'index')->name('dashboard');
                });

            });
        });

    });
});

require __DIR__.'/auth.php';
