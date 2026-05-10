@extends('layout')

@section('content')
@php
    $user = auth()->user();

    $name = $user?->name ?? 'User';
    $email = $user?->email ?? 'user@example.com';

    // Try to read a membership date if your users table has it.
    // Fallback keeps the UI working even if the field doesn't exist.
    $memberSinceRaw = $user?->created_at ?? null;
    $memberSince = $memberSinceRaw ? \Carbon\Carbon::parse($memberSinceRaw)->format('F Y') : date('F Y');
@endphp

<div class="dashboard-container">
    <div class="dashboard-header">
        <div>
            <h2>My Profile</h2>
            <p class="text-muted mb-0">Account details and quick stats</p>
        </div>
    </div>

    <div class="row g-4 align-items-stretch">
        {{-- Left: profile card --}}
        <div class="col-12 col-lg-5">
            <div class="card" style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="d-flex align-items-center gap-3">
                    <div
                        style="
                            width: 84px;
                            height: 84px;
                            border-radius: 20px;
                            background: rgba(27, 67, 50, 0.08);
                            border: 1px solid rgba(27, 67, 50, 0.15);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                        <i class="bi bi-person-circle" style="font-size: 56px; color: #1b4332;"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h3 class="mb-1" style="font-weight: 700;">{{ $name }}</h3>
                        <p class="text-muted mb-0" style="word-break: break-word;">{{ $email }}</p>
                    </div>
                </div>

                <hr class="my-4" />

                <div class="d-grid gap-3">
                    <div>
                        <div class="d-flex justify-content-between gap-3">
                            <span class="text-muted">Member Since</span>
                            <span style="font-weight: 600;">{{ $memberSince }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between gap-3">
                            <span class="text-muted">Account Type</span>
                            <span style="font-weight: 600;">Standard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: stats card --}}
        <div class="col-12 col-lg-7">
            <div class="card" style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                    <div>
                        <h4 class="mb-1" style="font-weight: 700;">Quick Overview</h4>
                        <p class="text-muted mb-0">Your activity at a glance</p>
                    </div>
                </div>
                
                <div class="stats" style="margin-bottom: 0;">
                    @php
                        // If the controller later passes $tasks, these will show real counts.
                        $tasksTotal = isset($tasks) ? $tasks->count() : null;
                        $tasksDone = isset($tasks) ? $tasks->where('is_done', true)->count() : null;
                        $tasksPending = isset($tasks) ? $tasks->where('is_done', false)->count() : null;
                    @endphp

                    <div class="stat-card">
                        <span>Done</span>
                        <h3>{{ $tasksDone ?? 0 }}</h3>
                    </div>
                    <div class="stat-card">
                        <span>Pending</span>
                        <h3>{{ $tasksPending ?? 0 }}</h3>
                    </div>
                    <div class="stat-card">
                        <span>Total</span>
                        <h3>{{ $tasksTotal ?? 0 }}</h3>
                    </div>
                </div>

                <div class="mt-4" style="background: rgba(27, 67, 50, 0.06); border: 1px solid rgba(27, 67, 50, 0.12); border-radius: 12px; padding: 16px;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div style="font-weight: 700;">Profile Tips</div>
                            <div class="text-muted">Keep tasks updated to see trends in your stats.</div>
                        </div>
                        <a href="{{ url('/tasks') }}" class="btn btn-add">Go to Tasks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

