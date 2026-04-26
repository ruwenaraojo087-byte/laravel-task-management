<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index()
{
    $tasks = Task::all();

    $completed = Task::where('is_done', 1)->count();
    $pending = Task::where('is_done', 0)->count();

    return view('tasks.index', compact('tasks', 'completed', 'pending'));
}

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_done' => $request->has('is_done') ? 1 : 0,
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_done' => $request->has('is_done') ? 1 : 0,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function toggle(Task $task)
    {
        $task->is_done = !$task->is_done;
        $task->save();

        return back();
    }
}