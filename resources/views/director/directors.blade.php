@extends('layout')

@section('content')
<section class="hero-section relative">
  <img src="..\storage\hero2\6.png" id="bg" class="w-full h-auto object-cover object-center">
  <h1 id="text" class="absolute inset-0 flex items-center justify-center text-white text-4xl sm:text-6xl font-bold">BOARD OF DIRECTORS</h1>
  <img src="..\storage\hero2\man.png" id="man" class="absolute inset-x-0 bottom-0 w-full h-auto object-cover object-center">
  <img src="..\storage\hero2\clouds_1.png" id="clouds_1" class="absolute inset-0 w-full h-auto object-cover object-center">
  <img src="..\storage\hero2\clouds_2.png" id="clouds_2" class="absolute inset-0 w-full h-auto object-cover object-center">
  <img src="..\storage\hero2\mountain_left.png" id="mountain_left" class="absolute inset-0 w-full h-auto object-cover object-center">
  <img src="..\storage\hero2\mountain_right.png" id="mountain_right" class="absolute inset-0 w-full h-auto object-cover object-center">
</section>


<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="mx-auto mb-10 lg:max-w-xl sm:text-center">
    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
      Discover Our Team
    </p>
    <p class="text-base text-gray-700 md:text-lg">
      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
    </p>
  </div>

  <div class="grid gap-10 mx-auto sm:grid-cols-2 lg:grid-cols-4 lg:max-w-screen-lg">
    @foreach($directors as $director)
      <a href="{{ route('directors.show', $director->id)}}" class="group relative block bg-black">
        <img
          alt="Person"
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae commodi cumque aperiam eum optio incidunt recusandae necessitatibus quod, maiores repudiandae ab vel reprehenderit maxime quibusdam cupiditate! Esse illum sint quibusdam.
              </p>
            </div>
            
          </div>

          
        </div>
      </a>
    @endforeach
  </div>
</div>


@endsection
