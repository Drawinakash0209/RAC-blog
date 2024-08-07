@extends('layout')

@section('content')
<div class="w-full dark:bg-gray-800 pb-10 flex items-center justify-center min-h-screen">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Rotaract Club News</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600 dark:text-gray-300">
                Stay updated with the latest news and events from our Rotaract club.
            </p>

            <div class="flex items-center justify-center mt-8">
                <embed class="_df_book" id="flipbok_example" src="storage/report/CB011215GroupB.pdf" width="1000px" height="600px" />
            </div>
        </div>
    </div>
</div>
@endsection
