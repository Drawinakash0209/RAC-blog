@extends('layout')

@section('title', $avenue->name . ' | Rotaract Club of APIIT')
@section('meta-description', Str::limit(strip_tags($avenue->description), 160))
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
<div class="relative overflow-hidden bg-cover bg-no-repeat" style="
background-position: 50%;
background-image: url('{{ $avenue->cover_image ? asset('storage/' . $avenue->cover_image) : asset('/images/CR7.png') }}');
height: 500px;
">
    <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.50)] bg-fixed">
        <div class="flex h-full items-center justify-center">
            <div class="px-6 text-center text-white md:px-12">
                <h1 class="mt-2 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                  {{$avenue->name}}<br /><span >Serving beyond boundaries</span>
                </h1>
            </div>
        </div>
    </div>
</div>

{{-- About the avenue --}}
<div class="px-4 sm:px-10 mt-28">
    <div class="max-w-7xl w-full mx-auto grid md:grid-cols-2 justify-center items-center gap-10">
        <div>
            <h2 class="md:text-4xl text-3xl font-semibold mb-6">What {{$avenue->name}} is About</h2>
            <p>{{$avenue->description}}</p>
        </div>
        <div class="w-full h-full">
            <img src="..\storage\gallery\group3.jpg" alt="feature" class="w-full h-full object-cover" />
        </div>
    </div>
</div>

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Key Projects</h2>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Our dedicated directors are the driving force behind our impactful projects and initiatives. They bring a wealth of experience, passion, and commitment to their roles, ensuring that our avenues of service create meaningful change in the community.</p>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 lg:mb-14">
        @foreach($avenue->projects as $project)
        <!-- Card -->
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
            <div class="aspect-w-16 aspect-h-9">
                <img class="w-full object-cover rounded-t-xl" src="{{ Storage::url($project->coverimage) }}" alt="Image Description"  >
            </div>
            <div class="p-4 md:p-5">
                <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                    {{ $project->created_at->diffForHumans() }}
                </p>
                <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
                    {{ $project->name }}
                </h3>
            </div>
        </a>
        <!-- End Card -->
        @endforeach
    </div>
    <!-- End Grid -->

</div>
<!-- End Card Blog -->

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Meet Our Directors</h2>
    </div>
    <!-- End Title -->

    @if($avenue->directors->count() < 3)
        <div class="flex justify-center gap-8 md:gap-12">
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12">
    @endif
        @foreach($avenue->directors as $director)
        <div class="text-center">
            <img class="rounded-xl sm:w-48 lg:w-60 mx-auto" src="{{$director->image ? asset('storage/' . $director->image) : asset('/images/CR7.png')}}" alt="Avatar">
            <div class="mt-2 sm:mt-4">
                <h3 class="text-sm font-medium  sm:text-base lg:text-lg ">
                    {{ $director->name }}
                </h3>
                <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-neutral-400">
                    {{ $director->role ?? 'Director' }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
