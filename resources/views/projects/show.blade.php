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
        <h1 class="w-[92%] mx-auto lg:text-4xl md:text-3xl xs:text-2xl text-center font-semibold pb-4 pt-8 text-black">
            {{ $project->name }}
        </h1>

        <!-- Project Cover Image -->
        <img src="{{ Storage::url($project->coverimage) }}" alt="Cover image for {{ $project->name }}" class="xl:w-[80%] xs:w-[96%] mx-auto rounded-lg" />

        <!-- Project Info -->
        <div class="w-[90%] mx-auto flex md:gap-4 xs:gap-2 justify-center items-center pt-4">
            <div class="flex gap-2 items-center">
                <img src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Logo of {{ $project->avenues->first()->name ?? 'No Avenue' }}" class="md:w-[2.2rem] md:h-[2.2rem] xs:w-[2rem] xs:h-[2rem] rounded-full" />
                <h2 class="text-sm font-semibold text-black">{{ $project->avenues->first()->name ?? 'No Avenue' }}</h2>
            </div>
            <div class="text-gray-500">|</div>
            <h3 class="text-sm font-semibold text-gray-600">{{ $project->created_at->diffForHumans() }}</h3>
        </div>

        <!-- Project Description -->
        <div class="py-6 bg-white">
            <div class="md:w-[80%] xs:w-[90%] mx-auto pt-4">
                {!! $project->description !!}
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Other Recent Projects</h2>
            <p class="text-gray-600 text-center mb-12">Explore our impactful projects designed to make a difference in our community and beyond. From community service initiatives to professional development programs, our projects embody our commitment to positive change and sustainable impact.</p>

            <!-- Projects Grid -->
            <div class="grid lg:grid-cols-3 gap-3">
                @foreach($recentProjects as $recentProject)
                <!-- Project Card -->
                <a class="group relative block rounded-xl" href="{{ route('projects.show', $recentProject->id) }}">
                    <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
                        <img class="size-full absolute top-0 start-0 object-cover" src="{{ Storage::url($recentProject->coverimage) }}" alt="Image for {{ $recentProject->name }}">
                    </div>
                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Project Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="size-[46px] border-2 border-white rounded-full" src="{{ $recentProject->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Logo of {{ $recentProject->avenues->first()->name ?? 'No Avenue' }}">
                                </div>
                                <div class="ms-2.5 sm:ms-4">
                                    <h4 class="font-semibold text-white">
                                        {{ $recentProject->avenues->first()->name ?? 'No Avenue' }}
                                    </h4>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
                                {{ $recentProject->name }}
                            </h3>
                            <p class="mt-2 text-white/80">
                                {!! Str::limit(strip_tags($recentProject->description), 50) !!}
                            </p>
                        </div>
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
