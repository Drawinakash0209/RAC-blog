@extends('layout')

@section('title', 'Board of Directors | Rotaract Club of APIIT')

@section('meta')
    <meta name="description" content="Meet the dedicated Board of Directors of the Rotaract Club of APIIT. Learn more about their roles, achievements, and contributions to our community.">
    <meta name="keywords" content="Board of Directors, Rotaract Club, APIIT, Executive Committee, Leadership">
@endsection

@section('content')
<section class="hero-section">
  <img src="{{ asset('storage/hero2/6.png') }}" id="bg" alt="Board of Directors Background">
  <h1 id="text">BOARD OF DIRECTORS</h1>
  <img src="{{ asset('storage/hero2/dir.png') }}" id="man" alt="Executive Committee Member">
  <img src="{{ asset('storage/hero2/clouds_1.png') }}" id="clouds_1" alt="Clouds Image 1">
  <img src="{{ asset('storage/hero2/clouds_2.png') }}" id="clouds_2" alt="Clouds Image 2">
  <img src="{{ asset('storage/hero2/mountain_left.png') }}" id="mountain_left" alt="Left Mountain Image">
  <img src="{{ asset('storage/hero2/mountain_right.png') }}" id="mountain_right" alt="Right Mountain Image">
</section>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="team-intro">
    <span class="team-intro__eyebrow">Meet Our Avenue Directors</span>
    <p class="team-intro__body">
      Meet the committed and talented individuals who lead the Rotaract Club of APIIT. Discover their roles, achievements, and contributions to our community.
    </p>
  </div>

  @if($directors->isNotEmpty())
  <div class="team-grid">
    @foreach($directors as $director)
    <div class="team-card">
      <div class="team-card__photo-wrap">
        <img
          class="team-card__photo"
          src="{{ $director->image ? asset('storage/' . $director->image) : asset('/images/CR7.png') }}"
          alt="{{ $director->name }} - Director of {{ $director->avenue->name }} - Rotaract Club of APIIT"
          loading="lazy"
        >
      </div>
      <div class="team-card__body">
        <p class="team-card__role">Director of {{ $director->avenue->name }}</p>
        <h3 class="team-card__name">{{ $director->name }}</h3>
        <p class="team-card__about">{{ $director->about }}</p>
        <div class="team-card__social">
          @if($director->email)
          <a href="mailto:{{ $director->email }}" class="team-card__social-link" aria-label="Email {{ $director->name }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg>
          </a>
          @endif
          @if($director->linkedin)
          <a href="{{ $director->linkedin }}" class="team-card__social-link" target="_blank" rel="noopener" aria-label="LinkedIn profile of {{ $director->name }}">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="team-empty">
    <p>No directors listed yet. Check back soon!</p>
  </div>
  @endif
</div>

@endsection
