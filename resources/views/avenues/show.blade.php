@extends('layout')

@section('title', $avenue->name . ' | Rotaract Club of APIIT')
@section('meta-description', html_excerpt($avenue->description, 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $avenue->keywords ?? ''))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Rotaract Club of APIIT — {{ $avenue->name }}",
    "url": "{{ url('/') }}",
    "description": "{{ html_excerpt($avenue->description, 150) }}"
}
</script>
@endsection

@section('content')

{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="av-hero" aria-label="{{ $avenue->name }} avenue">

    <img
        class="av-hero__img"
        src="{{ $avenue->cover_image ? asset('storage/' . $avenue->cover_image) : asset('/images/CR7.png') }}"
        alt="{{ $avenue->name }}"
        onload="this.classList.add('loaded')"
    />
    <div class="av-hero__overlay"></div>

    <div class="av-hero__content">
        <span class="av-hero__eyebrow">Avenue of Service</span>

        @if($avenue->logo)
        <img class="av-hero__logo" src="{{ $avenue->logo }}" alt="{{ $avenue->name }} logo" />
        @endif

        <h1 class="av-hero__title">{{ $avenue->name }}</h1>
    </div>

</section>

{{-- ════════════════════════════════════════════
     ABOUT
════════════════════════════════════════════ --}}
<section class="av-about">
    <div class="av-about__inner">

        <div>
            <span class="av-about__eyebrow">About</span>
            <h2 class="av-about__heading">What {{ $avenue->name }} is About</h2>
            <p class="av-about__body">{{ $avenue->description }}</p>
        </div>

        <div class="av-about__img-wrap">
            <img
                class="av-about__img"
                src="/storage/gallery/avenue common.png"
                alt="{{ $avenue->name }}"
                loading="lazy"
            />
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════
     KEY PROJECTS
════════════════════════════════════════════ --}}
<section class="av-projects" aria-labelledby="av-projects-heading">

    <div class="av-section-header">
        <span class="av-section-header__eyebrow">Our Work</span>
        <h2 id="av-projects-heading" class="av-section-header__heading">Key Projects</h2>
        <p class="av-section-header__sub">
            Initiatives driven by passion and purpose — each project reflects our commitment to meaningful change.
        </p>
    </div>

    @if($avenue->projects->isNotEmpty())
    <div class="av-proj-grid">
        @foreach($avenue->projects as $project)
        <a class="av-proj-card" href="{{ route('projects.show', $project->slug) }}" aria-label="{{ $project->name }}">

            <img class="av-proj-card__img" src="{{ Storage::url($project->coverimage) }}" alt="{{ $project->name }}" loading="lazy" />
            <div class="av-proj-card__overlay"></div>

            <div class="av-proj-card__body">
                <p class="av-proj-card__date">{{ $project->created_at->diffForHumans() }}</p>
                <h3 class="av-proj-card__title">{{ $project->name }}</h3>
            </div>

            <div class="av-proj-card__arrow" aria-hidden="true">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </div>

        </a>
        @endforeach
    </div>
    @else
    <div class="av-empty">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <p style="font-weight:600; color:#6b7280;">No projects yet</p>
        <p style="font-size:.875rem; color:#9ca3af;">Check back soon — exciting projects are coming!</p>
    </div>
    @endif

</section>

{{-- ════════════════════════════════════════════
     DIRECTORS
════════════════════════════════════════════ --}}
<section class="av-directors" aria-labelledby="av-directors-heading">

    <div class="av-section-header">
        <span class="av-section-header__eyebrow">Leadership</span>
        <h2 id="av-directors-heading" class="av-section-header__heading">Meet Our Directors</h2>
    </div>

    @if($avenue->directors->isNotEmpty())
    <div class="av-directors__grid" style="{{ $avenue->directors->count() < 3 ? 'max-width:600px;' : '' }}">
        @foreach($avenue->directors as $director)
        <div class="av-director-card">
            <div class="av-director-card__img-wrap">
                <img
                    class="av-director-card__img"
                    src="{{ $director->image ? asset('storage/' . $director->image) : asset('/images/CR7.png') }}"
                    alt="{{ $director->name }}"
                    loading="lazy"
                />
                <div class="av-director-card__badge" aria-hidden="true">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
            </div>
            <h3 class="av-director-card__name">{{ $director->name }}</h3>
            <p class="av-director-card__role">{{ $director->role ?? 'Director' }}</p>
        </div>
        @endforeach
    </div>
    @else
    <div class="av-empty">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <p style="font-weight:600; color:#6b7280;">No directors listed yet</p>
    </div>
    @endif

</section>

@endsection
