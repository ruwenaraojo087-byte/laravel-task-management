@extends('auth.auth-layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-6" style="max-width: 520px;">
            <div class="auth-card">
                <h3 style="font-weight: 700; margin-bottom: 6px; text-align:center;">Create account</h3>
                <p class="text-muted" style="margin-bottom: 18px; text-align:center;">Sign up to manage tasks</p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <div class="fw-bold mb-1">Can’t register</div>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgba(255,255,255,0.7); border-radius:12px 0 0 12px; border-right:0;">
                                <i class="bi bi-person"></i>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus placeholder="Your name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgba(255,255,255,0.7); border-radius:12px 0 0 12px; border-right:0;">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required placeholder="name@example.com">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgba(255,255,255,0.7); border-radius:12px 0 0 12px; border-right:0;">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input id="password" type="password" name="password" class="form-control" required placeholder="••••••••">
                            <button class="btn btn-light" type="button" id="togglePassword" style="border-radius:0 12px 12px 0; border-left:0;">
                                <i class="bi bi-eye" aria-hidden="true"></i>
                                <span class="visually-hidden">Toggle password visibility</span>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgba(255,255,255,0.7); border-radius:12px 0 0 12px; border-right:0;">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required placeholder="••••••••">
                        </div>
                    </div>

                    <button class="auth-primary w-100 text-white" type="submit">Register</button>

                    <div class="mt-3 text-center">
                        <span class="text-muted">Already have an account? </span>
                        <a class="auth-link" href="{{ route('login') }}">Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function () {
            const toggle = document.getElementById('togglePassword');
            const input = document.getElementById('password');
            if (!toggle || !input) return;

            toggle.addEventListener('click', function () {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';

                const icon = toggle.querySelector('i');
                if (icon) {
                    icon.classList.toggle('bi-eye', !isPassword);
                    icon.classList.toggle('bi-eye-slash', isPassword);
                }
            });
        })();
    </script>
@endsection

