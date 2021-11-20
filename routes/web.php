<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CriteriaController;

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

Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    Artisan::call('package:discover');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('event:clear');
    Artisan::call('event:cache');
    return "Cleared!";
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/students', StudentController::class)->except('show');
    Route::resource('/criterias', CriteriaController::class)->except('show');

    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate']);
});

// Temporary Route
Route::get('/result', function () {
    return view('results.index');
});