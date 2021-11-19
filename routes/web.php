<?php

use App\Http\Controllers\CriteriaController;
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

Route::resource('/criterias', CriteriaController::class);

// Temporary Route
Route::get('/', function () {
    return view('login.index');
});
Route::get('/students', function () {
    return view('students.index');
});
Route::get('/create', function () {
    return view('students.create');
});
Route::get('/result', function () {
    return view('results.index');
});