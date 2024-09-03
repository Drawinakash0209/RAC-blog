@extends('layout')

@section('title', $new->title)
@section('meta-description', Str::limit(strip_tags($new->description), 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $new->keywords))))


@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $new->title }}",
    "description": "{{ Str::limit(strip_tags($new->description), 150) }}",
    "image": "{{ asset('storage/' . $new->image) }}",
    "author": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "datePublished": "{{ $new->created_at->toIso8601String() }}",
    "dateModified": "{{ $new->updated_at->toIso8601String() }}"
}
</script>
@endsection

@section('content')

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 sm:items-center gap-8">
        <!-- Image Column -->
        <div class="sm:order-2">
            <div class="relative pt-[50%] sm:pt-[100%] rounded-lg">
                <img class="size-full absolute top-0 start-0 object-cover rounded-lg"
                     src="{{ asset('storage/' . $new->image) }}" alt="Blog Image">
            </div>
        </div>
        <!-- End Image Column -->

        <!-- Content Column -->
        <div class="sm:order-1">
            <!-- Title -->
            <h2 class="text-2xl font-bold md:text-3xl lg:text-4xl lg:leading-tight xl:text-5xl xl:leading-tight">
                {{ $new->title }}
            </h2>

            <!-- Description -->
            <div class="mt-5">
                <div class="prose max-w-none">
                    {!! $new->description !!}
                </div>
            </div>
        </div>
        <!-- End Content Column -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
