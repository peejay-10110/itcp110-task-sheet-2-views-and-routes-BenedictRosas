@extends('layouts.app')

@section('title', 'Blog')

@push('styles')
<style>
    .blog-list { margin-top: 2.5rem; }

    .blog-item {
        display: block;
        padding: 2.25rem 0;
        border-bottom: 1px solid var(--border);
        text-decoration: none;
        color: inherit;
        transition: padding-left 0.2s;
    }

    .blog-item:first-child { border-top: 1px solid var(--border); }
    .blog-item:hover { padding-left: 0.5rem; }

    .blog-meta {
        display: flex;
        gap: 1.25rem;
        align-items: center;
        margin-bottom: 0.75rem;
        flex-wrap: wrap;
    }

    .blog-date {
        font-size: 0.72rem;
        color: var(--muted);
        letter-spacing: 0.05em;
    }

    .blog-read { font-size: 0.72rem; color: var(--muted); }

    .blog-title {
        font-family: var(--font-head);
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 0.6rem;
        transition: color 0.2s;
    }

    .blog-item:hover .blog-title { color: var(--accent); }

    .blog-excerpt {
        color: var(--muted);
        font-size: 0.85rem;
        line-height: 1.75;
        max-width: 640px;
        margin-bottom: 1rem;
    }

    .blog-tags { display: flex; gap: 0.4rem; flex-wrap: wrap; }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Writing</div>
    <h1 class="page-title">Blog</h1>
    <p class="page-subtitle">I write about Laravel, web architecture, and the craft of building software.</p>

    <div class="blog-list">
        @foreach($posts as $post)
        <a href="{{ route('blog.show', $post['slug']) }}" class="blog-item">
            <div class="blog-meta">
                <span class="blog-date">{{ $post['date'] }}</span>
                <span style="color:var(--border)">·</span>
                <span class="blog-read">{{ $post['read_time'] }}</span>
            </div>
            <h2 class="blog-title">{{ $post['title'] }}</h2>
            <p class="blog-excerpt">{{ $post['excerpt'] }}</p>
            <div class="blog-tags">
                @foreach($post['tags'] as $tag)
                <span class="tag">{{ $tag }}</span>
                @endforeach
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection