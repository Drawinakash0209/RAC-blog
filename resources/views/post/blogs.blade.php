@extends('layout')

@section('content')

<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Blogs</h2>
        <p class="text-gray-600 text-center mb-12">Discover the latest updates, stories, and insights from our Rotaract Club. Stay informed and inspired by reading our blogs.</p>

        <div class="flex flex-wrap -mx-4">
            <!-- Main Posts Column -->
            <div class="w-full px-4">
                <div class="py-12 grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                    @foreach($posts as $post)
                        <!-- Card -->
                        <a class="group block" href="{{ route('post.show', $post->id) }}">
                            <div class="aspect-w-16 aspect-h-12 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
                                <img class="group-hover:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl" src="{{$post->coverimage ? asset('storage/' . $post->coverimage): asset('/images/CR7.png')}}" alt="{{$post->title}}">
                            </div>

                            <div class="pt-4">
                                <h3 class="relative inline-block font-medium text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100">
                                    {{$post['title']}}
                                </h3>
                                <p class="mt-1 text-gray-600 dark:text-neutral-400">
                                    {!! Str::limit(strip_tags($post->description), 250) !!}
                                </p>

                                <div class="mt-3 flex flex-wrap gap-2">
                                    @php
                                    $tags = explode(',', $post->keywords);
                                    @endphp
                                    @foreach ($tags as $tag)
                                    <span class="py-1.5 px-3 bg-white text-gray-600 border border-gray-200 text-xs sm:text-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                        {{$tag}}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                        <!-- End Card -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
