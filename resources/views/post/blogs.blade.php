@extends('layout')

@section('content')


<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Blogs</h2>
        <p class="text-gray-600 text-center mb-12">Discover the latest updates, stories, and insights from our Rotaract Club. Stay informed and inspired by reading our blogs.</p>

        <div class="flex flex-wrap -mx-4">
            <!-- Main Posts Column -->
            <div class="w-full lg:w-8/12 px-4">
                <div class="py-12 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                    @foreach($posts as $post)
                        <!-- Card -->
                        <a class="group block" href="{{ route('post.show', $post->id)}}">
                            <div class="aspect-w-16 aspect-h-12 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
                                <img class="group-hover:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl" src="{{$post->coverimage ? asset('storage/' . $post->coverimage): asset('/images/CR7.png')}}" alt="{{$post->title}}">
                            </div>

                            <div class="pt-4">
                                <h3 class="relative inline-block font-medium text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 ">
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



            <!-- Sidebar Column -->
            <div class="hidden lg:block lg:w-4/12 px-4">
                <div class="px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                    <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                        <ul class="-mx-4">
                            <li class="flex items-center"><img
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</a><span
                                        class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane Doe</a><span
                                        class="text-sm font-light text-gray-700">Created 52 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Lisa Way</a><span
                                        class="text-sm font-light text-gray-700">Created 73 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Steve Matt</a><span
                                        class="text-sm font-light text-gray-700">Created 245 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Khatab
                                        Wedaa</a><span class="text-sm font-light text-gray-700">Created 332 Posts</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="px-8 mt-10">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                    <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <ul>
                            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- AWS</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Laravel</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Vue</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Design</a></li>
                            <li class="flex items-center mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Django</a></li>
                            <li class="flex items-center mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- PHP</a></li>
                        </ul>
                    </div>
                </div>

                <div class="px-8 mt-10">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                    <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <ul>
                            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- AWS</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Laravel</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Vue</a></li>
                            <li class="mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Design</a></li>
                            <li class="flex items-center mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Django</a></li>
                            <li class="flex items-center mt-2"><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- PHP</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
              



@endsection
