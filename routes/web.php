<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [PropertyController::class, 'index'])->name('home');
    Route::resource('properties', PropertyController::class)->except(['index', 'show']);
    Route::resource('property-types', PropertyTypeController::class)->except(['show']);
});

Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
