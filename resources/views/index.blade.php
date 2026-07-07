@extends('layout')

@section('content')

@php
use Carbon\Carbon;
@endphp


<section class="mb-40 overflow-hidden">
    <!-- hero section -->

    <div class="image-container">
        <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/80 via-black/50 to-black/20"></div>
        <img src="\storage\slidehero\heroBanner1.jpg" alt="Sustainable Development Goals">
        <img src="\storage\slidehero\heroBanner2.jpg" alt="Sustainable Development Goals">
        <img src="\storage\slidehero\heroBanner3.jpg" alt="Sustainable Development Goals">

        <div class="relative z-20 max-w-3xl px-6 sm:px-10">
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold uppercase leading-[1.05] text-white">
                Driven by service,
                <span class="text-red-500">defined by change</span>
            </h1>
            <p class="mt-6 max-w-xl text-base sm:text-lg text-white/80">
                The Rotaract Club of APIIT — a community of students turning service into lasting impact.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#aboutus" class="inline-flex items-center rounded-full bg-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/30 transition hover:bg-red-600">
                    Discover Our Story
                </a>
                <a href="{{ route('post.blog') }}" class="inline-flex items-center rounded-full border border-white/30 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    Read Our Blog
                </a>
            </div>
        </div>
    </div>

    {{-- ── Projects Grid ── --}}
