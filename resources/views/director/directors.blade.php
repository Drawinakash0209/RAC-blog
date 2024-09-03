@extends('layout')

@section('title', 'Board of Directors | Rotaract Club of APIIT')

@section('meta')
    <meta name="description" content="Meet the dedicated Board of Directors of the Rotaract Club of APIIT. Learn more about their roles, achievements, and contributions to our community.">
    <meta name="keywords" content="Board of Directors, Rotaract Club, APIIT, Executive Committee, Leadership">
@endsection

@section('content')
<section class="hero-section">
  <img src="{{ asset('storage/hero2/6.png') }}" id="bg" alt="Board of Directors Background">
  <h1 id="text">BOARD OF DIRECTORS</h1>
  <img src="{{ asset('storage/hero2/man.png') }}" id="man" alt="Executive Committee Member">
  <img src="{{ asset('storage/hero2/clouds_1.png') }}" id="clouds_1" alt="Clouds Image 1">
  <img src="{{ asset('storage/hero2/clouds_2.png') }}" id="clouds_2" alt="Clouds Image 2">
  <img src="{{ asset('storage/hero2/mountain_left.png') }}" id="mountain_left" alt="Left Mountain Image">
  <img src="{{ asset('storage/hero2/mountain_right.png') }}" id="mountain_right" alt="Right Mountain Image">
</section>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="mx-auto mb-10 lg:max-w-xl sm:text-center">
    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
      Discover Our Team
    </p>
    <p class="text-base text-gray-700 md:text-lg">
      Meet the committed and talented individuals who lead the Rotaract Club of APIIT. Discover their roles, achievements, and contributions to our community.
    </p>
  </div>

  <div class="grid gap-10 mx-auto sm:grid-cols-2 lg:grid-cols-3 lg:max-w-screen-lg">
    @foreach($directors as $director)
      <div class="group relative block bg-black min-h-[500px]"> 
        <img
          alt="{{ $director->name }} - {{ $director->position }} - Rotaract Club of APIIT"
          src="{{ $director->image ? asset('storage/' . $director->image) : asset('/images/CR7.png') }}"
          class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
          style="object-position: center top;"
        />

        <div class="relative p-4 sm:p-6 lg:p-8">
          <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
            Director of {{ $director->avenue->name }}
          </p>

          <p class="text-xl font-bold text-white sm:text-2xl">
            {{ $director->name }}
          </p>

          <div class="mt-32 sm:mt-48 lg:mt-64">
            <div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
              <p class="text-sm text-white">
                {{ $director->about }}
              </p>

              <div class="flex space-x-4 mt-4">
                @if($director->email)
                <a href="mailto:{{ $director->email }}" class="h-6 w-6" aria-label="Email {{ $director->name }}">
                  <img src="https://img.icons8.com/?size=100&id=38158&format=png&color=ffffff" alt="Email Icon" class="h-6 w-6">
                </a>
                @endif

                @if($director->linkedin)
                <a href="{{ $director->linkedin }}" class="h-6 w-6" aria-label="LinkedIn Profile of {{ $director->name }}">
                  <img src="https://img.icons8.com/?size=100&id=447&format=png&color=ffffff" alt="LinkedIn Icon" class="h-6 w-6">
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
