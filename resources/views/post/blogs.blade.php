@extends('layout')

@section('title', 'Our Blog | Rotaract Club of APIIT')
@section('meta-description', 'Discover the latest updates, stories, and insights from the Rotaract Club of APIIT. Stay informed and inspired by reading our blogs.')
@section('meta-keywords', 'blogs, Rotaract Club, updates, stories, insights')

@section('content')

{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="bl-hero">
    <span class="bl-hero__eyebrow">Our Voice</span>
    <h1 class="bl-hero__title">The Blog</h1>
    <p class="bl-hero__sub">Stories, updates, and insights from the Rotaract Club of APIIT — told by the people living it.</p>
</section>

{{-- ════════════════════════════════════════════
     LISTING
════════════════════════════════════════════ --}}
<section class="bl-listing">
    <div class="bl-listing__inner">

        @if($posts->count() > 0)

        {{-- Featured post (first item) --}}
        @php $featured = $posts->first(); @endphp
        <a class="bl-featured" href="{{ route('post.show', $featured->slug) }}" aria-label="{{ $featured->title }}">

            <div class="bl-featured__img-wrap">
                <img class="bl-featured__img" src="{{ $featured->coverimage ? asset('storage/' . $featured->coverimage) : asset('/images/CR7.png') }}" alt="{{ $featured->title }}" loading="eager" />
                <span class="bl-featured__badge">Featured</span>
            </div>

            <div class="bl-featured__body">
                <p class="bl-featured__eyebrow">{{ $featured->category ?? 'Blog' }}</p>
                <h2 class="bl-featured__title">{{ $featured->title }}</h2>
                <p class="bl-featured__excerpt">{!! html_excerpt($featured->description, 200) !!}</p>
                <div class="bl-featured__meta">
                    <span class="bl-featured__date">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="width:1rem;height:1rem;flex-shrink:0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5"/>
                        </svg>
                        {{ $featured->created_at->format('M d, Y') }}
                    </span>
                </div>
                <span class="bl-featured__cta">
                    Read full story
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:1rem;height:1rem">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                    </svg>
                </span>
            </div>

        </a>

        {{-- Remaining posts grid --}}
        @if($posts->count() > 1)
        <h3 class="bl-grid-heading">All Posts</h3>
        <div class="bl-grid">
            @foreach($posts->skip(1) as $post)
            <a class="bl-card" href="{{ route('post.show', $post->slug) }}" aria-label="{{ $post->title }}">

                <div class="bl-card__img-wrap">
                    <img class="bl-card__img" src="{{ $post->coverimage ? asset('storage/' . $post->coverimage) : asset('/images/CR7.png') }}" alt="{{ $post->title }}" loading="lazy" />
                    <span class="bl-card__date">{{ $post->created_at->format('M d, Y') }}</span>
                </div>

                <div class="bl-card__body">
                    @if($post->category)
                    <span class="bl-card__category">{{ $post->category }}</span>
                    @endif
                    <h3 class="bl-card__title">{{ $post->title }}</h3>
                    <p class="bl-card__excerpt">{!! html_excerpt($post->description, 150) !!}</p>

                    @if($post->keywords)
                    <div class="bl-card__tags">
                        @foreach(array_slice(explode(',', $post->keywords), 0, 3) as $tag)
                        <span class="bl-card__tag">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>

            </a>
            @endforeach
        </div>
        @endif

        @else
        <div style="text-align:center; padding:4rem 0; color:#9ca3af">
            <svg style="width:3rem;height:3rem;margin:0 auto 1rem" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
            </svg>
            <p style="font-size:1.1rem;font-weight:600;color:#6b7280">No posts yet</p>
            <p style="font-size:.9rem;margin-top:.35rem">Check back soon — stories are coming!</p>
        </div>
        @endif

    </div>
</section>

@endsection
