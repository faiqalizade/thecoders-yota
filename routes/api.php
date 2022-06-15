<?php

use App\Controllers\MainController;
use App\Core\Route;

Route::post('/api/comments', [MainController::class, 'store'])->name('comments.store');
Route::delete('/api/comments/{id}', [MainController::class, 'delete'])->name('comments.delete');
Route::put('/api/comments/{id}', [MainController::class, 'update'])->name('comments.update');
