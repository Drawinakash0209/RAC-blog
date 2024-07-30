@extends('layout')

@section('content')
<section class="mb-40 overflow-hidden">
    <!-- hero section -->



    {{-- <div class="relative w-full h-[320px]" id="home">
        <div class="absolute inset-0 opacity-70">
            <img src="https://image1.jdomni.in/banner/13062021/0A/52/CC/1AF5FC422867D96E06C4B7BD69_1623557926542.png"
                alt="Background Image" class="object-cover object-center w-full h-full" />
        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-grey-700 font-medium text-4xl md:text-5xl leading-tight mb-2">We are</h1>
                <p class="font-regular text-xl mb-8 mt-4">Rotaract Club of APIIT</p>
            </div>
        </div>
    </div> --}}

    <div class="image-container">
        <div class="image-container-overlay"> </div>
        <img src="https://plus.unsplash.com/premium_photo-1661715812379-23d652805042?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sustainable Development Goals">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sustainable Development Goals">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1784&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sustainable Development Goals">
    
        <div class=" sm:text-6xl xs:text-5xl text-left text-white font-serif font-extrabold uppercase z-30">
        <h1>Service </h1>
        <h1>above self,</h1>
        <h1>impact </h1>
        <h1>beyond measure</h1>
        </div> 
    </div>

    {{-- <section class="hero-section">
      <img src="storage\hero2\6.png" id="bg">
      <h1 id="text">RAC APIIT</h1>
      <img src="storage\hero2\man.png" id="man">
      <img src="storage\hero2\clouds_1.png" id="clouds_1">
      <img src="storage\hero2\clouds_2.png" id="clouds_2">
      <img src="storage\hero2\mountain_left.png" id="mountain_left">
      <img src="storage\hero2\mountain_right.png" id="mountain_right">
    </section> --}}




    <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center" >Our Projects</h2>
        <p class="text-gray-600 text-center mb-12">Explore our impactful projects designed to make a difference in our community and beyond. From community service initiatives to professional development programs, our projects embody our commitment to positive change and sustainable impact.</p>

    <!-- Grid -->
    <div class="grid lg:grid-cols-2 gap-6">


      @foreach($projects as $project)
      <!-- Card -->
      <a class="group relative block rounded-xl" href="#">
        <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
          <img class="size-full absolute top-0 start-0 object-cover" src="https://images.unsplash.com/photo-1669828230990-9b8583a877ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1062&q=80" alt="Image Description">
        </div>
  
        <div class="absolute top-0 inset-x-0 z-10">
          <div class="p-4 flex flex-col h-full sm:p-6">
            <!-- Avatar -->
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="size-[46px] border-2 border-white rounded-full" src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
              </div>
              <div class="ms-2.5 sm:ms-4">
                <h4 class="font-semibold text-white">
                  Gloria
                </h4>
                <p class="text-xs text-white/80">
                  Jan 09, 2021
                </p>
              </div>
            </div>
            <!-- End Avatar -->
          </div>
        </div>
  
        <div class="absolute bottom-0 inset-x-0 z-10">
          <div class="flex flex-col h-full p-4 sm:p-6">
            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80">
              Facebook is creating a news section in Watch to feature breaking news
            </h3>
            <p class="mt-2 text-white/80">
              Facebook launched the Watch platform in August
            </p>
          </div>
        </div>
      </a>
      <!-- End Card -->
      @endforeach
  
   




    
    </div>
    <!-- End Grid -->
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
                    <img src="{{$new->image ? asset('storage/' . $new->image): asset('/images/CR7.png')}}" alt="News" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300"><time
                            datetime="2023-10-11" class="mr-8">  {{ $new->created_at->format('d-m-Y') }}</time>
                        <div class="-ml-4 flex items-center gap-x-4"><svg viewBox="0 0 2 2"
                                class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                <circle cx="1" cy="1" r="1"></circle>
                            </svg>
                            {{-- <div class="flex gap-x-2.5">
                                <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">John
                            </div> --}}
                        </div>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                        <a href="/tech-blog/post1"><span class="absolute inset-0"></span>{{$new->title}}</a>
                    </h3>
                </article>
                @endforeach

                @else
                <div class="text-center">No news</div>
                @endunless

            </div>
        </div>
    
    </div>































