@extends('layout')

@section('title', 'Annual Reports | Rotaract Club of APIIT')
@section('meta-description', 'Explore our annual reports — from community impact reviews to project summaries, reflecting our commitment to transparency and positive change.')
@section('meta-keywords', 'annual reports, Rotaract, community impact, transparency')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "headline": "Annual Reports",
    "description": "Explore our annual reports and project summaries.",
    "itemListElement": [
        @foreach($reports as $report)
        {
            "@type": "Report",
            "headline": "{{ $report->title }}",
            "description": "{{ html_excerpt($report->description, 150) }}",
            "image": "{{ $report->image ? asset('storage/' . $report->image) : '' }}",
            "url": "{{ route('annual-reports.show', $report->id) }}",
            "datePublished": "{{ $report->created_at->toIso8601String() }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endsection

@section('content')

{{-- ── Hero ── --}}
<section class="pg-hero">
    <span class="pg-hero__eyebrow">Transparency</span>
    <h1 class="pg-hero__title">Annual Reports</h1>
    <p class="pg-hero__sub">A transparent look at our impact — from community outreach to professional development, documented year by year.</p>
</section>

{{-- ── Report list ── --}}
<div class="rp-wrap">
    <div class="rp-list">

        @forelse($reports as $report)
        <a class="rp-card" href="{{ route('annual-reports.show', $report->id) }}" aria-label="{{ $report->title }}">

            <div class="rp-card__img-wrap">
                <img
                    class="rp-card__img"
                    src="{{ $report->image ? asset('storage/' . $report->image) : asset('/images/CR7.png') }}"
                    alt="{{ $report->title }}"
                    loading="lazy"
                />
            </div>

            <div class="rp-card__body">
                @if($report->year)
                <span class="rp-card__year">{{ $report->year }}</span>
                @endif

                <h2 class="rp-card__title">{{ $report->title }}</h2>

                <p class="rp-card__desc">{{ Str::limit($report->description, 180, '…') }}</p>

                <span class="rp-card__cta">
                    Read Report
                    <svg style="width:.9rem;height:.9rem" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                    </svg>
                </span>
            </div>

        </a>
        @empty
        <div style="text-align:center;padding:4rem 0;color:#9ca3af">
            <svg style="width:3rem;height:3rem;margin:0 auto 1rem" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
            </svg>
            <p style="font-size:1.1rem;font-weight:600;color:#6b7280">No reports published yet</p>
            <p style="font-size:.875rem;margin-top:.35rem">Check back soon for our latest annual reports.</p>
        </div>
        @endforelse

    </div>
</div>

@endsection
