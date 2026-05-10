<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index(): View
    {
        // Pass tasks so profile "Quick Overview" cards stay in sync
        // whenever tasks are added/edited/toggled/deleted.
        $tasks = Task::query()->get();

        return view('profile', compact('tasks'));
    }
}

