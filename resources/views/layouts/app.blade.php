<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAC Admin Panel</title>
    <meta name="description" content="RAC Blog Administration Dashboard">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <style>
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #334155;
            --accent-start: #6366f1;
            --accent-end: #8b5cf6;
            --accent-glow: rgba(99, 102, 241, 0.15);
            --header-bg: #ffffff;
            --body-bg: #f1f5f9;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --border-color: #e2e8f0;
        }

        * { font-family: 'Inter', sans-serif; }

        /* ── Scrollbar ── */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 99px; }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }

        /* ── Sidebar ── */
        .sidebar {
            background: var(--sidebar-bg);
            transition: width 0.3s cubic-bezier(.4,0,.2,1);
        }
        .sidebar-brand {
            background: linear-gradient(135deg, var(--accent-start), var(--accent-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .nav-link {
            position: relative;
            padding: 0.625rem 1.25rem;
            margin: 2px 0.75rem;
            border-radius: 0.5rem;
            color: var(--text-muted);
            font-size: 0.8125rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .nav-link:hover {
            background: var(--sidebar-hover);
            color: #e2e8f0;
        }
        .nav-link.active {
            background: var(--accent-glow);
            color: #a5b4fc;
        }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            border-radius: 0 3px 3px 0;
            background: linear-gradient(180deg, var(--accent-start), var(--accent-end));
        }
        .nav-link .nav-icon {
            width: 1.25rem;
            text-align: center;
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        .nav-section-label {
            font-size: 0.625rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(148,163,184,0.5);
            padding: 1.25rem 1.25rem 0.375rem 2rem;
        }

        /* ── Header ── */
        .top-header {
            background: var(--header-bg);
            border-bottom: 1px solid var(--border-color);
            backdrop-filter: blur(10px);
        }
        .search-input {
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem 0.5rem 2.25rem;
            font-size: 0.8125rem;
            color: var(--text-primary);
            transition: all 0.2s ease;
            width: 280px;
        }
        .search-input:focus {
            outline: none;
            border-color: var(--accent-start);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
            background: white;
        }

        /* ── User Avatar ── */
        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, var(--accent-start), var(--accent-end));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.8125rem;
        }

        /* ── Main Content ── */
        .main-content {
            background: var(--body-bg);
            min-height: 100vh;
        }

        /* ── Cards ── */
        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            transition: all 0.25s ease;
        }
        .stat-card:hover {
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            transform: translateY(-2px);
        }
        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.125rem;
        }

        /* ── Mobile Overlay ── */
        .mobile-overlay {
            background: rgba(15,23,42,0.6);
            backdrop-filter: blur(4px);
        }

        /* ── Animations ── */
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-100%); }
            to { opacity: 1; transform: translateX(0); }
        }
        .mobile-sidebar-enter {
            animation: slideIn 0.3s ease forwards;
        }

        /* ── Dropdown ── */
        .dropdown-menu {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            min-width: 200px;
        }
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.8125rem;
            color: var(--text-secondary);
            transition: all 0.15s ease;
        }
        .dropdown-item:hover {
            background: #f8fafc;
            color: var(--text-primary);
        }
    </style>
