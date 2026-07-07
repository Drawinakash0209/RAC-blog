@extends('layout')
@section('title', 'Awards | Rotaract Club of APIIT')
@section('meta-description', 'Celebrating the achievements and recognition earned by the Rotaract Club of APIIT.')

@section('content')

{{-- ── Hero ── --}}
<section class="pg-hero">
    <span class="pg-hero__eyebrow">Recognition</span>
    <h1 class="pg-hero__title">Our Awards</h1>
    <p class="pg-hero__sub">Celebrating the achievements and milestones earned by the Rotaract Club of APIIT.</p>
</section>

{{-- ── Gallery ── --}}
<div class="aw-wrap">

    @forelse($rda as $rd)
    <div class="aw-group">

        <h2 class="aw-group__heading">{{ $rd->name }}</h2>

        @if($rd->awards->isNotEmpty())
        <div class="aw-grid">
            @foreach($rd->awards as $award)
            <div class="aw-card">
                <img
                    class="aw-card__img"
                    src="{{ asset('storage/' . $award->image) }}"
                    alt="Award — {{ $rd->name }}"
                    loading="lazy"
                />
                <div class="aw-card__overlay"></div>
                <div class="aw-card__badge">
                    <svg style="width:.85rem;height:.85rem;flex-shrink:0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    {{ $rd->name }}
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p style="color:#9ca3af;font-size:.9rem">No awards recorded for this category yet.</p>
        @endif

    </div>
    @empty
    <div style="max-width:1200px;margin:0 auto;text-align:center;padding:4rem 0;color:#9ca3af">
        <svg style="width:3rem;height:3rem;margin:0 auto 1rem" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
        </svg>
        <p style="font-size:1.1rem;font-weight:600;color:#6b7280">No awards data yet</p>
    </div>
    @endforelse

</div>

@endsection