@extends('layout')

@section('content')

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 sm:items-center gap-8">
        <!-- Image Column -->
        <div class="sm:order-2">
            <div class="relative pt-[50%] sm:pt-[100%] rounded-lg">
                <img class="size-full absolute top-0 start-0 object-cover rounded-lg"
                     src="{{ asset('storage/' . $new->image) }}" alt="Blog Image">
            </div>
        </div>
        <!-- End Image Column -->

        <!-- Content Column -->
        <div class="sm:order-1">
            <!-- Title -->
            <h2 class="text-2xl font-bold md:text-3xl lg:text-4xl lg:leading-tight xl:text-5xl xl:leading-tight">
                {{ $new->title }}
            </h2>

            <!-- Description -->
            <div class="mt-5">
                <div class="prose max-w-none">
                    {!! $new->description !!}
                </div>
            </div>
        </div>
        <!-- End Content Column -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
