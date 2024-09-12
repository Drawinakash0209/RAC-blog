@extends('layout')

@section('title', 'Executive Committee | Rotaract Club of APIIT')
@section('meta-description', 'Meet the dedicated members of our Executive Committee who lead our initiatives and projects at the Rotaract Club of APIIT.')
@section('meta-keywords', 'Executive Committee, Rotaract Club of APIIT, Team, Leadership')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Rotaract Club of APIIT",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo.png') }}",
    "description": "Meet the Executive Committee of the Rotaract Club of APIIT, dedicated to leading and managing club activities.",
    "sameAs": [
        "https://facebook.com/your-page",
        "https://twitter.com/your-profile",
        "https://instagram.com/your-profile"
    ]
}
</script>
@endsection

@section('content')

<section class="hero-section">
    <img src="..\storage\hero2\6.png" id="bg" alt="Background Image">
    <h1 id="text">EXECUTIVE COMMITTEE</h1>
    <img src="..\storage\hero2\man.png" id="man" alt="Executive Committee Image">
    <img src="..\storage\hero2\clouds_1.png" id="clouds_1" alt="Clouds Image 1">
    <img src="..\storage\hero2\clouds_2.png" id="clouds_2" alt="Clouds Image 2">
    <img src="..\storage\hero2\mountain_left.png" id="mountain_left" alt="Left Mountain Image">
    <img src="..\storage\hero2\mountain_right.png" id="mountain_right" alt="Right Mountain Image">
</section>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="mx-auto mb-10 lg:max-w-xl sm:text-center">
        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
            Meet Our Exco Team
        </p>
        <p class="text-base text-gray-700 md:text-lg">
            Our dedicated executive team is committed to driving the vision and values of the Rotaract Club of APIIT. Together, we strive to make a lasting impact in our community and beyond.
        </p>
    </div>

    <div class="grid gap-10 mx-auto sm:grid-cols-2 lg:grid-cols-3 lg:max-w-screen-lg">
        @foreach($excoMembers as $excoMember)
        <div class="group relative block bg-black min-h-[500px]"> 
            <img
                alt="{{ $excoMember->name }}'s Image"
                src="{{$excoMember->image ? asset('storage/' . $excoMember->image) : asset('/images/CR7.png')}}"
                class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
                style="object-position: center top;"
            />

            <div class="relative p-4 sm:p-6 lg:p-8">
                <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
                    {{ ucwords(str_replace('_', ' ', $excoMember->position)) }}
                </p>

                <p class="text-xl font-bold text-white sm:text-2xl">
                    {{$excoMember->name}}
                </p>

                <div class="mt-32 sm:mt-48 lg:mt-64">
                    <div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                        <p class="text-sm text-white">
                            {{$excoMember->about}}
                        </p>

                        <div class="flex space-x-4 mt-4">
                            @if($excoMember->email)
                            <a href="mailto:{{$excoMember->email}}" class="h-6 w-6">
                                <img src="https://img.icons8.com/?size=100&id=38158&format=png&color=ffffff" alt="Gmail" class="h-6 w-6">
                            </a>
                            @endif

                            @if($excoMember->linkedin)
                            <a href="{{$excoMember->linkedin}}" class="h-6 w-6">
                                <img src="https://img.icons8.com/?size=100&id=447&format=png&color=ffffff" alt="LinkedIn" class="h-6 w-6">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
