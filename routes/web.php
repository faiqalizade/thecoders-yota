<?php
use App\Core\Route;

Route::get('/', [App\Controllers\MainController::class, 'index'])->name('home');
