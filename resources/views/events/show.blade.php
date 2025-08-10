@extends('layout')

@section('title', $event->title)
@section('meta-description', Str::limit(strip_tags($event->description), 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $event->keywords ?? ''))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "{{ $event->title }}",
    "description": "{{ Str::limit(strip_tags($event->description), 150) }}",
    "startDate": "{{ $event->date instanceof \Carbon\Carbon ? $event->date->toIso8601String() : $event->date }}",
    "location": {
        "@type": "Place",
        "name": "{{ $event->location }}"
    },
    "image": "{{ $event->image ? asset('storage/' . $event->image) : 'https://source.unsplash.com/random/640x480' }}",
    "organizer": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "offers": {
        "@type": "Offer",
        "url": "{{ route('events.show', $event->id) }}"
    }
}
</script>
@endsection

@section('content')
<div class="max-w-5xl mx-auto my-16 px-4">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col lg:flex-row">
        
        {{-- Image Column --}}
        @if($event->image)
            <div class="lg:w-2/5">
                <img 
                    src="{{ asset('storage/' . $event->image) }}" 
                    alt="{{ $event->title }}" 
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                />
            </div>
        @endif

        {{-- Content Column --}}
        <div class="lg:w-3/5 p-8 flex flex-col justify-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                {{ $event->title }}
            </h1>

            <div class="flex items-center text-gray-600 text-lg mb-4">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 20s6-5.686 6-10a6 6 0 10-12 0c0 4.314 6 10 6 10zM10 9a1 1 0 110-2 1 1 0 010 2z" clip-rule="evenodd"/>
                </svg>
                {{ $event->location }}
            </div>

            {{-- Date if you want to show --}}
            {{-- <p class="text-gray-500 text-sm mb-4">{{ $event->date->format('F j, Y') }}</p> --}}

            <div class="text-gray-700 leading-relaxed mb-6 prose max-w-none">
                {!! $event->description !!}
            </div>

            {{-- Social / Extra Links --}}
            <div class="flex flex-wrap gap-4 mt-auto">
                {{-- Example social button --}}
                {{-- <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Register</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
