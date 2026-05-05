@extends('layout')

@section('content')

<div class="dashboard-container">

    <div class="dashboard-header">
        <div>
            <h2>Categories</h2>
            <p>Manage your task categories</p>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success py-2 px-3 mb-3" style="border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Category Form --}}
    <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}" class="d-flex gap-2 align-items-center">
                @csrf
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="New category name"
                    required
                    style="max-width: 300px;"
                >
                <button type="submit" class="btn btn-add">
                    <i class="bi bi-plus-lg"></i> Add Category
                </button>
            </form>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Categories List --}}
    <div class="task-grid">
        @forelse($categories as $category)
        <div class="task-card">
            <div class="task-top">
                <div>
                    <h5>{{ $category->name }}</h5>
                    <p>{{ $category->tasks->count() }} tasks</p>
                </div>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn small danger" onclick="return confirm('Delete this category?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="empty">
            <h5>No categories yet</h5>
            <p>Add your first category above!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection
