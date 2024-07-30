@extends('layout')

@section('content')


<section class="hero-section">
    <img src="..\storage\hero2\6.png" id="bg">
    <h1 id="text">EXECUTIVE COMMITTEE</h1>
    <img src="..\storage\hero2\man.png" id="man">
    <img src="..\storage\hero2\clouds_1.png" id="clouds_1">
    <img src="..\storage\hero2\clouds_2.png" id="clouds_2">
    <img src="..\storage\hero2\mountain_left.png" id="mountain_left">
    <img src="..\storage\hero2\mountain_right.png" id="mountain_right">
</section>


<section id="our-team" class="bg-gray-100 py-32">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-primary">Executive Committee</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($excoMembers as $excoMember)
            <div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                <img src="https://spacema-dev.com/elevate/assets/images/team/1.jpg" alt="Team Member 1" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-2">{{$excoMember->name}}</h3>
                <p class="text-gray-700">{{ ucwords(str_replace('_', ' ', $excoMember->position)) }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>





@endsection