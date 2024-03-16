<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

// root page
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//store route idea
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');

// delete route idea
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

// show route idea
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

// edit route idea
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

// update route idea
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');


// comments route idea
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');

