@extends('layout')

@section('content')

<div class="dashboard-container">

    {{-- Header --}}
    <div class="dashboard-header">
        <div>
            <h2>Daily Dash</h2>
            <p>Manage and track your daily tasks</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-add">
            + New Task
        </a>
    </div>

    {{-- Stats --}}
    <div class="stats">
        <div class="stat-card">
            <span>Done</span>
            <h3>{{ $tasks->where('is_done', true)->count() }}</h3>
        </div>

        <div class="stat-card">
            <span>Pending</span>
            <h3>{{ $tasks->where('is_done', false)->count() }}</h3>
        </div>

        <div class="stat-card">
            <span>Overdue</span>
            <h3>{{ $overdue ?? 0 }}</h3>
        </div>

        <div class="stat-card">
            <span>Total</span>
            <h3>{{ $tasks->count() }}</h3>
        </div>
    </div>

    {{-- Empty --}}
    @if($tasks->isEmpty())
        <div class="empty">
            <h5>No tasks yet</h5>
            <a href="{{ route('tasks.create') }}" class="btn btn-add">
                Create Task
            </a>
        </div>
    @endif

    {{-- Task List --}}
    <div class="task-grid">

        @foreach($tasks as $task)
        <div class="task-card {{ $task->is_done ? 'done' : 'pending' }}">

<div class="task-top">
                <div>
                    <h5 class="{{ $task->is_done ? 'line' : '' }}">
                        {{ $task->title }}
                    </h5>
                    <p>{{ $task->description ?: 'No description provided.' }}</p>
                    <p><small>Category: {{ $task->category ?: 'Uncategorized' }}</small></p>
                    <p><small>Due: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'Not set' }}</small></p>
                </div>

                <span class="badge {{ $task->is_done ? 'bg-success' : 'bg-warning' }}">
                    {{ $task->is_done ? 'Done' : 'Pending' }}
                </span>
            </div>

            <div class="task-actions">
                <a href="{{ route('tasks.toggle', $task->id) }}" class="btn small success">
                    {{ $task->is_done ? 'Undo' : 'Done' }}
                </a>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn small primary">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn small danger">Delete</button>
                </form>
            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection