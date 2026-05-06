@extends('layouts.app')

@section('title', 'Experience')

@push('styles')
<style>
    .timeline { margin-top: 2.5rem; position: relative; }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0; top: 8px; bottom: 0;
        width: 1px;
        background: var(--border);
    }

    .timeline-item {
        padding-left: 2.5rem;
        padding-bottom: 3rem;
        position: relative;
    }

    .timeline-dot {
        position: absolute;
        left: -5px; top: 8px;
        width: 11px; height: 11px;
        border-radius: 50%;
        background: var(--accent);
        border: 2px solid var(--bg);
    }

    .timeline-period {
        font-size: 0.72rem;
        color: var(--accent);
        letter-spacing: 0.08em;
        margin-bottom: 0.4rem;
    }

    .timeline-role {
        font-family: var(--font-head);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.15rem;
    }

    .timeline-company {
        color: var(--muted);
        font-size: 0.8rem;
        margin-bottom: 1rem;
    }

    .timeline-desc {
        color: var(--muted);
        font-size: 0.85rem;
        line-height: 1.8;
        margin-bottom: 1rem;
        max-width: 680px;
    }

    .highlight-chips { display: flex; flex-wrap: wrap; gap: 0.4rem; }

    /* Education */
    .education-section { margin-top: 4rem; }

    .edu-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 1.75rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .edu-degree {
        font-family: var(--font-head);
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .edu-school { color: var(--muted); font-size: 0.8rem; }

    .edu-right { text-align: right; }

    .edu-period { color: var(--muted); font-size: 0.78rem; margin-bottom: 0.25rem; }

    .edu-honors {
        color: var(--accent);
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }

    .download-row {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Career</div>
    <h1 class="page-title">Experience</h1>
    <p class="page-subtitle">My professional journey building web applications, leading teams, and delivering scalable solutions.</p>

    {{-- Work Timeline --}}
    <div class="timeline">
        @foreach($experiences as $exp)
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-period">{{ $exp['period'] }} · {{ $exp['location'] }}</div>
            <div class="timeline-role">{{ $exp['role'] }}</div>
            <div class="timeline-company">{{ $exp['company'] }}</div>
            <p class="timeline-desc">{{ $exp['description'] }}</p>
            <div class="highlight-chips">
                @foreach($exp['highlights'] as $h)
                <span class="tag">{{ $h }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    {{-- Education --}}
    <div class="education-section">
        <div class="section-label">Education</div>
        @foreach($education as $edu)
        <div class="edu-card">
            <div>
                <div class="edu-degree">{{ $edu['degree'] }}</div>
                <div class="edu-school">{{ $edu['school'] }}</div>
            </div>
            <div class="edu-right">
                <div class="edu-period">{{ $edu['period'] }}</div>
                @if(isset($edu['honors']))
                <div class="edu-honors">{{ $edu['honors'] }}</div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="download-row">
        <a href="#" class="btn btn-primary">↓ Download Resume (PDF)</a>
        <a href="{{ route('contact') }}" class="btn btn-outline">Get in Touch</a>
    </div>
</section>
@endsection