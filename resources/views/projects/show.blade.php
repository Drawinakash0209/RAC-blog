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
