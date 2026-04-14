<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
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

        $data = $request->all();

$data['is_done'] = $request->has('is_done') ? 1 : 0;

$task->update($data);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
       $data = $request->all();

$data['is_done'] = $request->has('is_done') ? 1 : 0;

Task::create($data);
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