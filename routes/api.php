<?php

use App\Controllers\MainController;
use App\Core\Route;

Route::post('/api/comments', [MainController::class, 'store'])->name('comments.store');
