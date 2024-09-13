@extends('layout')

@section('content')

@php
use Carbon\Carbon;
@endphp


<section class="mb-40 overflow-hidden">
    <!-- hero section -->

    <div class="image-container">
        <div class="image-container-overlay"> </div>
        <img src="\storage\slidehero\heroBanner1.jpg" alt="Sustainable Development Goals">
        <img src="\storage\slidehero\heroBanner2.jpg" alt="Sustainable Development Goals">
        <img src="\storage\slidehero\heroBanner3.jpg" alt="Sustainable Development Goals">
    
        <div class=" sm:text-6xl xs:text-5xl text-left text-white font-serif font-extrabold uppercase z-30">
        <h1>Service </h1>
        <h1>above self,</h1>
        <h1>impact </h1>
        <h1>beyond measure</h1>
        </div> 
    </div>

    <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center" >Our Projects</h2>
        <p class="text-gray-600 text-center mb-12">Explore our impactful projects designed to make a difference in our community and beyond. From community service initiatives to professional development programs, our projects embody our commitment to positive change and sustainable impact.</p>

    <!-- Grid -->
    <div class="grid lg:grid-cols-2 gap-6">


      @foreach($projects as $project)
      <!-- Card -->
      <a class="group relative block rounded-xl" href="{{ route('projects.show', $project->id)}}">
        <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
          <img class="size-full absolute top-0 start-0 object-cover" src="{{ Storage::url($project->coverimage) }}" alt="Image Description">
        </div>
  
        <div class="absolute top-0 inset-x-0 z-10">
          <div class="p-4 flex flex-col h-full sm:p-6">
            <!-- Avatar -->
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="size-[46px] border-2 border-white rounded-full" src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Image Description">
              </div>
              <div class="ms-2.5 sm:ms-4">
                <h4 class="font-semibold text-white">
                  {{ $project->avenues->first()->name ?? 'No Avenue' }}
                </h4>
             
              </div>
            </div>
            <!-- End Avatar -->
          </div>
        </div>
  
        <div class="absolute bottom-0 inset-x-0 z-10">
          <div class="flex flex-col h-full p-4 sm:p-6">
            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
              {{ $project->name }}
            </h3>
            <p class="mt-2 text-white/80">
              {!! Str::limit(strip_tags($project->description), 50) !!}
            </p>
          </div>
        </div>
      </a>
      <!-- End Card -->
      @endforeach
    </div>
    <!-- End Grid -->
    <div class="mt-10">
    {{$projects->links()}}
    </div>
  </div>
  <!-- End Card Blog -->
    
    


{{-- News section  --}}

    <div class="w-full dark:bg-gray-800 pb-10">

        <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Rotaract Club News</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Stay updated with the latest news and events from our Rotaract club.
                </p>
            </div>
            <div
                class="mx-auto mt-8 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">

                @unless ($news->isEmpty())
                @foreach ($news as $new)
                
                <article
                    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <a href="{{ route('news.show', $new->id)}}">
                    <img src="{{$new->image ? asset('storage/' . $new->image): asset('/images/CR7.png')}}" alt="News" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                      <p class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                        Posted on: {{ \Carbon\Carbon::parse($new->date)->format('F d, Y') }}
                      </p>
                      
                        <div class="-ml-4 flex items-center gap-x-4"><svg viewBox="0 0 2 2"
                                class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                <circle cx="1" cy="1" r="1"></circle>
                            </svg>
                            
                        </div>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                      {{$new->title}}
                    </h3>
                  </a>
                </article>


                @endforeach

                @else
                <div class="text-center">No news</div>
                @endunless

            </div>
        </div>
    
    </div>

