<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\ExperienceController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/author/{user:nickname}', [ArticleController::class, 'userShow']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profile/view', [ProfileController::class, 'show'])->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::post('/article/create', [ArticleController::class, 'create']);
    Route::delete('/article/{article:id}/delete', [ArticleController::class, 'destroy']);
    Route::get('/article/trash', [ArticleController::class, 'show']);
    Route::delete('/article/{article:id}/erase', [ArticleController::class, 'erase']);
    Route::patch('/article/{article:id}/restore', [ArticleController::class, 'restore']);

    Route::get('/experience', [ExperienceController::class, 'index']);
    Route::post('/experience/get', [ExperienceController::class, 'getExperience']);
    Route::post('/experience/set', [ExperienceController::class, 'setExperience']);
});
