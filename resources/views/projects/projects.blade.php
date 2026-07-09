@extends('layout')

@section('title', 'Our Projects — Rotaract Club of APIIT')
@section('meta-description', 'Explore the impactful projects by the Rotaract Club of APIIT — from community service to professional development initiatives creating lasting positive change.')

@push('styles')
<style>
    .projects-hero {
        position: relative;
        padding: 7rem 1.5rem 4rem;
        background: linear-gradient(135deg, #0f0f0f 0%, #1a1a2e 50%, #16213e 100%);
        overflow: hidden;
        text-align: center;
    }
    .projects-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 30% 70%, rgba(239,68,68,0.08) 0%, transparent 50%),
                    radial-gradient(circle at 70% 30%, rgba(239,68,68,0.05) 0%, transparent 50%);
        animation: heroFloat 20s ease-in-out infinite;
    }
    @keyframes heroFloat {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(-2%, 2%); }
    }
    .projects-hero__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #ef4444;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    .projects-hero__eyebrow::before,
    .projects-hero__eyebrow::after {
        content: '';
        width: 2rem;
        height: 1px;
        background: rgba(239,68,68,0.4);
    }
    .projects-hero__title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: white;
        line-height: 1.1;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    .projects-hero__sub {
        font-size: 1.0625rem;
        color: rgba(255,255,255,0.6);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
        position: relative;
        z-index: 1;
    }

    /* ── Filter Bar ── */
    .filter-bar {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
        margin: 2.5rem auto 0;
        position: relative;
        z-index: 1;
    }
    .filter-pill {
        padding: 0.5rem 1.25rem;
        border-radius: 999px;
        font-size: 0.8125rem;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.12);
        color: rgba(255,255,255,0.6);
        background: rgba(255,255,255,0.04);
        cursor: pointer;
        transition: all 0.25s ease;
        text-decoration: none;
    }
    .filter-pill:hover,
    .filter-pill.active {
        background: #ef4444;
        color: white;
        border-color: #ef4444;
    }

    /* ── Projects Grid ── */
    .projects-listing {
        background: #f8fafc;
        padding: 4rem 1.5rem;
    }
    .projects-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
    }
    @media (min-width: 640px) {
        .projects-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
        .projects-grid { grid-template-columns: repeat(3, 1fr); }
    }

    /* ── Project Card ── */
    .pcard {
        position: relative;
        display: block;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: all 0.4s cubic-bezier(.4,0,.2,1);
        text-decoration: none;
        background: white;
    }
    .pcard:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0,0,0,0.1);
    }

    .pcard__img-wrap {
        position: relative;
        width: 100%;
        height: 260px;
        overflow: hidden;
    }
    .pcard__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s ease;
    }
    .pcard:hover .pcard__img {
        transform: scale(1.08);
    }
    .pcard__gradient {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 40%, transparent 100%);
    }
    .pcard:hover .pcard__tint {
        background: rgba(239,68,68,0.1);
    }
    .pcard__tint {
        position: absolute;
        inset: 0;
        transition: background 0.4s ease;
    }

    /* Badge */
    .pcard__badge {
        position: absolute;
        top: 0.875rem;
        left: 0.875rem;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        background: rgba(0,0,0,0.4);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 999px;
        border: 1px solid rgba(255,255,255,0.15);
    }
    .pcard__badge img {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid rgba(255,255,255,0.4);
    }
    .pcard__badge span {
        font-size: 0.6875rem;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
    }

    /* Arrow */
    .pcard__arrow {
        position: absolute;
        top: 0.875rem;
        right: 0.875rem;
        z-index: 2;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateX(6px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(239,68,68,0.3);
    }
    .pcard:hover .pcard__arrow {
        opacity: 1;
        transform: translateX(0);
    }

    /* Bottom content */
    .pcard__bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 2;
        padding: 1.25rem;
    }
    .pcard__accent {
        width: 2rem;
        height: 3px;
        background: #ef4444;
        border-radius: 2px;
        margin-bottom: 0.75rem;
        transition: width 0.3s ease;
    }
    .pcard:hover .pcard__accent {
        width: 3.5rem;
    }
    .pcard__title {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        line-height: 1.3;
        margin-bottom: 0.375rem;
        transition: color 0.3s ease;
    }
    .pcard:hover .pcard__title {
        color: #fecaca;
    }
    .pcard__excerpt {
        font-size: 0.8125rem;
        color: rgba(255,255,255,0.65);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ── Pagination ── */
    .projects-pagination {
        max-width: 1200px;
        margin: 2.5rem auto 0;
        display: flex;
        justify-content: center;
    }
    .projects-pagination nav {
        display: flex;
        gap: 0.375rem;
    }

    /* ── Empty State ── */
    .projects-empty {
        text-align: center;
        padding: 5rem 2rem;
    }
    .projects-empty__icon {
        width: 64px;
        height: 64px;
        color: #d1d5db;
        margin: 0 auto 1rem;
    }
    .projects-empty__title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }
    .projects-empty__text {
        color: #9ca3af;
        max-width: 400px;
        margin: 0 auto;
    }
