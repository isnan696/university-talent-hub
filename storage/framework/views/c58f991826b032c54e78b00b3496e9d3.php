<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'University Talent Hub'); ?></title>
    <meta name="description" content="Platform gamifikasi manajemen talenta mahasiswa universitas">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* ===== Premium Design System (inline for non-Vite) ===== */
        :root {
            --primary: #2563eb; --primary-dark: #1d4ed8; --primary-light: #eff6ff;
            --green: #10b981; --green-bg: #d1fae5; --green-text: #065f46;
            --orange: #f59e0b; --orange-bg: #fef3c7; --orange-text: #92400e;
            --red: #ef4444; --red-bg: #fee2e2; --red-text: #991b1b;
            --cyan: #0891b2; --cyan-bg: #cffafe;
            --ink: #111827; --muted: #64748b; --line: #e2e8f0; --soft: #f8fafc; --panel: #ffffff;
            --shadow-sm: 0 4px 12px rgba(15,23,42,.06); --shadow-md: 0 8px 22px rgba(15,23,42,.08);
            --radius: 12px; --radius-lg: 16px; --transition: .2s ease;
        }
        * { box-sizing: border-box; }
        body { margin:0; background:var(--soft); color:var(--ink); font-family:'Inter',ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; line-height:1.6; -webkit-font-smoothing:antialiased; }

        /* Sidebar */
        .sidebar { position:fixed; top:0; left:0; width:258px; height:100vh; background:var(--panel); border-right:1px solid var(--line); padding:20px 14px; display:flex; flex-direction:column; gap:8px; z-index:100; overflow-y:auto; }
        .brand { display:flex; align-items:center; gap:12px; padding:4px 10px 16px; }
        .brand-mark { width:44px; height:44px; border-radius:10px; background:linear-gradient(135deg,var(--primary),var(--primary-dark)); color:#fff; display:grid; place-items:center; font-weight:800; font-size:14px; flex-shrink:0; box-shadow:0 4px 12px rgba(37,99,235,.3); }
        .brand-text strong { display:block; font-size:15px; font-weight:700; color:var(--ink); line-height:1.3; }
        .brand-text span { color:var(--muted); font-size:12px; }
        .sidebar .nav { display:flex; flex-direction:column; gap:4px; flex:1; }
        .sidebar .nav-link { color:var(--muted); padding:11px 14px; border-radius:10px; margin:0; transition:var(--transition); display:flex; align-items:center; gap:11px; font-size:14px; font-weight:500; text-decoration:none; border:1px solid transparent; }
        .sidebar .nav-link:hover { background:var(--primary-light); color:var(--primary); border-color:rgba(37,99,235,.08); }
        .sidebar .nav-link.active { background:var(--primary-light); color:var(--primary); font-weight:600; border-color:rgba(37,99,235,.12); }
        .sidebar .nav-link i { font-size:1.15rem; width:22px; text-align:center; }
        .sidebar .nav-link.text-danger { color:var(--red)!important; }
        .sidebar .nav-link.text-danger:hover { background:var(--red-bg); border-color:rgba(239,68,68,.1); }
        .sidebar-divider { height:1px; background:var(--line); margin:8px 8px; }
        .sidebar-profile { margin-top:auto; border:1px solid var(--line); border-radius:var(--radius); padding:14px; background:var(--soft); }
        .sidebar-profile strong { display:block; font-size:14px; color:var(--ink); }
        .sidebar-profile span { color:var(--muted); font-size:12px; }

        /* Main */
        .main-content { margin-left:258px; min-height:100vh; }
        .navbar-top { background:var(--panel); border-bottom:1px solid var(--line); padding:14px 28px; display:flex; align-items:center; justify-content:space-between; gap:16px; position:sticky; top:0; z-index:50; margin:0; }
        .navbar-top h5 { margin:0; font-size:18px; font-weight:700; }
        .nav-actions { display:flex; align-items:center; gap:12px; }
        .user-info { display:flex; align-items:center; gap:10px; padding:6px 12px; border-radius:var(--radius); background:var(--soft); border:1px solid var(--line); }
        .user-info span { font-size:13px; color:var(--muted); font-weight:500; }
        .page-content { padding:24px 28px; }

        /* Avatar */
        .avatar-initial { width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--primary),var(--cyan)); color:white; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:15px; flex-shrink:0; }
        .avatar-initial.lg { width:66px; height:66px; font-size:22px; }
        .avatar { width:40px; height:40px; border-radius:50%; object-fit:cover; }

        /* Stat */
        .stat-card { background:var(--panel); border:1px solid var(--line); border-radius:var(--radius-lg); padding:20px; box-shadow:var(--shadow-sm); transition:var(--transition); display:flex; align-items:center; justify-content:space-between; gap:12px; }
        .stat-card:hover { box-shadow:var(--shadow-md); transform:translateY(-2px); }
        .stat-label { margin:0; color:var(--muted); font-size:13px; font-weight:500; }
        .stat-value { font-size:28px; font-weight:800; margin:4px 0 0; line-height:1; }
        .stat-icon { width:46px; height:46px; border-radius:12px; display:grid; place-items:center; font-size:1.2rem; flex-shrink:0; }
        .stat-icon.blue { background:#dbeafe; color:var(--primary); }
        .stat-icon.mint { background:var(--green-bg); color:#047857; }
        .stat-icon.amber { background:var(--orange-bg); color:#b45309; }
        .stat-icon.rose { background:var(--red-bg); color:#b91c1c; }
        .stat-icon.cyan { background:var(--cyan-bg); color:var(--cyan); }

        /* Cards */
        .card { background:var(--panel); border:1px solid var(--line); border-radius:var(--radius-lg); box-shadow:var(--shadow-sm); transition:var(--transition); }
        .card:hover { box-shadow:var(--shadow-md); }

        /* Badges */
        .badge { border-radius:999px; padding:5px 12px; font-size:12px; font-weight:600; }
        .badge-approved { background:var(--green-bg); color:var(--green-text); }
        .badge-pending { background:var(--orange-bg); color:var(--orange-text); }
        .badge-rejected { background:var(--red-bg); color:var(--red-text); }

        /* Buttons */
        .btn { border-radius:var(--radius); transition:var(--transition); }
        .btn:hover { transform:translateY(-1px); }
        .btn-primary { background:var(--primary); border-color:var(--primary); }
        .btn-primary:hover { background:var(--primary-dark); border-color:var(--primary-dark); box-shadow:0 8px 18px rgba(37,99,235,.2); }
        .btn-success { background:var(--green); border-color:var(--green); }
        .btn-warning { background:var(--orange); border-color:var(--orange); color:#fff; }
        .btn-danger { background:var(--red); border-color:var(--red); }
        .btn-outline-primary { border-color:var(--primary); color:var(--primary); border-radius:var(--radius); }
        .btn-logout { display:inline-flex; align-items:center; gap:8px; padding:8px 16px; border-radius:var(--radius); border:1px solid var(--line); background:var(--panel); color:var(--red); font-size:13px; font-weight:600; cursor:pointer; transition:var(--transition); text-decoration:none; }
        .btn-logout:hover { background:var(--red-bg); border-color:var(--red); color:var(--red); transform:translateY(-1px); box-shadow:0 4px 12px rgba(239,68,68,.15); }

        /* Forms */
        .form-control,.form-select { border-radius:var(--radius); border:1px solid var(--line); padding:10px 14px; }
        .form-control:focus,.form-select:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(37,99,235,.1); }

        /* Tables */
        .table th { color:var(--muted); font-size:12px; text-transform:uppercase; letter-spacing:.05em; background:var(--soft); font-weight:600; }

        /* Misc */
        .alert { border-radius:var(--radius); }
        .modal-content { border-radius:20px; border:none; }
        .pagination .page-link { border-radius:var(--radius); margin:0 2px; }
        .progress-custom { width:min(360px,100%); height:9px; background:#e5e7eb; border-radius:999px; overflow:hidden; }
        .progress-custom .progress-fill { height:100%; background:linear-gradient(90deg,var(--primary),var(--cyan)); border-radius:999px; transition:width .4s ease; }
        .profile-completion { height:8px; border-radius:4px; }

        /* Leader */
        .leader-row { display:grid; grid-template-columns:36px minmax(0,1fr) auto; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid var(--line); }
        .leader-row:last-child { border-bottom:0; }
        .rank-badge { width:32px; height:32px; border-radius:8px; background:#f1f5f9; display:grid; place-items:center; font-weight:800; font-size:14px; color:var(--muted); }
        .rank-badge.top { background:var(--orange-bg); color:#b45309; }

        /* Recommendation */
        .recommendation-card { border-left:4px solid var(--primary); background:var(--soft); border-radius:0 var(--radius) var(--radius) 0; padding:16px; margin-bottom:10px; transition:var(--transition); }
        .recommendation-card:hover { box-shadow:var(--shadow-sm); transform:translateX(2px); }
        .recommendation-card h6 { margin:0 0 4px; font-size:14px; font-weight:600; }
        .recommendation-card p { margin:0; color:var(--muted); font-size:13px; }

        /* Activity */
        .activity-item { display:flex; align-items:center; justify-content:space-between; gap:14px; border:1px solid var(--line); border-radius:var(--radius); padding:14px; background:var(--panel); transition:var(--transition); margin-bottom:8px; }
        .activity-item:last-child { margin-bottom:0; }
        .activity-item:hover { box-shadow:var(--shadow-sm); border-color:rgba(37,99,235,.15); }
        .activity-item h6 { margin:0; font-size:14px; font-weight:600; }
        .activity-item p { margin:3px 0 0; color:var(--muted); font-size:13px; }

        /* Responsive */
        @media(max-width:992px) {
            .sidebar { width: 220px; }
            .main-content { margin-left: 220px; }
        }
        @media(max-width:768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            }
            .sidebar.active {
                transform: translateX(0);
                display: flex !important;
            }
            .main-content { margin-left: 0; }
            .navbar-top { padding: 12px 16px; }
            .page-content { padding: 16px; }
            .user-info span { display: none; } /* Hide name on small mobile */
        }
        
        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 99;
        }
        .sidebar-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <?php if(auth()->guard()->check()): ?>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <div class="brand-mark">UTH</div>
            <div class="brand-text">
                <strong>University Talent Hub</strong>
                <span>Gamifikasi talenta mahasiswa</span>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        <nav class="nav flex-column">
            <?php if(auth()->user()->isAdmin()): ?>
            <a class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('admin.students.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.students.index')); ?>">
                <i class="bi bi-people-fill"></i> Mahasiswa
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('admin.verifications.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.verifications.index')); ?>">
                <i class="bi bi-check-circle-fill"></i> Verifikasi
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('admin.rewards.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.rewards.index')); ?>">
                <i class="bi bi-gift-fill"></i> Reward
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('admin.opportunities.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.opportunities.index')); ?>">
                <i class="bi bi-megaphone-fill"></i> Opportunity
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('admin.leaderboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.leaderboard')); ?>">
                <i class="bi bi-trophy-fill"></i> Leaderboard
            </a>
            <?php else: ?>
            <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.profile.*') ? 'active' : ''); ?>" href="<?php echo e(route('student.profile.edit')); ?>">
                <i class="bi bi-person-circle"></i> Profil
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.skills.*') ? 'active' : ''); ?>" href="<?php echo e(route('student.skills.index')); ?>">
                <i class="bi bi-code-slash"></i> Skill
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.certificates.*') ? 'active' : ''); ?>" href="<?php echo e(route('student.certificates.index')); ?>">
                <i class="bi bi-patch-check-fill"></i> Sertifikat
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.portfolios.*') ? 'active' : ''); ?>" href="<?php echo e(route('student.portfolios.index')); ?>">
                <i class="bi bi-folder-fill"></i> Portfolio
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.leaderboard') ? 'active' : ''); ?>" href="<?php echo e(route('student.leaderboard')); ?>">
                <i class="bi bi-trophy-fill"></i> Leaderboard
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.rewards.*') ? 'active' : ''); ?>" href="<?php echo e(route('student.rewards.index')); ?>">
                <i class="bi bi-gift-fill"></i> Reward
            </a>
            <a class="nav-link <?php echo e(request()->routeIs('student.recommendations') ? 'active' : ''); ?>" href="<?php echo e(route('student.recommendations')); ?>">
                <i class="bi bi-stars"></i> AI Rekomendasi
            </a>
            <?php endif; ?>

            <div class="sidebar-divider"></div>

            <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none"><?php echo csrf_field(); ?></form>
        </nav>

        <div class="sidebar-profile">
            <strong><?php echo e(auth()->user()->name); ?></strong>
            <span><?php echo e(auth()->user()->email); ?></span>
        </div>
    </aside>
    <?php endif; ?>

    <div class="main-content">
        <?php if(auth()->guard()->check()): ?>
        <div class="navbar-top">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-outline-secondary d-md-none border-0 px-2" id="sidebarToggleBtn" aria-label="Toggle Navigation">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h5>
            </div>
            <div class="nav-actions">
                <div class="user-info">
                    <div class="avatar-initial" style="width:34px;height:34px;font-size:13px;"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 2))); ?></div>
                    <span><?php echo e(auth()->user()->name); ?></span>
                </div>
                <a href="#" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form-top" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none"><?php echo csrf_field(); ?></form>
            </div>
        </div>
        <?php endif; ?>

        <div class="page-content">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (toggleBtn && sidebar && overlay) {
                function toggleSidebar() {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                }

                toggleBtn.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Isnan\Study Case Lomba TOPRANK\University Talent Hub\resources\views/layouts/app.blade.php ENDPATH**/ ?>