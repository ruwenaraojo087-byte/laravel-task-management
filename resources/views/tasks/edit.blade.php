@extends('layout')

@section('content')

<div class="card p-4">

    <h3>Edit Task</h3>

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Task Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_done" class="form-check-input"
                {{ $task->is_done ? 'checked' : '' }}>
            <label class="form-check-label">Mark as Done</label>
        </div>

        <button class="btn btn-success">
            Update Task
        </button>

    </form>

</div>

@endsection