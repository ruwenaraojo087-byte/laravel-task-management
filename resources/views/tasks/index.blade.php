@extends('layout')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">My Tasks</h2>
            <small class="text-muted">Manage and track your daily tasks</small>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            + Add Task
        </a>
    </div>

    
    {{-- Empty State --}}
    @if($tasks->isEmpty())
        <div class="text-center py-5">
            <h5 class="text-muted">No tasks yet</h5>
            <p class="text-muted">Start by adding your first task.</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Create Task
            </a>
        </div>
    @endif

    {{-- Task List --}}
    <div class="row g-3">

        @foreach($tasks as $task)
        <div class="col-md-6">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    {{-- Top Row --}}
                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <h5 class="mb-1 {{ $task->is_done ? 'text-decoration-line-through text-muted' : '' }}">
                                {{ $task->title }}
                            </h5>

                            <p class="text-muted mb-0">
                                {{ $task->description ?: 'No description provided.' }}
                            </p>
                        </div>

                        {{-- Status Badge --}}
                        <div>
                            @if($task->is_done)
                                <span class="badge bg-success">Done</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </div>

                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="card-footer bg-white border-0 d-flex gap-2">

                    <a href="{{ route('tasks.toggle', $task->id) }}" 
                       class="btn btn-sm btn-outline-success">
                        Mark as {{ $task->is_done ? 'Pending' : 'Done' }}
                    </a>

                    <a href="{{ route('tasks.edit', $task->id) }}" 
                       class="btn btn-sm btn-outline-primary">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this task?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-outline-danger">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection