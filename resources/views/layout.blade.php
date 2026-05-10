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
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #d8f3dc, #b7e4c7);
    overflow-x: hidden;
}

/* top-navbar */
.top-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 56px;
    background: #1b4332;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    z-index: 1040;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.top-navbar .nav-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.top-navbar .nav-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.toggle-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 5px;
    border-radius: 6px;
    transition: background 0.2s;
}

.toggle-btn:hover {
    background: rgba(255,255,255,0.1);
}

.app-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0;
}

/* sidbar */
.sidebar {
    width: 250px;
    background: #1b4332;
    color: white;
    height: calc(100vh - 56px);
    padding: 20px;
    position: fixed;
    top: 56px;
    left: 0;
    transition: all 0.3s ease-in-out;
    z-index: 1030;
    overflow-y: auto;
    overflow-x: hidden;
}

.sidebar.collapsed {
    width: 0;
    padding: 20px 0;
}

.sidebar h3 {
    margin-bottom: 20px;
    white-space: nowrap;
    transition: opacity 0.2s;
}

.sidebar.collapsed h3 {
    opacity: 0;
}

.menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu li {
    margin-bottom: 8px;
}

.menu a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #d8f3dc;
    padding: 10px 12px;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s;
    white-space: nowrap;
}

.menu a i {
    font-size: 1.2rem;
    min-width: 24px;
    text-align: center;
}

.menu a:hover {
    background: #2d6a4f;
    color: white;
}

.menu a.active {
    background: #40916c;
    color: white;
    font-weight: 500;
}

/* main */
.main {
    margin-left: 250px;
    margin-top: 56px;
    padding: 20px;
    transition: margin-left 0.3s ease-in-out;
}

.sidebar.collapsed ~ .main {
    margin-left: 0;
}

/* wrapper */
.dashboard-container {
    max-width: 1100px;
    margin: auto;
}

/* header */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    margin-top: 0px;
}

/* statss */
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

/* task grid */
.task-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

/* task card */
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

.task-card.done {
    background: #d8f3dc;
}

.task-card.pending {
    background: #fff3cd;
}

.line {
    text-decoration: line-through;
    color: gray;
}

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

/* buttons */
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

.success { background: #34634e; color: white; }
.primary { background: #4662af; color: white; }
.danger  { background: #d44747; color: white; }

/* kapag warang task */
.empty {
    text-align: center;
    margin-top: 40px;
}

@media (max-width: 768px) {
    .sidebar {
        width: 250px;
        left: -250px;
        top: 56px;
        height: calc(100vh - 56px);
    }

    .sidebar.show {
        left: 0;
    }

    .main {
        margin-left: 0;
    }

    .task-grid {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>

<body>

<!-- TOP NAVBAR -->
<div class="top-navbar">
    <div class="nav-left">
        <button class="toggle-btn" id="sidebarToggle" type="button" aria-label="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="app-title">Task Manager</span>
    </div>
    <div class="nav-right">
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background: rgba(255,255,255,0.1);">
                <i class="bi bi-person-circle"></i>
                <span class="d-none d-md-inline">Profile</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="bi bi-person me-2"></i>My Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <h3>Menu</h3>

    <ul class="menu">
        <li>
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
       
<li>
            <a href="{{ url('/stats') }}" class="{{ request()->is('stats') ? 'active' : '' }}">
                <i class="bi bi-bar-chart"></i>
                <span>Stats</span>
            </a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i>
                <span>Categories</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/tasks/table') }}" class="{{ request()->is('tasks/table') ? 'active' : '' }}">
                <i class="bi bi-table"></i>
                <span>All Tasks</span>
            </a>
        </li>
        
    </ul>
</div>

<!-- MAIN CONTENT -->
<div class="main">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');

    sidebarToggle.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
        } else {
            sidebar.classList.toggle('collapsed');
        }
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
</script>

</body>
</html>

