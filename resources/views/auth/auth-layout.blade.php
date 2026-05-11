<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            overflow-x: hidden;
            background: #ffffff;
        }

        /* Bubble background */
        .bubble-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
            background: radial-gradient(circle at top, #84ff7d 0%, #7ae4ff 35%, #ffffff 100%);
        }

        .bubble {
            position: absolute;
            bottom: -120px;
            width: var(--size);
            height: var(--size);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(2px);
            animation: floatUp var(--duration) linear infinite;
            opacity: var(--opacity);
        }

        @keyframes floatUp {
            0% { transform: translateY(0) translateX(0); }
            100% { transform: translateY(-120vh) translateX(var(--drift)); }
        }

        /* Make sure auth content stays above bubbles */
        .auth-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 32px 16px;
            position: relative;
            z-index: 1;
        }


        .auth-brand {
            text-align: center;
            margin-bottom: 18px;
        }

        .auth-brand .brand-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #1b4332;
            margin: 0;
        }

        .auth-card {
            background: rgba(239, 252, 253, 0.78);
            backdrop-filter: blur(10px);
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 18px 50px rgba(0,0,0,0.08);
            border: 1px solid rgba(255, 255, 255, 0.55);
        }

        .auth-title {
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #1b4332;
        }

        .auth-subtitle {
            margin-top: 6px;
            margin-bottom: 18px;
            color: #5a6b63;
        }

        .auth-form .form-label {
            font-weight: 600;
            color: #234a3a;
        }

        .auth-form .form-control {
            border-radius: 12px;
            border: 1px solid rgba(0,0,0,0.08);
            background: rgba(255,255,255,0.7);
        }

        .auth-form .form-control:focus {
            border-color: rgba(64, 145, 108, 0.8);
            box-shadow: 0 0 0 4px rgba(64, 145, 108, 0.15);
            background: rgba(255,255,255,0.9);
        }

        .auth-primary {
            background: #1b4332;
            border: 0;
            border-radius: 12px;
            padding: 10px 14px;
            font-weight: 700;
        }

        .auth-primary:hover {
            background: #163a2b;
        }

        .auth-link {
            color: #1b4332;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-link:hover {
            color: #163a2b;
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="bubble-bg" aria-hidden="true">
        <div class="bubble" style="--size: 110px; --duration: 10s; --opacity: 0.35; --drift: -40px;"></div>
        <div class="bubble" style="--size: 75px; --duration: 12s; --opacity: 0.25; --drift: 35px; left: 20%;"></div>
        <div class="bubble" style="--size: 140px; --duration: 16s; --opacity: 0.20; --drift: -60px; left: 70%;"></div>
        <div class="bubble" style="--size: 95px; --duration: 14s; --opacity: 0.22; --drift: 50px; left: 35%;"></div>
        <div class="bubble" style="--size: 60px; --duration: 11s; --opacity: 0.18; --drift: -25px; left: 55%;"></div>
        <div class="bubble" style="--size: 125px; --duration: 18s; --opacity: 0.14; --drift: 65px; left: 85%;"></div>
    </div>

    <div class="auth-wrap">
        <div class="container">
            {{-- Brand header intentionally removed for login/register cards to keep title inside the box. --}}



            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

