@extends('layouts.app')

@section('title', $project['title'])

@push('styles')
<style>
    .project-hero {
        padding: 4rem 0 3rem;
        border-bottom: 1px solid var(--border);
    }

    .breadcrumb {
        font-size: 0.72rem;
        color: var(--muted);
        margin-bottom: 1.5rem;
        letter-spacing: 0.05em;
    }

    .breadcrumb a { color: var(--muted); text-decoration: none; }
    .breadcrumb a:hover { color: var(--accent); }
    .breadcrumb span { margin: 0 0.5rem; }

    .project-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .meta-pill {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        color: var(--muted);
    }

    .meta-pill .dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: var(--accent);
    }

    .project-layout {
        display: grid;
        grid-template-columns: 1fr 280px;
        gap: 4rem;
        padding: 3.5rem 0;
    }

    .project-section { margin-bottom: 2.5rem; }

    .project-section-title {
        font-size: 0.68rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.75rem;
    }

    .project-section p {
        color: var(--muted);
        font-size: 0.88rem;
        line-height: 1.85;
    }

    .sidebar-box {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 1.5rem;
        position: sticky;
        top: 100px;
    }

    .sidebar-box h4 {
        font-size: 0.85rem;
        margin-bottom: 1rem;
        color: var(--text);
    }

    .sidebar-tag-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .sidebar-links { display: flex; flex-direction: column; gap: 0.65rem; }

    .image-placeholder {
        width: 100%;
        aspect-ratio: 16/9;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--muted);
        font-size: 0.8rem;
        letter-spacing: 0.05em;
        margin-bottom: 2.5rem;
    }

    @media (max-width: 768px) {
        .project-layout { grid-template-columns: 1fr; }
        .sidebar-box { position: static; }
    }
</style>
@endpush

@section('content')
<section class="container">
    <div class="project-hero">
        <div class="breadcrumb">
            <a href="{{ route('projects') }}">Projects</a>
            <span>/</span>
            {{ $project['title'] }}
        </div>

        <div class="section-label">Case Study</div>
        <h1 class="page-title">{{ $project['title'] }}</h1>
        <p class="page-subtitle">{{ $project['description'] }}</p>

        <div class="project-meta">
            <div class="meta-pill">
                <div class="dot"></div>
                Year {{ $project['year'] }}
            </div>
            <div class="meta-pill">
                <div class="dot"></div>
                Full Stack Development
            </div>
            <div class="meta-pill">
                <div class="dot"></div>
                Benedict Rosas
            </div>
        </div>
    </div>

    <div class="project-layout">
        <div>
            <div class="image-placeholder">[ Project Screenshot ]</div>

            <div class="project-section">
                <div class="project-section-title">Overview</div>
                <p>{{ $project['long_desc'] }}</p>
            </div>

            <div class="project-section">
                <div class="project-section-title">Challenges</div>
                <p>{{ $project['challenges'] }}</p>
            </div>

            <div class="project-section">
                <div class="project-section-title">What I Learned</div>
                <p>{{ $project['lessons'] }}</p>
            </div>

            <a href="{{ route('projects') }}" class="btn btn-outline">← Back to Projects</a>
        </div>

        <div>
            <div class="sidebar-box">
                <h4>Tech Stack</h4>
                <div class="sidebar-tag-list">
                    @foreach($project['tags'] as $tag)
                    <span class="tag tag-accent">{{ $tag }}</span>
                    @endforeach
                </div>

                <h4>Links</h4>
                <div class="sidebar-links">
                    <a href="{{ $project['github'] }}" target="_blank" rel="noopener" class="btn btn-outline" style="font-size:0.75rem; padding:0.55rem 1rem;">
                        ↗ GitHub Repository
                    </a>
                    <a href="{{ $project['live'] }}" target="_blank" rel="noopener" class="btn btn-primary" style="font-size:0.75rem; padding:0.55rem 1rem;">
                        → Live Demo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection