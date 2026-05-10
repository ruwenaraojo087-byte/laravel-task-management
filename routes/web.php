<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [TaskController::class, 'index']);

// Category routes
Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'update']);

Route::get('/tasks/table', [TaskController::class, 'table'])->name('tasks.table');

Route::resource('tasks', TaskController::class);

Route::get('/stats', [TaskController::class, 'stats']);

Route::get('/profile', [ProfileController::class, 'index']);



Route::get('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');



