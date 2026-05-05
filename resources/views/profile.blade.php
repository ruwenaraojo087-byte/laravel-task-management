@extends('layout')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>My Profile</h2>
    </div>

    <div class="card" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 80px; color: #1b4332;"></i>
            <h3 class="mt-3">User Profile</h3>
            <p class="text-muted">user@example.com</p>
        </div>
        
        <hr>
        
        <div class="mt-3">
            <p><strong>Name:</strong> User</p>
            <p><strong>Email:</strong> user@example.com</p>
            <p><strong>Member Since:</strong> {{ date('F Y') }}</p>
        </div>
    </div>
</div>
@endsection
