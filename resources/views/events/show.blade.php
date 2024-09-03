@extends('layout')

@section('content')
<div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-28 lg:my-0">
    <!--Main Col-->
    <div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white mx-6 lg:mx-0">
        <div class="p-5 md:p-12 text-center lg:text-left">
            <!-- Image for mobile view -->
            @if($event->image)
            <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center md: -mt-20" style="background-image: url('{{ asset('storage/' . $event->image) }}')"></div>
            @endif

            <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $event->title }}</h1>
            <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
            <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">{{ $event->location }}</p>
            {{-- <p class="pt-4 text-sm lg:text-base">{{ $event->date->format('F j, Y') }}</p> --}}
            <p class="pt-8 text-sm lg:text-base">{!! $event->description !!}</p>

            <div class="mt-7 pb-7 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-center gap-10 lg:gap-20">
                <!-- Add social links or any additional content if needed -->
            </div>
        </div>
    </div>

    <!-- Img Col -->
    @if($event->image)
    <div class="w-full lg:w-2/5">
        <!-- Big profile image for side bar (desktop) -->
        <img src="{{ asset('storage/' . $event->image) }}" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block"/>
    </div>
    @endif

    <!-- Pin to top right corner -->
    <div class="fixed bottom-5 right-0 bg-yellow-800 flex justify-center align-middle rounded-l-2xl shadow-2xl">
        <button class="js-change-theme focus:outline-none w-12 h-12 p-3">
            🌙
        </button>
    </div>
</div>
@endsection
