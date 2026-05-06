@extends('layouts.app')

@section('title', 'Contact')

@push('styles')
<style>
    .contact-layout {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 5rem;
        padding-top: 2.5rem;
        align-items: start;
    }

    .contact-info p {
        color: var(--muted);
        font-size: 0.88rem;
        line-height: 1.85;
        margin-bottom: 2rem;
        max-width: 480px;
    }

    .contact-channels { display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2.5rem; }

    .channel-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 6px;
        text-decoration: none;
        color: inherit;
        transition: border-color 0.2s;
    }

    .channel-item:hover { border-color: var(--accent); }

    .channel-icon { font-size: 1.1rem; }

    .channel-label { font-size: 0.72rem; color: var(--muted); }
    .channel-value { font-size: 0.85rem; color: var(--text); }

    /* Form card */
    .contact-form-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 2rem;
        position: sticky;
        top: 100px;
    }

    .contact-form-card h3 {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .contact-layout { grid-template-columns: 1fr; }
        .contact-form-card { position: static; }
        .form-row { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')
<section class="section container">
    <div class="section-label">Say Hello</div>
    <h1 class="page-title">Contact</h1>

    <div class="contact-layout">
        <div class="contact-info">
            <p>
                Whether you have a project in mind, want to collaborate, or just want to connect —
                I'd love to hear from you. I typically respond within 24 hours.
            </p>

            <div class="contact-channels">
                <a href="mailto:benedict@example.com" class="channel-item">
                    <span class="channel-icon">✉️</span>
                    <div>
                        <div class="channel-label">Email</div>
                        <div class="channel-value">benedict@example.com</div>
                    </div>
                </a>
                <a href="https://linkedin.com/in/benedictrosas" target="_blank" rel="noopener" class="channel-item">
                    <span class="channel-icon">💼</span>
                    <div>
                        <div class="channel-label">LinkedIn</div>
                        <div class="channel-value">linkedin.com/in/benedictrosas</div>
                    </div>
                </a>
                <a href="https://github.com/benedictrosas" target="_blank" rel="noopener" class="channel-item">
                    <span class="channel-icon">🐙</span>
                    <div>
                        <div class="channel-label">GitHub</div>
                        <div class="channel-value">github.com/benedictrosas</div>
                    </div>
                </a>
            </div>

            <div style="color:var(--muted); font-size:0.78rem; line-height:1.7;">
                📍 Cavite, Philippines &nbsp;·&nbsp; UTC+8 &nbsp;·&nbsp; Available for remote work worldwide
            </div>
        </div>

        {{-- Form Card --}}
        <div class="contact-form-card">
            <h3>Send a Message</h3>

            @if(session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name"
                               value="{{ old('name') }}" required />
                        @error('name')<div class="error-text">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com"
                               value="{{ old('email') }}" required />
                        @error('email')<div class="error-text">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="What's this about?"
                           value="{{ old('subject') }}" required />
                    @error('subject')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Tell me about your project or idea..."
                              required>{{ old('message') }}</textarea>
                    @error('message')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                    Send Message →
                </button>
            </form>
        </div>
    </div>
</section>
@endsection