@extends('layout')

@section('content')

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
    <div class="bg-cover bg-center text-center overflow-hidden"
        style="min-height: 500px; background-image: url('{{ asset('storage/' . $post->coverimage) }}')"
        title="Woman holding a mug">
    </div>
    <div class="max-w-3xl mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
            <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{$post->title}}</h1>
          

                <div>

                    {!! $post->description !!}

                </div>

               

         
              



            </div>

        </div>
    </div>
</div>
@endsection