<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix'=>'idea/', 'as' => 'idea.'], function()
{
    Route::post('', [IdeaController::class, 'store'])->name('store');

    // Route::get('{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function(){


        // Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

        // Route::put('{idea}', [IdeaController::class, 'update'])->name('update');

        // Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::post('{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('idea', IdeaController::class)->except(['index','create','show'])->middleware(['auth']);

Route::resource('idea', IdeaController::class)->only(['show']);
//Profile page
Route::get('/profile', [ProfileController::class,'profile']);

//profile
Route::resource('users', UserController::class)->only(['show','edit', 'update'])->middleware(['auth']);

//Terms and conditon page
Route::get('/terms', [TermsController::class,'terms']);
