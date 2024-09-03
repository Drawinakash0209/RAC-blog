@extends('layout')

@section('title', $report->title)
@section('meta-description', Str::limit(strip_tags($report->description), 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $report->keywords))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Report",
    "headline": "{{ $report->title }}",
    "description": "{{ Str::limit(strip_tags($report->description), 150) }}",
    "image": "{{ $report->image ? asset('storage/' . $report->image) : 'https://source.unsplash.com/random/640x480' }}",
    "author": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "datePublished": "{{ $report->created_at->toIso8601String() }}",
    "dateModified": "{{ $report->updated_at->toIso8601String() }}"
}
</script>
@endsection

@section('content')
<div class="container mx-auto px-4 mt-10 mb-10">
    <!-- Report Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">{{ $report->title }}</h1>

    <!-- Report Description -->
    <p class="text-gray-600 text-center mb-8">{{ Str::limit(strip_tags($report->description), 160) }}</p>
    
    <!-- PDF Viewer -->
    <embed src="{{ asset('storage/' . $report->file_path) }}" type="application/pdf" width="100%" height="600px" />
</div>
@endsection
