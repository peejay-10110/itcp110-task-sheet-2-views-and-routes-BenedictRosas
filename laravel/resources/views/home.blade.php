@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    .hero {
        min-height: calc(100vh - 80px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 3rem;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -200px; right: -200px;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(200,245,100,0.06) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-eyebrow {
        font-size: 0.72rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .hero-eyebrow::before {
        content: '';
        display: block;
        width: 28px;
        height: 1px;
        background: var(--accent);
    }

    .hero h1 {
        font-size: clamp(3.5rem, 9vw, 7rem);
        line-height: 0.95;
        margin-bottom: 2rem;
        max-width: 820px;
    }

    .hero h1 .name-accent { color: var(--accent); }

    .hero-desc {
        color: var(--muted);
        max-width: 480px;
        font-size: 0.9rem;
        line-height: 1.8;
        margin-bottom: 2.5rem;
    }

    .hero-cta { display: flex; gap: 1rem; flex-wrap: wrap; }

    .hero-scroll {
        position: absolute;
        bottom: 2.5rem; left: 3rem;
        font-size: 0.68rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--muted);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .hero-scroll::after {
        content: '';
        display: block;
        width: 40px; height: 1px;
        background: var(--muted);
        animation: scrollLine 2s ease-in-out infinite;
    }

    @keyframes scrollLine {
        0%,100% { opacity: 0.3; transform: scaleX(1); }
        50%      { opacity: 1;   transform: scaleX(1.4); }
    }

    /* Stats strip */
    .stats-strip {
        border-top: 1px solid var(--border);
        padding: 2.5rem 3rem;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: var(--border);
    }

    .stat-item {
        background: var(--bg);
        padding: 2rem;
        text-align: center;
    }

    .stat-number {
        font-family: var(--font-head);
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--accent);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.72rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
        margin-top: 0.4rem;
    }

    /* Featured projects */
    .featured { padding: 5rem 3rem; }

    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 2.5rem;
    }

    .featured-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
    }

    .project-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 2rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: border-color 0.2s, transform 0.2s;
    }

    .project-card:hover {
        border-color: var(--accent);
        transform: translateY(-3px);
    }

    .project-card-year {
        font-size: 0.68rem;
        color: var(--muted);
        letter-spacing: 0.1em;
        margin-bottom: 1rem;
    }

    .project-card h3 {
        font-size: 1.15rem;
        margin-bottom: 0.75rem;
    }

    .project-card p {
        color: var(--muted);
        font-size: 0.82rem;
        line-height: 1.7;
        margin-bottom: 1.25rem;
    }

    .project-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; }

    @media (max-width: 640px) {
        .hero { padding: 3rem 1.25rem; }
        .stats-strip { grid-template-columns: repeat(2, 1fr); }
        .featured { padding: 3rem 1.25rem; }
        .section-head { flex-direction: column; gap: 1rem; align-items: flex-start; }
    }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="hero">
    <div class="hero-eyebrow">Available for work</div>

    <h1>
        Benedict<br>
        <span class="name-accent">Rosas.</span>
    </h1>

    <p class="hero-desc">
        Full Stack Developer specializing in Laravel, Vue.js, and scalable web architecture.
        I build fast, clean, and maintainable digital products.
    </p>

    <div class="hero-cta">
        <a href="{{ route('projects') }}" class="btn btn-primary">View Projects →</a>
        <a href="{{ route('contact') }}"  class="btn btn-outline">Get in Touch</a>
    </div>

    <div class="hero-scroll">Scroll</div>
</section>

{{-- Stats --}}
<div class="stats-strip">
    <div class="stat-item">
        <div class="stat-number">6+</div>
        <div class="stat-label">Years Experience</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">40+</div>
        <div class="stat-label">Projects Shipped</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">15+</div>
        <div class="stat-label">Happy Clients</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">100%</div>
        <div class="stat-label">Open Source Friendly</div>
    </div>
</div>

{{-- Featured Projects --}}
<section class="featured">
    <div class="section-head">
        <div>
            <div class="section-label">Selected Work</div>
            <h2 class="page-title" style="font-size:2.2rem;">Featured Projects</h2>
        </div>
        <a href="{{ route('projects') }}" class="btn btn-outline">All Projects →</a>
    </div>

    <div class="featured-grid">
        <a href="{{ route('projects.show', 'ecommerce-platform') }}" class="project-card">
            <div class="project-card-year">2024</div>
            <h3>E-Commerce Platform</h3>
            <p>Multi-vendor marketplace with Stripe payments, real-time inventory, and a custom admin panel.</p>
            <div class="project-tags">
                <span class="tag">Laravel</span>
                <span class="tag">Vue.js</span>
                <span class="tag">Stripe</span>
            </div>
        </a>

        <a href="{{ route('projects.show', 'task-management-app') }}" class="project-card">
            <div class="project-card-year">2024</div>
            <h3>Task Management App</h3>
            <p>Kanban board with real-time collaboration powered by Laravel Echo and Pusher WebSockets.</p>
            <div class="project-tags">
                <span class="tag">Livewire</span>
                <span class="tag">Tailwind</span>
                <span class="tag">Redis</span>
            </div>
        </a>

        <a href="{{ route('projects.show', 'analytics-dashboard') }}" class="project-card">
            <div class="project-card-year">2023</div>
            <h3>Analytics Dashboard</h3>
            <p>Data visualization platform with custom chart components, filters, and CSV export.</p>
            <div class="project-tags">
                <span class="tag">React</span>
                <span class="tag">Chart.js</span>
                <span class="tag">TypeScript</span>
            </div>
        </a>
    </div>
</section>

@endsection