</style>
@endpush

@section('content')

{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="projects-hero">
    <div class="projects-hero__eyebrow">
        <span></span>Our Work<span></span>
    </div>
    <h1 class="projects-hero__title">Our Projects</h1>
    <p class="projects-hero__sub">
        Explore our impactful initiatives — from community service to professional development — all designed to create lasting positive change in our communities.
    </p>

    {{-- Avenue Filter Pills --}}
    @php
        $avenues = \App\Models\Avenue::all();
        $currentAvenue = request('avenue');
    @endphp
    <div class="filter-bar">
        <a href="{{ route('projects.projects') }}" class="filter-pill {{ !$currentAvenue ? 'active' : '' }}">All Projects</a>
        @foreach($avenues as $avenue)
            <a href="{{ route('projects.projects', ['avenue' => $avenue->slug]) }}"
               class="filter-pill {{ $currentAvenue == $avenue->slug ? 'active' : '' }}">
                {{ $avenue->name }}
            </a>
        @endforeach
    </div>
</section>

{{-- ════════════════════════════════════════════
     PROJECTS GRID
════════════════════════════════════════════ --}}
<section class="projects-listing">

    @if($projects->count())
    <div class="projects-grid">
        @foreach($projects as $project)
        <a class="pcard" href="{{ route('projects.show', $project->slug) }}" aria-label="{{ $project->name }}">

            {{-- Image --}}
            <div class="pcard__img-wrap">
                <img class="pcard__img"
                     src="{{ Storage::url($project->coverimage) }}"
                     alt="{{ $project->name }}"
                     loading="lazy" />
                <div class="pcard__gradient"></div>
                <div class="pcard__tint"></div>
            </div>

            {{-- Avenue badge --}}
            @if($project->avenues->first())
            <div class="pcard__badge">
                <img src="{{ $project->avenues->first()->logo ?? '' }}"
                     alt="{{ $project->avenues->first()->name ?? '' }}" />
                <span>{{ $project->avenues->first()->name ?? 'No Avenue' }}</span>
            </div>
            @endif

            {{-- Arrow --}}
            <div class="pcard__arrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 17L17 7M7 7h10v10"/>
                </svg>
            </div>

            {{-- Bottom content --}}
            <div class="pcard__bottom">
                <div class="pcard__accent"></div>
                <h3 class="pcard__title">{{ $project->name }}</h3>
                <p class="pcard__excerpt">{!! html_excerpt($project->description, 80) !!}</p>
            </div>

        </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="projects-pagination">
        {{ $projects->appends(request()->query())->links() }}
    </div>

    @else
    <div class="projects-empty">
        <svg class="projects-empty__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
        </svg>
        <h3 class="projects-empty__title">No Projects Yet</h3>
        <p class="projects-empty__text">There are no projects to display at the moment. Check back soon for exciting initiatives from the Rotaract Club of APIIT!</p>
    </div>
    @endif

</section>

@endsection
