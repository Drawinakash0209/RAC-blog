@extends('layout')

@section('title', $project->name)
@section('meta-description', Str::limit(strip_tags($project->description), 160))
@section('meta-keywords', implode(',', array_map('trim', explode(',', $project->keywords ?? ''))))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Project",
    "name": "{{ $project->name }}",
    "description": "{{ Str::limit(strip_tags($project->description), 150) }}",
    "image": "{{ Storage::url($project->coverimage) }}",
    "author": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Rotaract Club of APIIT"
    },
    "datePublished": "{{ $project->created_at->toIso8601String() }}",
    "dateModified": "{{ $project->updated_at->toIso8601String() }}"
}
</script>
@endsection

@section('content')

<!-- Project Details -->
<div class="w-full h-full bg-white">
    <div class="w-full mx-auto py-10 bg-white">

        <!-- Project Title -->
        <h1 class="w-[92%] mx-auto text-center font-semibold text-black pt-8 pb-4 lg:text-4xl md:text-3xl text-2xl">
            {{ $project->name }}
        </h1>

        <!-- Project Cover Image -->
        <img src="{{ Storage::url($project->coverimage) }}" alt="Cover image for {{ $project->name }}" class="w-[96%] lg:w-[80%] mx-auto rounded-lg" />

        <!-- Project Info -->
        <div class="w-[90%] mx-auto flex justify-center items-center gap-2 md:gap-4 pt-4">
            <div class="flex items-center gap-2">
                <img src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Logo of {{ $project->avenues->first()->name ?? 'No Avenue' }}" class="w-[2rem] h-[2rem] md:w-[2.2rem] md:h-[2.2rem] rounded-full" />
                <h2 class="text-sm font-semibold text-black">{{ $project->avenues->first()->name ?? 'No Avenue' }}</h2>
            </div>
            <div class="text-gray-500">|</div>
            <h3 class="text-sm font-semibold text-gray-600">{{ $project->created_at->diffForHumans() }}</h3>
        </div>

        <!-- Project Description -->
        <div class="py-6">
            <div class="w-[90%] md:w-[80%] mx-auto pt-4">
                {!! $project->description !!}
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Other Recent Projects</h2>
            <p class="text-gray-600 text-center mb-12">Explore our impactful projects designed to make a difference in our community and beyond. From community service initiatives to professional development programs, our projects embody our commitment to positive change and sustainable impact.</p>

            <!-- Projects Grid -->
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($recentProjects as $recentProject)
                <!-- Project Card -->
                <a class="group relative block rounded-xl" href="{{ route('projects.show', $recentProject->id) }}">
                    <div class="relative w-full h-[300px] sm:h-[350px] rounded-xl overflow-hidden before:absolute before:inset-x-0 before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ Storage::url($recentProject->coverimage) }}" alt="Image for {{ $recentProject->name }}">
                    </div>
                    <div class="absolute inset-x-0 top-0 z-10 p-4 sm:p-6">
                        <div class="flex items-center">
                            <img class="w-10 h-10 border-2 border-white rounded-full" src="{{ $recentProject->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Logo of {{ $recentProject->avenues->first()->name ?? 'No Avenue' }}">
                            <div class="ml-2.5 sm:ml-4">
                                <h4 class="font-semibold text-white">{{ $recentProject->avenues->first()->name ?? 'No Avenue' }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 z-10 p-4 sm:p-6">
                        <h3 class="text-lg sm:text-2xl font-semibold text-white">{{ $recentProject->name }}</h3>
                        <p class="mt-2 text-white/80">
                            {!! Str::limit(strip_tags($recentProject->description), 50) !!}
                        </p>
                    </div>
                </a>
                <!-- End Project Card -->
                @endforeach
            </div>
            <!-- End Projects Grid -->
        </div>
        <!-- End Recent Projects -->

    </div>
</div>

@endsection
