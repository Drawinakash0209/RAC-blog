@extends('layout')

@section('content')


@foreach($rda as $rd)
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">
        {{ $rd->name }}
    </h2>
  
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      

        @foreach($rd->awards as $award)
      <article class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
        <div
          class="w-full h-60 rounded-[10px] bg-cover bg-center"
          style="background-image: url('{{ asset('storage/' . $award->image) }}');">
        </div>
      </article>
      @endforeach
  
  
  
 

    </div>
  </div>

    @endforeach
  @endsection