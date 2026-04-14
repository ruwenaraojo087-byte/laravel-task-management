<?php

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);

Route::resource('tasks', TaskController::class);

Route::get('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');