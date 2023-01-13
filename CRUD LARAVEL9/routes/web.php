<?php

use App\Http\Controllers\dosenController;
use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('start');
});
Route::middleware(['auth','verified'])->group(function () {
    Route::resource('/mahasiswa',mahasiswaController::class)->except('show');
    Route::resource('/dosen',dosenController::class)->except('show')->middleware('admin');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
