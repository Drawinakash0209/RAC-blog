@extends('layout')

@section('title', $project->name)
@section('meta-description', html_excerpt($project->description, 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $project->keywords ?? ''))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Project",
    "name": "{{ $project->name }}",
    "description": "{{ html_excerpt($project->description, 150) }}",
    "image": "{{ Storage::url($project->coverimage) }}",
    "author": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "datePublished": "{{ $project->created_at->toIso8601String() }}",
    "dateModified": "{{ $project->updated_at->toIso8601String() }}"
}
</script>
@endsection

@push('styles')
<style>
    /* Source: resources/css/projects-show.css */

    /* ── Hero ── */
    .proj-hero {
        position: relative;
        width: 100%;
        height: 72vh;
        min-height: 420px;
        overflow: hidden;
    }

    .proj-hero__img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.06);
        transition: transform 8s ease-out;
    }

    .proj-hero__img.loaded { transform: scale(1); }

    .proj-hero__overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(10,10,20,.20) 0%, rgba(10,10,20,.50) 60%, rgba(10,10,20,.85) 100%);
        z-index: 1;
    }

    .proj-hero__content {
        position: absolute;
        inset: 0;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 2.5rem clamp(1.25rem, 5vw, 5rem) 2.5rem;
    }

    /* ── Breadcrumb ── */
    .proj-breadcrumb {
        display: flex;
        align-items: center;
        gap: .5rem;
        font-size: .78rem;
        font-weight: 500;
        color: rgba(255,255,255,.65);
        margin-bottom: 1rem;
        letter-spacing: .04em;
    }

    .proj-breadcrumb a { color: rgba(255,255,255,.65); text-decoration: none; transition: color .2s; }
    .proj-breadcrumb a:hover { color: #fff; }
    .proj-breadcrumb span { color: rgba(255,255,255,.35); }

    /* ── Hero title ── */
    .proj-hero__title {
        font-size: clamp(1.75rem, 4.5vw, 3.25rem);
        font-weight: 700;
        color: #fff;
        line-height: 1.18;
        letter-spacing: -.02em;
        max-width: 820px;
        margin: 0;
    }

    /* ── Meta bar ── */
    .proj-meta-bar {
        display: inline-flex;
        align-items: center;
        margin-top: 1.5rem;
        background: rgba(255,255,255,.12);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,.22);
        border-radius: 999px;
        padding: .45rem 1.2rem;
        width: fit-content;
    }

    .proj-meta__item { display: flex; align-items: center; gap: .5rem; color: rgba(255,255,255,.92); font-size: .82rem; font-weight: 500; }
    .proj-meta__avatar { width: 1.8rem; height: 1.8rem; border-radius: 50%; border: 2px solid rgba(255,255,255,.5); object-fit: cover; flex-shrink: 0; }
    .proj-meta__divider { width: 1px; height: 1.1rem; background: rgba(255,255,255,.3); margin: 0 .9rem; }
    .proj-meta__icon { width: 1rem; height: 1rem; opacity: .75; }

    /* ── Body ── */
    .proj-body { background: #f9f9fc; padding-bottom: 3rem; }

    .proj-article-wrap {
        max-width: 800px;
        margin: 0 auto;
        padding: clamp(2rem, 5vw, 3.5rem) clamp(1.25rem, 4vw, 2rem);
    }

    .proj-article-wrap .prose-content { font-size: 1.0625rem; line-height: 1.8; color: #374151; }
    .proj-article-wrap .prose-content p { margin-bottom: 1.25rem; }
    .proj-article-wrap .prose-content h2,
    .proj-article-wrap .prose-content h3 { font-weight: 700; color: #111827; margin: 2rem 0 .75rem; }
    .proj-article-wrap .prose-content img { border-radius: .75rem; max-width: 100%; margin: 1.5rem 0; }

    /* ── Recent Projects ── */
    .proj-recent { background: #fff; padding: clamp(3rem, 6vw, 5rem) clamp(1.25rem, 5vw, 5rem); }

    .proj-recent__eyebrow {
        display: inline-block; font-size: .72rem; font-weight: 700;
        letter-spacing: .14em; text-transform: uppercase;
        color: #6d28d9; background: #ede9fe;
        padding: .3rem .85rem; border-radius: 999px; margin-bottom: .9rem;
    }

    .proj-recent__heading { font-size: clamp(1.6rem, 3.5vw, 2.4rem); font-weight: 800; color: #111827; letter-spacing: -.025em; margin: 0 0 .6rem; }
    .proj-recent__sub { font-size: 1rem; color: #6b7280; max-width: 600px; line-height: 1.65; margin: 0 0 2.5rem; }

    /* ── Card Grid ── */
    .proj-grid { display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fill, minmax(min(100%, 300px), 1fr)); }

    .proj-card {
        position: relative; border-radius: 1.125rem; overflow: hidden;
        display: block; aspect-ratio: 4/3;
        box-shadow: 0 4px 24px rgba(0,0,0,.08); text-decoration: none;
        transition: transform .35s cubic-bezier(.22,.61,.36,1), box-shadow .35s cubic-bezier(.22,.61,.36,1);
    }

    .proj-card:hover { transform: translateY(-6px) scale(1.01); box-shadow: 0 16px 48px rgba(0,0,0,.16); }

    .proj-card__img {
        position: absolute; inset: 0; width: 100%; height: 100%;
        object-fit: cover; transition: transform .5s cubic-bezier(.22,.61,.36,1);
    }

    .proj-card:hover .proj-card__img { transform: scale(1.06); }

    .proj-card__overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 30%, rgba(0,0,0,.72) 100%);
    }

    .proj-card__top { position: absolute; top: 0; left: 0; right: 0; padding: 1rem 1.1rem; z-index: 2; display: flex; align-items: center; gap: .6rem; }
    .proj-card__avenue-logo { width: 2rem; height: 2rem; border-radius: 50%; border: 2px solid rgba(255,255,255,.7); object-fit: cover; flex-shrink: 0; }
    .proj-card__avenue-name { font-size: .78rem; font-weight: 600; color: rgba(255,255,255,.9); background: rgba(0,0,0,.28); backdrop-filter: blur(6px); border-radius: 999px; padding: .2rem .65rem; }

    .proj-card__bottom { position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem 1.25rem 1.25rem; z-index: 2; }
    .proj-card__title { font-size: 1.05rem; font-weight: 700; color: #fff; line-height: 1.3; margin: 0 0 .35rem; }
    .proj-card__excerpt { font-size: .8rem; color: rgba(255,255,255,.72); line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

    .proj-card__arrow {
        position: absolute; bottom: 1.1rem; right: 1.1rem; z-index: 3;
        width: 2rem; height: 2rem; background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.35); border-radius: 50%;
        display: grid; place-items: center;
        opacity: 0; transform: scale(.8); transition: opacity .25s, transform .25s;
    }

    .proj-card:hover .proj-card__arrow { opacity: 1; transform: scale(1); }
</style>
@endpush

@section('content')


{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="proj-hero" aria-label="Project cover for {{ $project->name }}">

    <img
        id="proj-hero-img"
        class="proj-hero__img"
        src="{{ Storage::url($project->coverimage) }}"
        alt="Cover image for {{ $project->name }}"
        onload="this.classList.add('loaded')"
    />

    <div class="proj-hero__overlay"></div>

    <div class="proj-hero__content">

        {{-- Breadcrumb --}}
        <nav class="proj-breadcrumb" aria-label="breadcrumb">
            <a href="/home">Home</a>
            <span>›</span>
            <a href="{{ route('projects.show', $project->slug) }}">Projects</a>
            <span>›</span>
            <span style="color: rgba(255,255,255,0.85);">{{ Str::limit($project->name, 40) }}</span>
        </nav>

        {{-- Title --}}
        <h1 class="proj-hero__title">{{ $project->name }}</h1>

        {{-- Meta pill --}}
        <div class="proj-meta-bar">

            <div class="proj-meta__item">
                <img
                    class="proj-meta__avatar"
                    src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}"
                    alt="{{ $project->avenues->first()->name ?? 'No Avenue' }}"
                />
                <span>{{ $project->avenues->first()->name ?? 'No Avenue' }}</span>
            </div>

            <div class="proj-meta__divider"></div>

            <div class="proj-meta__item">
                <svg class="proj-meta__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $project->created_at->diffForHumans() }}</span>
            </div>

        </div>

    </div>

</section>

{{-- ════════════════════════════════════════════
     ARTICLE BODY
════════════════════════════════════════════ --}}
<div class="proj-body">
    <div class="proj-article-wrap">
        <article class="prose-content">
            {!! $project->description !!}
        </article>
    </div>
</div>

{{-- ════════════════════════════════════════════
     RECENT PROJECTS
════════════════════════════════════════════ --}}
@if($recentProjects->count())
<section class="proj-recent" aria-labelledby="recent-projects-heading">
    <div style="max-width: 1200px; margin: 0 auto;">

        <span class="proj-recent__eyebrow">Explore More</span>
        <h2 id="recent-projects-heading" class="proj-recent__heading">Other Recent Projects</h2>
        <p class="proj-recent__sub">
            Discover our impactful initiatives — from community service to professional development — all built to create lasting positive change.
        </p>

        <div class="proj-grid">
            @foreach($recentProjects as $rp)
            <a class="proj-card" href="{{ route('projects.show', $rp->slug) }}" aria-label="{{ $rp->name }}">

                <img class="proj-card__img" src="{{ Storage::url($rp->coverimage) }}" alt="{{ $rp->name }}" loading="lazy" />
                <div class="proj-card__overlay"></div>

                <div class="proj-card__top">
                    <img
                        class="proj-card__avenue-logo"
                        src="{{ $rp->avenues->first()->logo ?? 'default-logo-url.jpg' }}"
                        alt="{{ $rp->avenues->first()->name ?? 'No Avenue' }}"
                    />
                    <span class="proj-card__avenue-name">{{ $rp->avenues->first()->name ?? 'No Avenue' }}</span>
                </div>

                <div class="proj-card__bottom">
                    <h3 class="proj-card__title">{{ $rp->name }}</h3>
                    <p class="proj-card__excerpt">{!! html_excerpt($rp->description, 80) !!}</p>
                </div>

                <div class="proj-card__arrow" aria-hidden="true">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>

            </a>
            @endforeach
        </div>

    </div>
</section>
@endif

@endsection
