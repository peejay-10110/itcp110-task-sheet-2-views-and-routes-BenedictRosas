@extends('layouts.app')

@section('title', 'About')

@push('styles')
<style>
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 5rem;
        align-items: start;
    }

    .about-bio p {
        color: var(--muted);
        font-size: 0.9rem;
        line-height: 1.9;
        margin-bottom: 1.25rem;
    }

    .about-bio p strong { color: var(--text); }

    .side-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
        position: sticky;
        top: 100px;
    }

    .avatar-placeholder {
        width: 100%;
        aspect-ratio: 1;
        background: linear-gradient(135deg, #1a1a1a, #111);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-head);
        font-size: 4rem;
        font-weight: 800;
        color: var(--accent);
        border-bottom: 1px solid var(--border);
    }

    .side-info { padding: 1.5rem; }

    .side-info h3 {
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }

    .side-info .role-label {
        color: var(--accent);
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        margin-bottom: 1.25rem;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.6rem 0;
        border-bottom: 1px solid var(--border);
        font-size: 0.78rem;
    }

    .info-row:last-child { border-bottom: none; }
    .info-row span:first-child { color: var(--muted); }
    .info-row span:last-child  { color: var(--text); text-align: right; }

    .skills-list {
        margin-top: 3rem;
    }

    .skill-group { margin-bottom: 2rem; }

    .skill-group-title {
        font-size: 0.68rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.75rem;
    }

    .skill-chips { display: flex; flex-wrap: wrap; gap: 0.5rem; }

    .skill-chip {
        padding: 0.3rem 0.85rem;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 0.75rem;
        color: var(--muted);
        transition: border-color 0.2s, color 0.2s;
    }

    .skill-chip:hover {
        border-color: var(--accent);
        color: var(--accent);
    }

    @media (max-width: 768px) {
        .about-grid { grid-template-columns: 1fr; }
        .side-card { position: static; }
    }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Who I Am</div>
    <h1 class="page-title">About Me</h1>

    <div class="about-grid">
        <div>
            <div class="about-bio">
                <p>
                    Hey, I'm <strong>Benedict Rosas</strong> — a Full Stack Developer based in Cavite, Philippines
                    with over <strong>6 years of experience</strong> building web applications that are fast, maintainable, and delightful to use.
                </p>
                <p>
                    My core stack is <strong>Laravel + Vue.js</strong>, though I'm equally comfortable on the frontend with React
                    and Tailwind CSS or diving into DevOps with Docker and AWS. I care deeply about clean code,
                    sensible architecture, and shipping things that actually work.
                </p>
                <p>
                    I started my career as a junior PHP developer, and over the years I've grown into leading development
                    teams, designing system architecture, and mentoring junior developers. I believe great software is
                    the result of clarity — clear goals, clear code, and clear communication.
                </p>
                <p>
                    Outside of work, you'll find me writing on my <a href="{{ route('blog') }}" style="color:var(--accent);">blog</a>,
                    contributing to open source, or enjoying a strong cup of coffee while reading about distributed systems.
                </p>

                <div style="margin-top:2rem; display:flex; gap:1rem; flex-wrap:wrap;">
                    <a href="{{ route('experience') }}" class="btn btn-primary">View Experience →</a>
                    <a href="{{ route('contact') }}"    class="btn btn-outline">Let's Talk</a>
                </div>
            </div>

            <hr class="divider">

            {{-- Skill Groups --}}
            <div class="skills-list">
                <div class="section-label">Core Skills</div>
                @foreach($skills as $group => $items)
                <div class="skill-group">
                    <div class="skill-group-title">{{ $group }}</div>
                    <div class="skill-chips">
                        @foreach($items as $item)
                        <span class="skill-chip">{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar Card --}}
        <div class="side-card">
            <div class="avatar-placeholder">BR</div>
            <div class="side-info">
                <h3>Benedict Rosas</h3>
                <div class="role-label">Full Stack Developer</div>
                <div class="info-row">
                    <span>Location</span>
                    <span>Cavite, PH</span>
                </div>
                <div class="info-row">
                    <span>Experience</span>
                    <span>6+ Years</span>
                </div>
                <div class="info-row">
                    <span>Availability</span>
                    <span style="color:var(--accent);">Open to Work</span>
                </div>
                <div class="info-row">
                    <span>Stack</span>
                    <span>Laravel · Vue.js</span>
                </div>
                <div class="info-row">
                    <span>Email</span>
                    <span>benedict@example.com</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection