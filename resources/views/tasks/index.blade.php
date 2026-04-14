@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>My Tasks</h2>
    <a href="/tasks/create" class="btn btn-primary">
        + Add Task
    </a>
</div>

@foreach($tasks as $task)

<div class="task-card">

    <div class="d-flex justify-content-between">

        <div>
            <h5 class="{{ $task->is_done ? 'done' : '' }}">
                {{ $task->title }}
            </h5>

            <p class="text-muted">
                {{ $task->description }}
            </p>
        </div>

        <div>

            @if($task->is_done)
                <span class="badge bg-success">Done</span>
            @else
                <span class="badge bg-warning text-dark">Pending</span>
            @endif

        </div>

    </div>

    <div class="mt-2">

        <a href="{{ route('tasks.toggle', $task->id) }}" class="btn btn-sm btn-success">
            ✔ Toggle
        </a>

        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">
            ✏ Edit
        </a>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                🗑 Delete
            </button>
        </form>

    </div>

</div>

@endforeach

@endsection