<!--Events section-->

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Upcoming Events</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">

        <div class="relative h-64 w-full flex items-end justify-start text-left bg-cover bg-center"
            style="background-image:url(https://media.gettyimages.com/photos/at-the-the-network-tolo-televised-debate-dr-abdullah-abdullah-with-picture-id1179614034?k=6&amp;m=1179614034&amp;s=612x612&amp;w=0&amp;h=WwIX3RMsOQEn5DovD9J3e859CZTdxbHHD3HRyrgU3A8=);">
            <div class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
            </div>
            <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
                <a href="#"
                    class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">Politics</a>
                <div class="text-white font-regular flex flex-col justify-start">
                    <span class="text-3xl leading-0 font-semibold">25</span>
                    <span class="-mt-3">May</span>
                </div>
            </div>
            <main class="p-5 z-10">
                <a href="#"
                    class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">Dr.
                    Abdullah Abdullah's Presidential Election Campaign
                </a>
            </main>

        </div>

        <div class="relative h-64 w-full flex items-end justify-start text-left bg-cover bg-center"
            style="background-image:url(https://media.gettyimages.com/photos/ashraf-ghani-afghanistans-president-speaks-at-the-council-on-foreign-picture-id850794338?k=6&amp;m=850794338&amp;s=612x612&amp;w=0&amp;h=b_XBw5S38Cioslqr6VL3e36cWQU205IsInqDXZpDOD4=);">
            <div class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
            </div>
            <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
                <a href="#"
                    class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">Politics</a>
                <div class="text-white font-regular flex flex-col justify-start">
                    <span class="text-3xl leading-0 font-semibold">10</span>
                    <span class="-mt-3">Mar</span>
                </div>
            </div>
            <main class="p-5 z-10">
                <a href="#"
                    class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">Afghanistan's
                    President Ashraf Ghani Speaks At The Council
                </a>
            </main>

        </div>

        <div class="relative h-64 w-full flex items-end justify-start text-left bg-cover bg-center"
            style="background-image:url(https://media.gettyimages.com/photos/afghan-president-ashraf-ghani-arrives-to-the-welcoming-ceremony-the-picture-id694155252?k=6&amp;m=694155252&amp;s=612x612&amp;w=0&amp;h=IIJPetzJL-hAgPkE4hm2wUKvO4YOav8jJp484CgLEUs=);">
            <div class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
            </div>
            <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
                <a href="#"
                    class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">Politics</a>
                <div class="text-white font-regular flex flex-col justify-start">
                    <span class="text-3xl leading-0 font-semibold">20</span>
                    <span class="-mt-3">Jan</span>
                </div>
            </div>
            <main class="p-5 z-10">
                <a href="#"
                    class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">Middle
                    East Participants Gather In Warsaw
                </a>
            </main>

        </div>

    </div>
</div>


<section class="pt-40 pb-40 relative" >
    <div class="absolute w-full h-full top-0 left-0 bg-cover bg-center bg-no-repeat  bg-fixed" style="background-image:url(/storage/bgi/RAC-parallax.webp)"></div>
    <h1 class=" text-white  display-2  relative text-center font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl" style="font-size: 6rem; letter-spacing: 4px; font-family: 'Bebas Neue', sans-serif;" >
        <span class="text-red-500" style="font-size: 6rem; letter-spacing: 4px; font-family: 'Bebas Neue', sans-serif;">SERVING</span> : BEYOND : <span class="text-red-500" style="font-family: 'Bebas Neue', sans-serif;"> BOUNDARIES</span>
      </h1>
  </section>

    <!-- about us -->
<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">About Us</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    Bappa flour mill provides our customers with the highest quality products and services. We offer a
                    wide variety of flours and spices to choose from, and we are always happy to help our customers find
                    the perfect products for their needs.
                    We are committed to providing our customers with the best possible experience. We offer competitive
                    prices, fast shipping, and excellent customer service. We are also happy to answer any questions
                    that our customers may have about our products or services.
                    If you are looking for a flour and spices service business that can provide you with the highest
                    quality products and services, then we are the company for you. We look forward to serving you!</p>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="https://images.unsplash.com/photo-1531973576160-7125cd663d86" alt="About Us Image" class="object-cover rounded-lg shadow-md">
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
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+1000</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Number of Collaborations</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+20</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Active Members</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+100</dd>
              </div>
              <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Volunteer Hours Contributed</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">+10 000</dd>
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


<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Gallery of Our Impactful Moments</h2>
      <p class="text-gray-600 text-center mb-12">Check out our photo gallery to see the vibrant moments and events that define our Rotaract club’s journey.</p>
      <div id="main-container">
        <div id="image-track-container">
            <div id="image-track" data-mouse-down-at="0" data-prev-percentage="0">
                <img class="image" src="https://images.unsplash.com/photo-1524781289445-ddf8f5695861?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1610194352361-4c81a6a8967e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1618202133208-2907bebba9e1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1495805442109-bf1cf975750b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1548021682-1720ed403a5b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1496753480864-3e588e0269b3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2134&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1613346945084-35cccc812dd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1759&q=80" draggable="false" />
                <img class="image" src="https://images.unsplash.com/photo-1516681100942-77d8e7f9dd97?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" draggable="false" />
            </div>
        </div>
      </div>
      
      
      
      
</div>



















</section>
@endsection
