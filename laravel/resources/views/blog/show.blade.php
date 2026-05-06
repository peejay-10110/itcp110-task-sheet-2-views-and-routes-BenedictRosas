@extends('layouts.app')

@section('title', $post['title'])

@push('styles')
<style>
    .post-header {
        padding: 4rem 0 3rem;
        border-bottom: 1px solid var(--border);
        max-width: 740px;
    }

    .post-meta {
        display: flex;
        gap: 1.25rem;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .post-date { font-size: 0.72rem; color: var(--muted); }
    .post-read { font-size: 0.72rem; color: var(--muted); }

    .post-content {
        max-width: 740px;
        padding: 3rem 0;
        color: var(--muted);
        font-size: 0.9rem;
        line-height: 1.9;
    }

    .post-content h2 {
        font-size: 1.25rem;
        color: var(--text);
        margin: 2.5rem 0 0.75rem;
    }

    .post-content p { margin-bottom: 1.25rem; }

    .post-content pre {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 1.25rem 1.5rem;
        overflow-x: auto;
        margin: 1.5rem 0;
        font-size: 0.8rem;
        line-height: 1.7;
    }

    .post-content code {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 3px;
        padding: 0.15em 0.45em;
        font-size: 0.82em;
        color: var(--accent);
    }

    .post-content pre code {
        background: none;
        border: none;
        padding: 0;
        color: var(--text);
    }

    .back-row { margin-top: 2rem; }
</style>
@endpush

@section('content')
<section class="container">
    <div class="post-header">
        <div class="breadcrumb" style="font-size:0.72rem; color:var(--muted); margin-bottom:1.5rem; letter-spacing:0.05em;">
            <a href="{{ route('blog') }}" style="color:var(--muted);text-decoration:none;">Blog</a>
            <span style="margin:0 0.5rem;">/</span>
            {{ $post['title'] }}
        </div>

        <div class="section-label">Article</div>
        <h1 class="page-title" style="font-size:clamp(1.8rem,4vw,2.8rem);">{{ $post['title'] }}</h1>

        <div class="post-meta" style="margin-top:1.25rem;">
            <span class="post-date">{{ $post['date'] }}</span>
            <span style="color:var(--border)">·</span>
            <span class="post-read">{{ $post['read_time'] }}</span>
            <span style="color:var(--border)">·</span>
            <div style="display:flex;gap:0.4rem;flex-wrap:wrap;">
                @foreach($post['tags'] as $tag)
                <span class="tag tag-accent">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="post-content">
        {!! $post['content'] !!}
    </div>

    <div class="back-row">
        <a href="{{ route('blog') }}" class="btn btn-outline">← Back to Blog</a>
    </div>
</section>
@endsection