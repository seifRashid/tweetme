<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

Route::get('/idea{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/idea{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/ideas{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');


//Authentication
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

//Profile page
Route::get('/profile', [ProfileController::class,'profile']);

//Terms and conditon page
Route::get('/terms', [TermsController::class,'terms']);
