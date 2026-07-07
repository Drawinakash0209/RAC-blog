@extends('layout')

@section('title', $avenue->name . ' | Rotaract Club of APIIT')
@section('meta-description', html_excerpt($avenue->description, 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $avenue->keywords ?? ''))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Rotaract Club of APIIT",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo.png') }}",
    "description": "Explore the activities and projects of the Rotaract Club of APIIT's Avenue of Service.",
    "sameAs": [
        "https://facebook.com/your-page",
        "https://twitter.com/your-profile",
        "https://instagram.com/your-profile"
    ]
}
</script>
@endsection

@section('content')

{{-- Hero banner for avenue show --}}
<div class="relative overflow-hidden">
    <img src="{{ $avenue->cover_image ? asset('storage/' . $avenue->cover_image) : asset('/images/CR7.png') }}" alt="{{ $avenue->name }}" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>

    <div class="relative z-10 flex min-h-[380px] flex-col items-center justify-center px-6 py-24 text-center">
        <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Avenue of Service</span>
        <h1 class="mt-2 text-3xl font-bold uppercase tracking-tight text-white sm:text-5xl xl:text-6xl">
            {{ $avenue->name }}
        </h1>
    </div>
</div>

{{-- About the avenue --}}
<div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid items-center gap-10 md:grid-cols-2">
        <div>
            <span class="text-sm font-semibold uppercase tracking-wider text-red-500">About</span>
            <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">What {{ $avenue->name }} is About</h2>
            <p class="mt-4 text-base leading-relaxed text-gray-600">{{ $avenue->description }}</p>
        </div>
        <div>
            <img src="/storage/gallery/avenue common.png" alt="{{ $avenue->name }}" class="h-72 w-full rounded-2xl object-cover shadow-xl sm:h-96">
        </div>
    </div>
</div>

<!-- Key Projects -->
<div class="bg-gray-50">
    <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-12">
            <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our Work</span>
            <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">Key Projects</h2>
            <p class="mt-3 text-gray-600">Our dedicated directors are the driving force behind our impactful projects and initiatives. They bring a wealth of experience, passion, and commitment to their roles, ensuring that our avenues of service create meaningful change in the community.</p>
        </div>

        @if($avenue->projects->isNotEmpty())
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($avenue->projects as $project)
            <a class="group flex flex-col rounded-xl border border-gray-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" href="{{ route('projects.show', $project->slug)}}">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full rounded-t-xl object-cover" src="{{ Storage::url($project->coverimage) }}" alt="{{ $project->name }}">
                </div>
                <div class="p-4 md:p-5">
                    <p class="text-xs uppercase text-gray-500">
                        {{ $project->created_at->diffForHumans() }}
                    </p>
                    <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-red-500">
                        {{ $project->name }}
                    </h3>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
            <p class="text-gray-500">No projects under this avenue yet. Check back soon!</p>
        </div>
        @endif
    </div>
</div>

<!-- Meet Our Directors -->
<div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto text-center mb-12">
        <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Leadership</span>
        <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">Meet Our Directors</h2>
    </div>

    @if($avenue->directors->isNotEmpty())
        @if($avenue->directors->count() < 3)
        <div class="flex flex-wrap justify-center gap-8 md:gap-12">
        @else
        <div class="grid grid-cols-2 gap-8 md:grid-cols-3 md:gap-12">
        @endif
            @foreach($avenue->directors as $director)
            <div class="text-center">
                <img class="mx-auto aspect-square w-32 rounded-2xl object-cover shadow-md sm:w-48 lg:w-60" src="{{ $director->image ? asset('storage/' . $director->image) : asset('/images/CR7.png') }}" alt="{{ $director->name }}">
                <div class="mt-4">
                    <h3 class="text-sm font-semibold text-gray-800 sm:text-base lg:text-lg">
                        {{ $director->name }}
                    </h3>
                    <p class="text-xs text-gray-500 sm:text-sm lg:text-base">
                        {{ $director->role ?? 'Director' }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    @else
    <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
        <p class="text-gray-500">No directors listed for this avenue yet.</p>
    </div>
    @endif
</div>

@endsection
