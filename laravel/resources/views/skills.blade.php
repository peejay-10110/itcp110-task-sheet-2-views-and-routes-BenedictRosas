@extends('layouts.app')

@section('title', 'Skills')

@push('styles')
<style>
    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
        margin-top: 2.5rem;
    }

    .skill-group-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 2rem;
    }

    .skill-group-card .group-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.75rem;
    }

    .group-icon { font-size: 1.4rem; }

    .group-name {
        font-family: var(--font-head);
        font-size: 1rem;
        font-weight: 700;
    }

    .skill-item { margin-bottom: 1.1rem; }

    .skill-row {
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        margin-bottom: 0.4rem;
        color: var(--text);
    }

    .skill-pct { color: var(--muted); }

    .skill-bar {
        height: 3px;
        background: var(--border);
        border-radius: 99px;
        overflow: hidden;
    }

    .skill-bar-fill {
        height: 100%;
        background: var(--accent);
        border-radius: 99px;
        transition: width 1s ease;
    }

    @media (max-width: 640px) {
        .skills-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Expertise</div>
    <h1 class="page-title">Skills</h1>
    <p class="page-subtitle">Technologies and tools I've worked with across backend, frontend, database, and DevOps.</p>

    <div class="skills-grid">
        @foreach($skillGroups as $group)
        <div class="skill-group-card">
            <div class="group-header">
                <span class="group-icon">{{ $group['icon'] }}</span>
                <span class="group-name">{{ $group['category'] }}</span>
            </div>
            @foreach($group['items'] as $skill)
            <div class="skill-item">
                <div class="skill-row">
                    <span>{{ $skill['name'] }}</span>
                    <span class="skill-pct">{{ $skill['level'] }}%</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-bar-fill" style="width: {{ $skill['level'] }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection