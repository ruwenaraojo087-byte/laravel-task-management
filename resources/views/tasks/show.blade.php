 s@extends('layout')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">
            <h4 class="mb-0">Task Details</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>Title:</strong>
                <p>{{ $task->title }}</p>
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                <p>{{ $task->description ?: '—' }}</p>
            </div>

            <div class="mb-3">
                <strong>Category:</strong>
                <p>{{ $task->category ?: 'Uncategorized' }}</p>
            </div>

            <div class="mb-3">
                <strong>Due Date:</strong>
                <p>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : '—' }}</p>
            </div>

            <div class="mb-3">
                <strong>Status:</strong>
                <p>
                    @if($task->is_done)
                        <span class="badge bg-success">Done</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </p>
            </div>

            <div class="mb-3">
                <strong>Created:</strong>
                <p>{{ $task->created_at->format('M d, Y H:i') }}</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                    Edit
                </a>

                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                    Back to List
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
