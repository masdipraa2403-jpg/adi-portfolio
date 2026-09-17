<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin — Adi Portfolio')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}">

    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    @stack('styles')
</head>
<body class="admin-body">

<aside class="admin-sidebar" id="adminSidebar">
    <a class="brand" href="{{ route('admin.dashboard') }}">Adi<span>.</span></a>
    <div class="admin-label">PORTFOLIO CMS</div>

    <nav aria-label="Navigasi admin">
        <a href="{{ route('admin.dashboard') }}" data-admin-nav="dashboard">⌂ <span>Dashboard</span></a>
        <a href="{{ route('admin.content.index', 'educations') }}" data-admin-nav="educations">◎ <span>Education</span></a>
        <a href="{{ route('admin.content.index', 'experiences') }}" data-admin-nav="experiences">◴ <span>Experience</span></a>
        <a href="{{ route('admin.content.index', 'organizations') }}" data-admin-nav="organizations">◈ <span>Organization</span></a>
        <a href="{{ route('admin.content.index', 'skills') }}" data-admin-nav="skills">✦ <span>Skills</span></a>
        <a href="{{ route('admin.content.index', 'certificates') }}" data-admin-nav="certificates">◇ <span>Certificates</span></a>
        <a href="{{ route('admin.content.index', 'projects') }}" data-admin-nav="projects">▣ <span>Projects</span></a>
        <a href="{{ route('admin.content.index', 'messages') }}" data-admin-nav="messages">✉ <span>Messages</span></a>
    </nav>

    <div class="sidebar-bottom">
        <a href="{{ route('home') }}" target="_blank" rel="noopener">↗ <span>View Website</span></a>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">⇥ <span>Logout</span></button>
        </form>
    </div>
</aside>

<main class="admin-main">
    <header class="admin-top">
        <button class="admin-mobile-toggle" type="button" aria-label="Buka sidebar" aria-controls="adminSidebar" aria-expanded="false">☰</button>

        <div>
            <span class="section-kicker">ADMIN PANEL</span>
            <h1>@yield('heading', 'Dashboard')</h1>
        </div>

        <div class="admin-user">
            <span>AP</span>
            <div>
                <b>{{ auth()->user()->name ?? 'Administrator' }}</b>
                <small>Administrator</small>
            </div>
        </div>
    </header>

    @if(session('success'))
        <div class="alert success admin-alert">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error admin-alert">{{ $errors->first() }}</div>
    @endif

    @yield('content')
</main>

@stack('scripts')
</body>
</html>
