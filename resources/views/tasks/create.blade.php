@extends('layout')

@section('content')

<div class="card p-4">

    <h3>Add New Task</h3>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <label>Task Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">
            Save Task
        </button>

    </form>

</div>

@endsection