<section class="bg-white">
<div class="max-w-[85rem] px-4 py-16 sm:px-6 lg:px-8 mx-auto">

    <div class="max-w-2xl mx-auto text-center mb-14">
      <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our Work</span>
      <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl tracking-tight">Our Projects</h2>
      <p class="mt-3 text-gray-500 leading-relaxed">Explore our impactful projects designed to make a difference in our community and beyond — from community service to professional development.</p>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($projects as $project)

      <a class="group relative block rounded-2xl overflow-hidden shadow-md transition-all duration-400 hover:-translate-y-2 hover:shadow-2xl"
         href="{{ route('projects.show', $project->slug) }}"
         aria-label="{{ $project->name }}">

        {{-- Image + gradient --}}
        <div class="relative w-full h-[340px] overflow-hidden">
          <img
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
            src="{{ Storage::url($project->coverimage) }}"
            alt="{{ $project->name }}"
            loading="lazy"
          />
          {{-- Strong bottom gradient for readability --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>

          {{-- Hover tint overlay --}}
          <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/10 transition-colors duration-400"></div>
        </div>

        {{-- Avenue badge — top left --}}
        <div class="absolute top-4 left-4 z-10">
          <div class="flex items-center gap-2 bg-black/40 backdrop-blur-sm rounded-full px-3 py-1.5 border border-white/20">
            <img
              class="w-5 h-5 rounded-full object-cover ring-1 ring-white/50"
              src="{{ $project->avenues->first()->logo ?? '' }}"
              alt="{{ $project->avenues->first()->name ?? '' }}"
            />
            <span class="text-xs font-semibold text-white/90 leading-none">
              {{ $project->avenues->first()->name ?? 'No Avenue' }}
            </span>
          </div>
        </div>

        {{-- Arrow badge — top right, reveals on hover --}}
        <div class="absolute top-4 right-4 z-10 opacity-0 group-hover:opacity-100 translate-x-2 group-hover:translate-x-0 transition-all duration-300">
          <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10"/>
            </svg>
          </div>
        </div>

        {{-- Bottom content --}}
        <div class="absolute bottom-0 inset-x-0 z-10 p-5">
          {{-- Red accent line --}}
          <div class="w-8 h-0.5 bg-red-500 mb-3 transition-all duration-300 group-hover:w-14"></div>
          <h3 class="text-xl font-bold text-white leading-snug mb-1.5 group-hover:text-red-100 transition-colors">
            {{ $project->name }}
          </h3>
          <p class="text-sm text-white/70 line-clamp-2">
            {!! html_excerpt($project->description, 80) !!}
          </p>
        </div>

      </a>

      @endforeach
    </div>
    {{-- End Grid --}}

    {{-- Pagination --}}
    <div class="mt-12">
      {{ $projects->links() }}
    </div>

</div>
</section>
  {{-- End Projects Grid --}}

    
    


{{-- News section  --}}

    <div class="w-full bg-gray-50 py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center mb-12">
                <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Latest News</span>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Rotaract Club News</h2>
                <p class="mt-3 text-base text-gray-600">Stay updated with the latest news and events from our Rotaract club.</p>
            </div>
            <div class="mx-auto mt-8 grid max-w-2xl auto-rows-fr grid-cols-1 gap-6 sm:mt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                @unless ($news->isEmpty())
                @foreach ($news as $new)
                <article class="group relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-7 py-7 pb-7 pt-72 sm:pt-44 lg:pt-72 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                    <a href="{{ route('news.show', $new->id)}}">
                    <img src="{{$new->image ? asset('storage/' . $new->image): asset('/images/CR7.png')}}" alt="{{ $new->title }}" class="absolute inset-0 -z-10 h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-white/10"></div>
                    <div class="mb-3">
                      <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-300 border border-red-500/30">
                        {{ \Carbon\Carbon::parse($new->created_at)->format('M d, Y') }}
                      </span>
                    </div>
                    <h3 class="text-lg font-semibold leading-6 text-white group-hover:text-red-200 transition-colors">{{$new->title}}</h3>
                  </a>
                </article>
                @endforeach

                @else
                <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center">
                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-6 4h.01"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No News Yet</h3>
                    <p class="text-gray-400 max-w-sm">There are no news articles at the moment. Check back soon for the latest updates from our Rotaract club.</p>
                </div>
                @endunless

            </div>
        </div>
    </div>

<div class="max-w-[85rem] px-4 py-16 sm:px-6 lg:px-8 mx-auto">
  <div class="max-w-2xl mx-auto text-center mb-12">
    <span class="text-sm font-semibold uppercase tracking-wider text-red-500">What's On</span>
    <h2 class="mt-2 text-3xl font-bold md:text-4xl md:leading-tight text-gray-800">Upcoming Events</h2>
    <p class="mt-3 text-gray-600">Join us to connect, learn, and make a positive impact. Explore opportunities for personal growth and social engagement.</p>
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($events as $event)
    <a class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-2xl overflow-hidden transition-all duration-300 hover:border-red-100 hover:-translate-y-1 hover:shadow-xl focus:outline-none" href="{{ route('events.show', $event->id) }}">
      <div class="relative overflow-hidden h-48">
        <img class="w-full h-full object-cover transition duration-500 group-hover:scale-105" src="{{ $event->image ? asset('storage/' . $event->image) : asset('/images/CR7.png') }}" alt="{{ $event->title }}">
        <div class="absolute top-3 left-3">
          <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold bg-red-500 text-white shadow">
            {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
          </span>
        </div>
      </div>
      <div class="p-5 md:p-6 flex flex-col flex-1">
        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-red-500 transition-colors leading-snug">
          {{ $event->title }}
        </h3>
        <p class="mt-2 text-sm text-gray-500 flex-1">
          {!! \Illuminate\Support\Str::limit($event->description, 160, '...') !!}
        </p>
        <div class="mt-4 pt-4 border-t border-gray-100">
          <span class="inline-flex items-center gap-x-1 text-sm font-semibold text-red-500 group-hover:gap-x-2 transition-all">
            View Details
            <svg class="flex-shrink-0 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/></svg>
          </span>
        </div>
      </div>
    </a>
    @empty
    <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center">
        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-xl font-semibold text-gray-600 mb-2">No Upcoming Events</h3>
        <p class="text-gray-400 max-w-sm">There are no events scheduled at the moment. Stay tuned — exciting opportunities are coming soon!</p>
    </div>
    @endforelse
  </div>
</div>
<!-- End Events Section -->

<section class="relative overflow-hidden">
  <div class="absolute inset-0 bg-cover bg-center" style="background-image:url(/storage/gallery/banner.png)"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/70"></div>
  <div class="relative z-10 flex min-h-[300px] items-center justify-center px-4 py-24 sm:min-h-[400px] sm:py-32 lg:min-h-[500px]">
    <h1 class="text-center font-bold leading-tight
               text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl
               drop-shadow-lg">
      <span class="text-red-500">INSPIRE SERVICE :</span>
      <span class="text-white">EMPOWER CHANGE</span>
    </h1>
  </div>
</section>



    <!-- about us -->
<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 sm:py-24 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10 md:gap-16">
            <div class="max-w-lg mx-auto md:mx-0">
                <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Who We Are</span>
                <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">About Us</h2>
                <p class="mt-6 text-lg leading-relaxed text-gray-600">
                    Welcome to the Rotaract Club of APIIT! Chartered in 2019,
                    the Rotaract Club of APIIT, belonging to Rotaract in RID
                    3220, is a vibrant community consisting of passionate
                    students, dedicated to making a positive difference in
                    the world. From humble beginnings and modest
                    membership, the club has grown and flourished into a
                    good-standing club consisting of 100+ Rotaractors. Now,
                    in our 7th successful year, the Club moves forward
                    stronger than ever under the leadership of Rtr. Gayathri Manoharan bearing in mind the
                    goal of Inspire Service, Empower Change.
                </p>
            </div>
            <div class="relative mx-auto w-full max-w-md md:max-w-none">
                <div class="absolute -inset-4 -z-10 rounded-3xl bg-red-500/10 hidden sm:block"></div>
                <img src="\storage\gallery\group2.jpg" alt="About Us" class="h-72 w-full rounded-2xl object-cover shadow-xl sm:h-96 md:h-[420px]">
            </div>
        </div>
    </div>

    <div class="bg-gray-900 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center space-y-3">
              <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Making a Difference Together</h2>
              <p class="text-lg leading-8 text-gray-300">Join us in our mission to serve the community and make a lasting impact.
              </p>
            </div>
            <dl class="mt-16 grid grid-cols-2 gap-4 text-center lg:grid-cols-4">
              <div class="flex flex-col rounded-2xl bg-white/5 border border-white/10 p-8 transition hover:bg-white/8">
                <dt class="text-sm font-semibold leading-6 text-gray-400">Projects Completed</dt>
                <dd class="order-first text-5xl font-extrabold tracking-tight text-red-500">+150</dd>
              </div>
              <div class="flex flex-col rounded-2xl bg-white/5 border border-white/10 p-8 transition hover:bg-white/8">
                <dt class="text-sm font-semibold leading-6 text-gray-400">Collaborations</dt>
                <dd class="order-first text-5xl font-extrabold tracking-tight text-red-500">+50</dd>
              </div>
              <div class="flex flex-col rounded-2xl bg-white/5 border border-white/10 p-8 transition hover:bg-white/8">
                <dt class="text-sm font-semibold leading-6 text-gray-400">Active Members</dt>
                <dd class="order-first text-5xl font-extrabold tracking-tight text-red-500">+100</dd>
              </div>
              <div class="flex flex-col rounded-2xl bg-white/5 border border-white/10 p-8 transition hover:bg-white/8">
                <dt class="text-sm font-semibold leading-6 text-gray-400">Volunteer Hours</dt>
                <dd class="order-first text-5xl font-extrabold tracking-tight text-red-500">+25K</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
</section>


{{-- Avenue section --}}
<section class="bg-white">
  <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto text-center mb-12">
      <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Get Involved</span>
      <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">Our Avenues</h2>
      <p class="mt-3 text-gray-600">Every Rotaractor finds their path through one of our avenues of service.</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">
      @foreach($avenues as $avenue)
      <a href="{{ route('avenues.show', $avenue->slug) }}" class="group relative flex flex-col items-center rounded-2xl border border-gray-100 bg-white p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-0.5 bg-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
        <div class="flex h-20 w-20 items-center justify-center rounded-xl bg-gray-50 group-hover:bg-red-50 transition-colors duration-300">
          <img src="{{ $avenue->logo }}" class="max-h-16 max-w-full object-contain" alt="{{ $avenue->name }}">
        </div>
        <h3 class="mt-4 text-base font-semibold text-gray-800 group-hover:text-red-500 transition-colors">{{ $avenue->name }}</h3>
        <span class="mt-1.5 text-xs font-medium text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">Explore →</span>
      </a>
      @endforeach
    </div>
  </div>
</section>

<div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
  <div class="max-w-2xl mx-auto text-center mb-12">
    <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Testimonials</span>
    <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">What Our Members Say</h2>
    <p class="mt-3 text-gray-600">Hear from our members and partners about their experiences with the Rotaract Club of APIIT.</p>
  </div>

  @if($testimonials->isNotEmpty())
  <div class="testimonial-swiper swiper !pb-12">
    <div class="swiper-wrapper !items-stretch">
      @foreach($testimonials as $testimonial)
      <div class="swiper-slide !h-auto">
        <div class="flex h-full flex-col rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
          <svg class="h-8 w-8 text-red-500/30" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
          </svg>
          <p class="mt-4 flex-1 text-gray-600">{{ $testimonial->content }}</p>
          <div class="mt-6 flex items-center gap-3">
            <img src="{{ Storage::url($testimonial->image) }}" class="h-12 w-12 rounded-full object-cover" alt="{{ $testimonial->name }}">
            <div>
              <p class="font-semibold text-gray-900">{{ $testimonial->name }}</p>
              <p class="text-sm text-gray-500">{{ $testimonial->title }}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="testimonial-prev swiper-button-prev !text-red-500 after:!text-lg"></div>
    <div class="testimonial-next swiper-button-next !text-red-500 after:!text-lg"></div>
  </div>
  @else
  <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
    <p class="text-gray-500">No testimonials yet. Check back soon!</p>
  </div>
  @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (window.Swiper) {
      new Swiper('.testimonial-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: {{ $testimonials->count() > 3 ? 'true' : 'false' }},
        pagination: { el: '.testimonial-swiper .swiper-pagination', clickable: true },
        navigation: { nextEl: '.testimonial-next', prevEl: '.testimonial-prev' },
        autoplay: { delay: 6000, disableOnInteraction: false },
        breakpoints: {
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });
    }
  });
</script>

<section class="bg-gray-900">
  <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto text-center mb-12">
      <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Recognition</span>
      <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Rotaractors of the Month</h2>
      <p class="mt-3 text-gray-300">Celebrating members whose dedication and hard work set an example for all of us.</p>
    </div>

    <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4">
        @foreach($members as $member)
        <div class="group">
            <div class="relative overflow-hidden rounded-2xl">
                <img class="aspect-square w-full object-cover transition duration-500 group-hover:scale-108" src="{{$member->image ? asset('storage/' . $member->image): asset('/images/CR7.png')}}" alt="{{ $member->name }}">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <h3 class="mt-3 text-base font-semibold text-white capitalize leading-tight">{{ $member->name }}</h3>
            <span class="inline-block mt-1 text-xs font-semibold uppercase tracking-wider text-red-400">{{ $member->category }}</span>
        </div>
        @endforeach
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
        src="\storage\gallery\new5.JPG"
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
