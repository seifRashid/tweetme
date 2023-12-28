<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
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

//Home page
Route::get('/', [DashboardController::class, 'index']);

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

//Profile page
Route::get('/profile', [ProfileController::class,'profile']);

//Terms and conditon page
Route::get('/terms', [TermsController::class,'terms']);