<!-- Events Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Section Heading -->
  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Upcoming Events</h2>
  <p class="text-gray-600 text-center mb-12">Join us at our upcoming events to connect with like-minded individuals, learn new skills, and make a positive impact in our community. From professional development workshops to community service initiatives, our events offer a range of opportunities for personal growth and social impact.</p>
  
  <!-- Grid -->
  <div class="grid lg:grid-cols-2 gap-6">
    @foreach($events as $event)
    <!-- Card -->
    <a class="group sm:flex rounded-xl focus:outline-none" href="{{ route('events.show', $event->id) }}">
      <div class="shrink-0 relative rounded-xl overflow-hidden h-[200px] sm:w-[250px] sm:h-[350px] w-full">
        <img class="size-full absolute top-0 start-0 object-cover" src="{{ $event->image ? asset('storage/' . $event->image) : asset('/images/CR7.png') }}" alt="Event Image">
      </div>
      
      <div class="grow">
        <div class="p-4 flex flex-col h-full sm:p-6">
          <div class="mb-3">
            <p class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
              {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
            </p>
          </div>
          <h3 class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600">
            {{ $event->title }}
          </h3>
          <p class="mt-2 text-gray-600">
            {!! $event->description !!}
          </p>
        </div>
      </div>
    </a>
    <!-- End Card -->
    @endforeach
  </div>
  <!-- End Grid -->
</div>
<!-- End Events Section -->

<section class="pt-40 pb-40 relative">
  <div class="absolute w-full h-full top-0 left-0 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image:url(/storage/gallery/IMG_8707.PNG)"></div>
  <div class="relative z-10 flex justify-center items-center min-h-[300px] md:min-h-[400px] lg:min-h-[500px]">
    <h1 class="text-white text-center font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl leading-tight">
      <span class="text-red-500">SERVING</span> : BEYOND : <span class="text-red-500">BOUNDARIES</span>
    </h1>
  </div>
</section>



    <!-- about us -->
<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">About Us</h2>
                <p class="mt-4 text-gray-600 text-lg">
                  Welcome to the Rotaract Club of APIIT!

                  Chartered in 2019, the Rotaract Club of APIIT, belonging to Rotaract in RID 3220, is a vibrant community consisting of passionate students, dedicated to making a positive difference in the world. From humble beginnings and a modest membership, the club has grown and flourished into a good-standing club consisting of 100+ Rotaractors.
                  
                  Now, in our 6th successful year, the Club moves forward stronger than ever under the leadership of Rtr. Shagaan Thevarajah bearing in mind the goal of serving beyond boundaries.</p>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="\storage\gallery\group.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <div class="bg-gray-900 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center space-y-4">
              <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Making a Difference Together</h2>
              <p class="text-lg leading-8 text-gray-300">Join us in our mission to serve the community and make a lasting impact.
              </p>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Number of Projects Completed</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+150</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Number of Collaborations</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+50</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Active Members</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+100</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Volunteer Hours Contributed</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+25 000</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
</section>


{{-- Avenue section --}}
<section class="text-gray-700 body-font mt-10">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
        Avenues
    </div>
    <div class="container px-5 py-12 mx-auto">

        <div class="flex flex-wrap text-center justify-center">
            
        @foreach($avenues as $avenue)
       
            <div class="p-4 md:w-1/4 sm:w-1/2">
              <a href="{{ route('avenues.show', $avenue->id) }}">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="{{$avenue->logo}}" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">{{$avenue->name}}
                    </h2>
                </div>
              </a>
            </div>
      
            @endforeach

        </div>
       
    </div>
</section>

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Testimonials</h2>
<p class="text-gray-600 text-center mb-12">Hear from our members and partners about their experiences with the Rotaract Club of APIIT. Their stories highlight the impact of our initiatives, the growth opportunities we've provided, and the sense of community that defines our club. Discover how Rotaract has made a difference in their lives and inspired positive change.</p>


  <div class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 gap-10">




      @foreach($testimonials as $testimonial)
    <div class="relative flex-col bg-clip-border rounded-xl bg-transparent text-gray-700 shadow-none grid gap-2 item sm:grid-cols-2">
      <div class="relative bg-clip-border rounded-xl overflow-hidden bg-white text-gray-700 shadow-lg m-0 w-full h-full flex justify-center items-center"><img src="{{ Storage::url($testimonial->image) }}" class="w-3/4 h-auto object-cover"  /></div>
      <div class="p-6 px-2 sm:pr-6 sm:pl-4">
        <p class="block antialiased font-sans text-base leading-relaxed text-inherit mb-8 font-normal !text-gray-500">{{$testimonial->content}}</p>
        <div class="flex items-center gap-4">
          <div>
            <p class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mb-0.5 !font-semibold">{{$testimonial->name}}</p>
            <p class="block antialiased font-sans text-sm leading-normal text-gray-700 font-normal">{{$testimonial->title}}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<section class="bg-white dark:bg-gray-900">
  <div class="container px-6 py-10 mx-auto">
      <div class="xl:flex xl:items-center xl:-mx-4">
        <div class="xl:w-1/2 xl:mx-4">
          <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Members of the Month</h1>

          <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
            Celebrate our outstanding members who have made exceptional contributions this month. Their dedication, enthusiasm, and hard work have set a remarkable example for all of us. Discover their achievements and get inspired by their stories.          </p>
      </div>


          <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
              @foreach($members as $member)
              <div>
                  <img class="object-cover rounded-xl aspect-square" src="{{$member->image ? asset('storage/' . $member->image): asset('/images/CR7.png')}}" alt="{{ $member->name }}">

                  <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">{{ $member->name }}</h1>

                  <p class="mt-2 text-gray-500 text-sm capitalize dark:text-gray-300">{{ $member->category }}</p>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</section>

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Moments That Matter</h2>
  <p class="text-gray-600 text-center mb-12">Step into a world of unforgettable experiences with our “Moments That Matter” collection. Here, we celebrate the highlights of our journey with the Rotaract Club of APIIT through a vibrant mosaic of images. Each photo captures the passion, camaraderie, and impact of our initiatives, showcasing the stories behind our smiles and successes. Experience the essence of our vibrant community and the magic we create together!</p>
  
<div class="grid grid-cols-2 gap-4 md:grid-cols-4">
  <div class="grid gap-4">
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img1.jpeg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center "
        src="\storage\gallery\img21.jpg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img5.jpg"
        alt="gallery-photo"
      />
    </div>
  </div>
  <div class="grid gap-4">
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img17.jpg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img7.jpg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center "
        src="\storage\gallery\img6.jpg"
        alt="gallery-photo"
      />
    </div>
  </div>
  <div class="grid gap-4">
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img16.jpg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center "
        src="\storage\gallery\img12.jpg"
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img14.jpg"
        alt="gallery-photo"
      />
    </div>
  </div>
  <div class="grid gap-4">
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img15.jpg"
        
        alt="gallery-photo"
      />
    </div>
    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center"
        src="\storage\gallery\img22.jpg"
        alt="gallery-photo"
      />
    </div>

    <div>
      <img
        class="h-auto max-w-full rounded-lg object-cover object-center "
        src="\storage\gallery\img19.jpg"
        alt="gallery-photo"
      />
    </div>
  </div>
</div>

  
</div>
</section>
@endsection
