@extends('layout')

@section('title', $post->title . ' | Rotaract Club of APIIT')
@section('meta-description', html_excerpt($post->description, 160))
@section('meta-keywords', $post->keywords ?? '')

@section('content')

{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="blp-hero" aria-label="{{ $post->title }}">

    <img
        class="blp-hero__img"
        src="{{ asset('storage/' . $post->coverimage) }}"
        alt="{{ $post->title }}"
        onload="this.classList.add('loaded')"
    />
    <div class="blp-hero__overlay"></div>

    <div class="blp-hero__content">

        <nav class="blp-breadcrumb" aria-label="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>›</span>
            <a href="{{ route('post.blog') }}">Blog</a>
            <span>›</span>
            <span style="color:rgba(255,255,255,0.85)">{{ Str::limit($post->title, 40) }}</span>
        </nav>

        @if($post->category)
        <span class="blp-hero__category">{{ $post->category }}</span>
        @endif

        <h1 class="blp-hero__title">{{ $post->title }}</h1>

        <div class="blp-hero__meta">
            <span style="display:flex;align-items:center;gap:.35rem">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="width:1rem;height:1rem">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5"/>
                </svg>
                {{ $post->created_at->format('F d, Y') }}
            </span>
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════
     ARTICLE BODY
════════════════════════════════════════════ --}}
<div class="blp-back-wrap">
    <a href="{{ route('post.blog') }}" class="blp-back">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:.9rem;height:.9rem">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7-7-7 7 7 7"/>
        </svg>
        Back to Blog
    </a>
</div>

<article class="blp-article">
    <div class="blp-article__inner">
        <div class="blp-article__content">
            {!! $post->description !!}
        </div>
    </div>

    {{-- Tags --}}
    @if($post->keywords)
    <div class="blp-tags">
        <span class="blp-tags__label">Tags</span>
        @foreach(explode(',', $post->keywords) as $tag)
        <span class="blp-tags__pill">{{ trim($tag) }}</span>
        @endforeach
    </div>
    @endif
</article>

@endsection