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

        // Overdue: pending tasks whose due date has passed
        $overdue = Task::where('is_done', 0)
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', now()->toDateString())
            ->count();

        return view('tasks.index', compact('tasks', 'completed', 'pending', 'overdue'));
    }

public function create()
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category' => $request->category,
            'is_done' => $request->has('is_done') ? 1 : 0,
        ]);

        return redirect()->route('tasks.index');
    }

public function edit(Task $task)
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        return view('tasks.edit', compact('task', 'categories'));
    }

    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required'
        ]);

$task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
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
    
public function table()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.table', compact('tasks'));
    }
    
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    
public function stats()
{
    // Tasks per category
    $categories = Task::select('category')
        ->selectRaw('count(*) as total')
        ->groupBy('category')
        ->pluck('total', 'category');

    // Today's tasks based on due_date (tasks due today)
    $todayTasks = Task::whereDate('due_date', now()->toDateString())
        ->select('category')
        ->selectRaw('count(*) as total')
        ->groupBy('category')
        ->pluck('total', 'category');

    return view('stats', [
        'categories' => $categories,
        'todayTasks' => $todayTasks
    ]);
}
}