</head>
<body class="antialiased" style="background: var(--body-bg);">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- ═══════════════════════════════════════════ -->
        <!-- Mobile Sidebar Overlay                      -->
        <!-- ═══════════════════════════════════════════ -->
        <div x-show="sidebarOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 z-40 mobile-overlay sm:hidden">
        </div>

        <!-- ═══════════════════════════════════════════ -->
        <!-- Sidebar                                     -->
        <!-- ═══════════════════════════════════════════ -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-50 w-64 sidebar flex flex-col transform transition-transform duration-300 ease-in-out sm:translate-x-0 sm:static sm:inset-auto sm:z-auto">

            <!-- Brand -->
            <div class="flex items-center gap-3 px-5 py-5 flex-shrink-0">
                <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--accent-start),var(--accent-end));display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-bolt" style="color:white;font-size:1rem;"></i>
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg leading-none">RAC Admin</h1>
                    <p style="font-size:0.6875rem;color:var(--text-muted);margin-top:2px;">Management Panel</p>
                </div>
                <!-- Mobile close button -->
                <button @click="sidebarOpen = false" class="sm:hidden ml-auto text-gray-400 hover:text-white transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-2">

                <div class="nav-section-label">Main</div>

                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                    Dashboard
                </a>

                <div class="nav-section-label">Content</div>

                <a href="/add-post" class="nav-link {{ request()->is('add-post') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-pen-fancy"></i></span>
                    Blog Posts
                </a>
                <a href="/news" class="nav-link {{ request()->is('news') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-newspaper"></i></span>
                    News
                </a>
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-project-diagram"></i></span>
                    Projects
                </a>
                <a href="/events" class="nav-link {{ request()->is('events') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-calendar-alt"></i></span>
                    Events
                </a>
                <a href="{{ route('testimonials.index') }}" class="nav-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-quote-right"></i></span>
                    Testimonials
                </a>

                <div class="nav-section-label">Organization</div>

                <a href="/exco" class="nav-link {{ request()->is('exco') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Exco Members
                </a>
                <a href="{{ route('directors.index') }}" class="nav-link {{ request()->routeIs('directors.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-user-tie"></i></span>
                    Directors
                </a>
                <a href="{{ route('members.index') }}" class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-award"></i></span>
                    Member of the Month
                </a>
                <a href="{{ route('avenues.index') }}" class="nav-link {{ request()->routeIs('avenues.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-road"></i></span>
                    Avenues
                </a>

                <div class="nav-section-label">Reports</div>

                <a href="{{ route('annual-reports.index') }}" class="nav-link {{ request()->routeIs('annual-reports.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                    Annual Reports
                </a>
                <a href="{{ route('rda.index') }}" class="nav-link {{ request()->routeIs('rda.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-trophy"></i></span>
                    RDA
                </a>

                <div class="nav-section-label">Settings</div>

                <a href="{{ route('site-settings.index') }}" class="nav-link {{ request()->routeIs('site-settings.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-sliders-h"></i></span>
                    Site Settings
                </a>

            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 flex-shrink-0 border-t" style="border-color: rgba(255,255,255,0.06);">
                <a href="/home" target="_blank" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-medium transition" style="color: var(--text-muted); background: var(--sidebar-hover);">
                    <i class="fas fa-external-link-alt"></i>
                    View Live Site
                </a>
            </div>
        </aside>

        <!-- ═══════════════════════════════════════════ -->
        <!-- Main Area                                   -->
        <!-- ═══════════════════════════════════════════ -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Header -->
            <header class="top-header flex items-center justify-between px-6 py-3 flex-shrink-0">
                <div class="flex items-center gap-4">
                    <!-- Mobile menu toggle -->
                    <button @click="sidebarOpen = true" class="sm:hidden text-gray-500 hover:text-gray-700 transition">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                    <!-- Search -->
                    <div class="relative hidden sm:block">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2" style="color: var(--text-muted); font-size: 0.75rem;"></i>
                        <input type="text" placeholder="Search anything..." class="search-input">
                    </div>
                </div>

                <!-- Right side -->
                <div class="flex items-center gap-3">
                    <!-- Notification bell -->
                    <button class="relative p-2 rounded-lg hover:bg-gray-100 transition" style="color: var(--text-secondary);">
                        <i class="fas fa-bell" style="font-size: 0.9375rem;"></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full" style="background: #ef4444;"></span>
                    </button>

                    <!-- Divider -->
                    <div class="hidden sm:block w-px h-8" style="background: var(--border-color);"></div>

                    <!-- User Dropdown -->
                    <div x-data="{ userDropdown: false }" class="relative">
                        <button @click="userDropdown = !userDropdown" class="flex items-center gap-2.5 px-2 py-1.5 rounded-lg hover:bg-gray-50 transition">
                            <div class="user-avatar">
                                @auth
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                @endauth
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-sm font-semibold leading-none" style="color: var(--text-primary);">
                                    @auth {{ Auth::user()->name }} @endauth
                                </p>
                                <p class="text-xs mt-0.5" style="color: var(--text-muted);">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down hidden sm:block" style="font-size:0.625rem; color: var(--text-muted);"></i>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="userDropdown"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 transform -translate-y-1"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             @click.outside="userDropdown = false"
                             class="absolute right-0 mt-2 dropdown-menu z-50 py-1.5"
                             style="display: none;">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="fas fa-user-circle"></i>
                                Profile
                            </a>
                            <div class="my-1" style="border-top: 1px solid var(--border-color);"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left" style="color: #ef4444;">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6" style="background: var(--body-bg);">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts

</body>
</html>
