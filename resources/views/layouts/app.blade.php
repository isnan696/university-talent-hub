<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'University Talent Hub')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --primary: #2563EB; --primary-dark: #1D4ED8; --emerald: #10B981; --orange: #F59E0B; --red: #EF4444; --surface: #F8FAFC; --text-primary: #111827; --text-secondary: #6B7280; --border: #E5E7EB; }
        body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: var(--surface); color: var(--text-primary); }
        .sidebar { min-height: 100vh; background: white; border-right: 1px solid var(--border); width: 250px; position: fixed; top: 0; left: 0; z-index: 100; padding-top: 1rem; }
        .sidebar .nav-link { color: var(--text-secondary); padding: 0.75rem 1.5rem; border-radius: 12px; margin: 0.25rem 1rem; transition: all 0.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #EFF6FF; color: var(--primary); }
        .sidebar .nav-link i { margin-right: 12px; font-size: 1.2rem; }
        .main-content { margin-left: 250px; padding: 2rem; }
        .navbar-top { background: white; border-bottom: 1px solid var(--border); padding: 0.75rem 2rem; margin: -2rem -2rem 2rem -2rem; }
        .card, .stat-card { border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.2s; }
        .card:hover, .stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.12); transform: translateY(-2px); }
        .stat-card { padding: 1.5rem; background: white; }
        .btn-primary { background: var(--primary); border: none; border-radius: 12px; padding: 0.5rem 1.5rem; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-success { background: var(--emerald); border: none; border-radius: 12px; }
        .btn-warning { background: var(--orange); border: none; border-radius: 12px; }
        .btn-danger { background: var(--red); border: none; border-radius: 12px; }
        .btn-outline-primary { border-color: var(--primary); color: var(--primary); border-radius: 12px; }
        .badge-approved { background: #D1FAE5; color: #065F46; }
        .badge-pending { background: #FEF3C7; color: #92400E; }
        .badge-rejected { background: #FEE2E2; color: #991B1B; }
        .avatar-initial { width: 40px; height: 40px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; }
        .badge { border-radius: 8px; padding: 0.35em 0.75em; }
        .alert { border-radius: 12px; }
        .form-control, .form-select { border-radius: 12px; border: 1px solid var(--border); padding: 0.6rem 1rem; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .modal-content { border-radius: 20px; border: none; }
        @media (max-width: 768px) { .sidebar { display: none; } .main-content { margin-left: 0; } }
    </style>
</head>
<body>
    @auth
    <div class="sidebar">
        <div class="text-center mb-4 px-3">
            <h5 class="fw-bold" style="color: var(--primary);">Talent Hub</h5>
        </div>
        <hr class="mx-3">
        <nav class="nav flex-column">
            @if(auth()->user()->isAdmin())
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-layout-dashboard"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}" href="{{ route('admin.students.index') }}">
                <i class="bi bi-people"></i> Mahasiswa
            </a>
            <a class="nav-link {{ request()->routeIs('admin.verifications.*') ? 'active' : '' }}" href="{{ route('admin.verifications.index') }}">
                <i class="bi bi-check-circle"></i> Verifikasi
            </a>
            <a class="nav-link {{ request()->routeIs('admin.rewards.*') ? 'active' : '' }}" href="{{ route('admin.rewards.index') }}">
                <i class="bi bi-gift"></i> Reward
            </a>
            <a class="nav-link {{ request()->routeIs('admin.opportunities.*') ? 'active' : '' }}" href="{{ route('admin.opportunities.index') }}">
                <i class="bi bi-megaphone"></i> Opportunity
            </a>
            <a class="nav-link {{ request()->routeIs('admin.leaderboard') ? 'active' : '' }}" href="{{ route('admin.leaderboard') }}">
                <i class="bi bi-trophy"></i> Leaderboard
            </a>
            @else
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-layout-dashboard"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('student.profile.*') ? 'active' : '' }}" href="{{ route('student.profile.edit') }}">
                <i class="bi bi-person-circle"></i> Profil
            </a>
            <a class="nav-link {{ request()->routeIs('student.skills.*') ? 'active' : '' }}" href="{{ route('student.skills.index') }}">
                <i class="bi bi-code-slash"></i> Skill
            </a>
            <a class="nav-link {{ request()->routeIs('student.certificates.*') ? 'active' : '' }}" href="{{ route('student.certificates.index') }}">
                <i class="bi bi-patch-check"></i> Sertifikat
            </a>
            <a class="nav-link {{ request()->routeIs('student.portfolios.*') ? 'active' : '' }}" href="{{ route('student.portfolios.index') }}">
                <i class="bi bi-folder"></i> Portfolio
            </a>
            <a class="nav-link {{ request()->routeIs('student.leaderboard') ? 'active' : '' }}" href="{{ route('student.leaderboard') }}">
                <i class="bi bi-trophy"></i> Leaderboard
            </a>
            <a class="nav-link {{ request()->routeIs('student.rewards.*') ? 'active' : '' }}" href="{{ route('student.rewards.index') }}">
                <i class="bi bi-gift"></i> Reward
            </a>
            <a class="nav-link {{ request()->routeIs('student.recommendations') ? 'active' : '' }}" href="{{ route('student.recommendations') }}">
                <i class="bi bi-stars"></i> AI Rekomendasi
            </a>
            @endif
            <hr class="mx-3">
            <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </nav>
    </div>
    @endauth

    <div class="main-content">
        @auth
        <div class="navbar-top d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">{{ auth()->user()->name }}</span>
                <div class="avatar-initial">{{ substr(auth()->user()->name, 0, 1) }}</div>
            </div>
        </div>
        @endauth

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
