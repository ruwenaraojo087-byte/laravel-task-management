@extends('layout')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">
            <h4 class="mb-0">Edit Task</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input 
                        type="text"  
                        id="title"
                        name="title" 
                        value="{{ old('title', $task->title) }}" 
                        class="form-control @error('title') is-invalid @enderror"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

{{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        id="description"
                        name="description" 
                        class="form-control @error('description') is-invalid @enderror"
                        rows="4"
                    >{{ old('description', $task->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Due Date --}}
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input 
                        type="date" 
                        id="due_date"
                        name="due_date" 
                        class="form-control @error('due_date') is-invalid @enderror"
                        value="{{ old('due_date', $task->due_date) }}"
                    >

                    @error('due_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <option value="">Select a category</option>
        @forelse($categories as $category)
            <option value="{{ $category->name }}" {{ $task->category == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
        @empty
            <option value="">No categories - add one first!</option>
        @endforelse
    </select>
    @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

                {{-- Status --}}
                <div class="form-check mb-4">
                    <input 
                        type="checkbox" 
                        name="is_done" 
                        id="is_done"
                        class="form-check-input"
                        {{ old('is_done', $task->is_done) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="is_done">
                        Mark as Done
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Update Task
                    </button>

                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection