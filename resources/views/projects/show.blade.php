@extends('layout')

@section('content')

<div class="w-full h-full bg-white">
    <div class="w-full mx-auto py-10 bg-white">
  

        <!--  -->
        <h1 class="w-[92%] mx-auto lg:text-4xl md:text-3xl xs:text-2xl text-center  font-semibold pb-4 pt-8 text-black">{{$project->name}}</h1>

        <!-- Blog Cover -->
        <img src="{{ Storage::url($project->coverimage) }}" alt="Blog Cover" class="xl:w-[80%] xs:w-[96%] mx-auto rounded-lg" />

        <!-- Blog Info -->
        <div class="w-[90%] mx-auto flex md:gap-4 xs:gap-2 justify-center items-center pt-4">
            <div class="flex gap-2 items-center">
                <img src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Blogger Profile" class="md:w-[2.2rem] md:h-[2.2rem] xs:w-[2rem] xs:h-[2rem] rounded-full" />
                <h2 class="text-sm font-semibold text-black">{{$project->avenues->first()->name ?? 'No Avenue'}}</h2>

            </div>
            <div class="text-gray-500">|</div>

            <h3 class="text-sm font-semibold text-gray-600"> {{ $project->created_at->diffForHumans() }}</h3>

            
        </div>

        <!-- Blog -->
        <div class="py-6 bg-white">
            <div class="md:w-[80%] xs:w-[90%] mx-auto pt-4">
                {!! $project->description !!}

            </div>
        </div>

    </div>
</div>
@endsection
