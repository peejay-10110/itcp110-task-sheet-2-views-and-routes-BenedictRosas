@extends('layouts.app')

@section('title', 'Projects')

@push('styles')
<style>
    .projects-grid {
        display: grid;
        gap: 1px;
        background: var(--border);
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
        margin-top: 2.5rem;
    }

    .project-row {
        background: var(--bg);
        display: grid;
        grid-template-columns: 80px 1fr auto;
        align-items: center;
        gap: 2rem;
        padding: 2rem 2.5rem;
        text-decoration: none;
        color: inherit;
        transition: background 0.15s;
    }

    .project-row:hover { background: var(--surface); }

    .project-year {
        font-size: 0.72rem;
        color: var(--muted);
        letter-spacing: 0.05em;
    }

    .project-body h3 {
        font-size: 1.05rem;
        margin-bottom: 0.35rem;
        transition: color 0.2s;
    }

    .project-row:hover .project-body h3 { color: var(--accent); }

    .project-body p {
        color: var(--muted);
        font-size: 0.8rem;
        line-height: 1.6;
    }

    .project-tags-list { display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 0.6rem; }

    .project-arrow {
        color: var(--muted);
        font-size: 1.2rem;
        transition: transform 0.2s, color 0.2s;
    }

    .project-row:hover .project-arrow {
        transform: translateX(4px);
        color: var(--accent);
    }

    @media (max-width: 640px) {
        .project-row { grid-template-columns: 1fr; gap: 0.75rem; padding: 1.5rem; }
        .project-arrow { display: none; }
    }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Portfolio</div>
    <h1 class="page-title">Projects</h1>
    <p class="page-subtitle">A selection of real-world applications I've designed, built, and shipped.</p>

    <div class="projects-grid">
        @foreach($projects as $project)
        <a href="{{ route('projects.show', $project['slug']) }}" class="project-row">
            <div class="project-year">{{ $project['year'] }}</div>
            <div class="project-body">
                <h3>{{ $project['title'] }}</h3>
                <p>{{ $project['description'] }}</p>
                <div class="project-tags-list">
                    @foreach($project['tags'] as $tag)
                    <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="project-arrow">→</div>
        </a>
        @endforeach
    </div>
</section>
@endsection