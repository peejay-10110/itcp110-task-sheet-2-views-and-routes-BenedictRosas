<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Benedict Rosas — Full Stack Developer Portfolio" />
    <title>@yield('title', 'Benedict Rosas') · Full Stack Developer</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet" />

    {{-- Vite / Mix assets (swap for your setup) --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0a0a0a;
            --surface:   #111111;
            --border:    #1e1e1e;
            --text:      #e8e8e8;
            --muted:     #666666;
            --accent:    #c8f564;   /* electric lime */
            --accent2:   #3b82f6;
            --font-head: 'Syne', sans-serif;
            --font-mono: 'DM Mono', monospace;
        }

        html { scroll-behavior: smooth; }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: var(--font-mono);
            font-size: 15px;
            line-height: 1.75;
            min-height: 100vh;
        }

        /* ── Nav ── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 3rem;
            border-bottom: 1px solid var(--border);
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(12px);
        }

        .nav-logo {
            font-family: var(--font-head);
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-logo span { color: var(--accent); }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active { color: var(--accent); }

        /* ── Page wrapper ── */
        main {
            padding-top: 80px;
            min-height: calc(100vh - 80px);
        }

        /* ── Footer ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 2.5rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        footer p { color: var(--muted); font-size: 0.78rem; }

        .footer-links { display: flex; gap: 1.5rem; }

        .footer-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.78rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--accent); }

        /* ── Shared Utilities ── */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section { padding: 5rem 0; }

        .section-label {
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        h1, h2, h3, h4 { font-family: var(--font-head); font-weight: 800; letter-spacing: -0.02em; }

        .page-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            line-height: 1.05;
            margin-bottom: 1.25rem;
        }

        .page-subtitle {
            color: var(--muted);
            max-width: 520px;
            font-size: 0.9rem;
            line-height: 1.8;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 3rem 0;
        }

        /* Pill tags */
        .tag {
            display: inline-block;
            padding: 0.2rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 99px;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            color: var(--muted);
        }

        .tag-accent {
            border-color: var(--accent);
            color: var(--accent);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.5rem;
            border-radius: 4px;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--accent);
            color: #0a0a0a;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #d4fa70;
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        /* Card */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 2rem;
            transition: border-color 0.2s, transform 0.2s;
        }

        .card:hover {
            border-color: #333;
            transform: translateY(-2px);
        }

        /* Alert */
        .alert-success {
            background: rgba(200,245,100,0.08);
            border: 1px solid var(--accent);
            border-radius: 6px;
            padding: 1rem 1.5rem;
            color: var(--accent);
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        /* Form inputs */
        .form-group { margin-bottom: 1.25rem; }

        .form-group label {
            display: block;
            font-size: 0.72rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 4px;
            color: var(--text);
            font-family: var(--font-mono);
            font-size: 0.85rem;
            padding: 0.75rem 1rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--accent);
        }

        .form-group textarea { resize: vertical; min-height: 130px; }

        .error-text {
            color: #f87171;
            font-size: 0.72rem;
            margin-top: 0.35rem;
        }

        /* Mobile nav */
        @media (max-width: 640px) {
            nav { padding: 1rem 1.25rem; }
            .nav-links { gap: 1rem; }
            .nav-links a { font-size: 0.72rem; }
            footer { padding: 2rem 1.25rem; flex-direction: column; align-items: flex-start; }
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── Navigation ── --}}
    <nav>
        <a href="{{ route('home') }}" class="nav-logo">br<span>.</span></a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}"       class="{{ request()->routeIs('home')       ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}"      class="{{ request()->routeIs('about')      ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('projects') }}"   class="{{ request()->routeIs('projects*')  ? 'active' : '' }}">Projects</a></li>
            <li><a href="{{ route('skills') }}"     class="{{ request()->routeIs('skills')     ? 'active' : '' }}">Skills</a></li>
            <li><a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'active' : '' }}">Experience</a></li>
            <li><a href="{{ route('blog') }}"       class="{{ request()->routeIs('blog*')      ? 'active' : '' }}">Blog</a></li>
            <li><a href="{{ route('contact') }}"    class="{{ request()->routeIs('contact*')   ? 'active' : '' }}">Contact</a></li>
        </ul>
    </nav>

    {{-- ── Main Content ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    <footer>
        <p>© {{ date('Y') }} Benedict Rosas · Built with Laravel & Blade</p>
        <div class="footer-links">
            <a href="https://github.com/benedictrosas" target="_blank" rel="noopener">GitHub</a>
            <a href="https://linkedin.com/in/benedictrosas" target="_blank" rel="noopener">LinkedIn</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>