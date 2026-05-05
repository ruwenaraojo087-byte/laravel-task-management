@extends('layout')

@section('content')

<div class="dashboard-container">

    {{-- Header --}}
    <div class="dashboard-header">
        <div>
            <h2>All Tasks</h2>
            <p>Complete overview of all tasks</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-add">
            + New Task
        </a>
    </div>

    {{-- Task Table --}}
    <div class="table-responsive">
        <table class="table table-hover" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <thead style="background: #1b4332; color: white;">
                <tr>
                    <th style="padding: 15px;">No.</th>
                    <th style="padding: 15px;">Task Title</th>
                    <th style="padding: 15px;">Description</th>
                    <th style="padding: 15px;">Category</th>
                    <th style="padding: 15px;">Due Date</th>
                    <th style="padding: 15px;">Status</th>
                    <th style="padding: 15px;">Created</th>
                    <th style="padding: 15px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($tasks->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center py-4">No tasks yet</td>
                    </tr>
                @else
                    @foreach($tasks as $index => $task)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 15px;">{{ $index + 1 }}</td>
                        <td style="padding: 15px;">
                            <strong class="{{ $task->is_done ? 'line' : '' }}">{{ $task->title }}</strong>
                        </td>
                        <td style="padding: 15px;">{{ $task->description ?: '—' }}</td>
                        <td style="padding: 15px;">
                            <span class="badge bg-info">{{ $task->category ?: 'Uncategorized' }}</span>
                        </td>
                        <td style="padding: 15px;">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : '—' }}
                        </td>
                        <td style="padding: 15px;">
                            @if($task->is_done)
                                <span class="badge bg-success">Done</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td style="padding: 15px;">{{ $task->created_at->format('M d, Y') }}</td>
                        <td style="padding: 15px;">
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
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>

<style>
.line {
    text-decoration: line-through;
    color: gray;
}
</style>

@endsection
