<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Auth;

Route::get('/', [TaskController::class, 'index'])->middleware('auth');

Route::get('/tasks/table', [TaskController::class, 'table'])->name('tasks.table');

// Auth routes (login/register)
require __DIR__ . '/auth.php';

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'update']);
    Route::resource('tasks', TaskController::class);
    Route::get('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
});

Route::get('/stats', [TaskController::class, 'stats'])->middleware('auth');






