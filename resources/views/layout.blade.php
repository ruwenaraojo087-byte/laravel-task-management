<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
/* GLOBAL */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #d8f3dc, #b7e4c7);
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    background: #1b4332;
    color: white;
    height: 100vh;
    padding: 20px;
    position: fixed;
}

.sidebar h3 {
    margin-bottom: 20px;
}

.menu a {
    display: block;
    color: #d8f3dc;
    padding: 8px;
    margin-bottom: 8px;
    text-decoration: none;
    border-radius: 8px;
}

.menu a:hover {
    background: #2d6a4f;
}

/* MAIN CONTENT */
.main {
    margin-left: 240px;
    padding: 20px;
}

/* DASHBOARD WRAPPER */
.dashboard-container {
    max-width: 1100px;
    margin: auto;
}

/* HEADER */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

/* STATS */
.stats {
    display: flex;
    gap: 15px;
    margin-bottom: 25px;
}

.stat-card {
    flex: 1;
    background: white;
    padding: 15px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* TASK GRID */
.task-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

/* TASK CARD */
.task-card {
    background: white;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.task-card:hover {
    transform: translateY(-5px);
}

/* TASK STATES */
.task-card.done {
    background: #d8f3dc;
}

.task-card.pending {
    background: #fff3cd;
}

/* TEXT */
.line {
    text-decoration: line-through;
    color: gray;
}

/* ACTIONS */
.task-actions {
    margin-top: 10px;
    display: flex;
    gap: 8px;
}

.category-select {
    width: 50%;
    padding: 5px 6px;
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    background: white;
    font-size: 14px;
    outline: none;
    transition: 0.2s;
    cursor: pointer;
    margin-bottom: 10px;
}

.category-select:focus {
    border-color: #2d6a4f;
    box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.2);
}

/* BUTTONS */
.btn {
    border: none;
    padding: 6px 10px;
    border-radius: 8px;
    cursor: pointer;
}

.btn-add {
    background: #40916c;
    color: white;
}

.success { background: #2d6a4f; color: white; }
.primary { background: #1d4ed8; color: white; }
.danger  { background: #dc2626; color: white; }

/* EMPTY STATE */
.empty {
    text-align: center;
    margin-top: 40px;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
        <h3>Menu</h3>

        <div class="menu">
            <a href="{{ url('/') }}">🏠 Home</a>
            <a href="{{ url('/tasks') }}">📋 Tasks</a>
            <a href="{{ url('/stats') }}">📊 Stats</a>
            <a href="#">👤 Profile</a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main">
        @yield('content')
    </div>


</body>
</html>