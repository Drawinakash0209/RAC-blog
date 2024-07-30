@extends('layout')

@section('content')



{{-- Hero banner for avenue show  --}}
<section class="relative bg-gradient-to-br from-blue-900 to-indigo-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');"></div>
    
    <div class="container mx-auto px-4 py-24 md:py-32 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <!-- Left Side: Company Info -->
            <div class="w-full md:w-1/2 mb-12 md:mb-0">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Innovate.<br>Transform.<br>Succeed.
                </h1>
                <p class="text-xl mb-8 text-gray-300">Empowering businesses with cutting-edge solutions for a digital future.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" class="bg-white text-blue-900 font-semibold px-8 py-3 rounded-full hover:bg-blue-100 transition duration-300 text-center">Get Started</a>
                    <a href="#" class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full hover:bg-white hover:text-blue-900 transition duration-300 text-center">Learn More</a>
                </div>
            </div>
            
            <!-- Right Side: Features -->
            <div class="w-full md:w-1/2 md:pl-12">
                <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl">
                    <h2 class="text-2xl font-semibold mb-6">Why MyCompany?</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            <span>Lightning-fast Performance</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <span>Bank-grade Security</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                            <span>AI-powered Insights</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Decorative Element -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>




{{-- About the avenue --}}

<div class="px-4 sm:px-10 mt-28">
    <div class="max-w-7xl w-full mx-auto grid md:grid-cols-2 justify-center items-center gap-10">
      <div>
        <h2 class="md:text-4xl text-3xl font-semibold mb-6">What This Avenue is About</h2>
        <p>TThe Rotaract Club of APIIT was founded on September 15, 2010, with the goal of providing a platform for students and young professionals to engage in meaningful service projects and develop leadership skills. Over the years, our club has grown in membership and impact, consistently striving to address the needs of our community.</p>
              <h3>Major Milestones and Achievements </h3>

              <p> <b>2012</b> Launched the "Green Earth Initiative," a project aimed at promoting environmental sustainability through tree planting and recycling drives.<br>
                  <b>2015</b> Organized the first "Health for All" campaign, providing free medical check-ups and health education to underprivileged communities.<br>
                  <b>2016</b> Won the Rotaract District Award for Outstanding Community Service Project for our "Youth Empowerment Program," which offers vocational training to young adults.</p>

       
      </div>
      <div class="w-full h-full">
        <img src="https://readymadeui.com/login-image.webp" alt="feature" class="w-full h-full object-cover" />
      </div>
    </div>
  </div> 


  <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
      <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Key Projects</h2>
      <p class="mt-1 text-gray-600 dark:text-neutral-400">Our dedicated directors are the driving force behind our impactful projects and initiatives. They bring a wealth of experience, passion, and commitment to their roles, ensuring that our avenues of service create meaningful change in the community.

      </p>
    </div>
    <!-- End Title -->
  
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 lg:mb-14">
      <!-- Card -->
      <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
        <div class="aspect-w-16 aspect-h-9">
          <img class="w-full object-cover rounded-t-xl" src="https://images.unsplash.com/photo-1668869713519-9bcbb0da7171?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="p-4 md:p-5">
          <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
            Product
          </p>
          <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
            Better is when everything works together
          </h3>
        </div>
      </a>
      <!-- End Card -->
  
      <!-- Card -->
      <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
        <div class="aspect-w-16 aspect-h-9">
          <img class="w-full object-cover rounded-t-xl" src="https://images.unsplash.com/photo-1668584054035-f5ba7d426401?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="p-4 md:p-5">
          <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
            Business
          </p>
          <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
            What CFR really is about
          </h3>
        </div>
      </a>
      <!-- End Card -->
  
      <!-- Card -->
      <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
        <div class="aspect-w-16 aspect-h-9">
          <img class="w-full object-cover rounded-t-xl" src="https://images.unsplash.com/photo-1668863699009-1e3b4118675d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="p-4 md:p-5">
          <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
            Business
          </p>
          <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
            Should Product Owners think like entrepreneurs?
          </h3>
        </div>
      </a>
      <!-- End Card -->
  
      <!-- Card -->
      <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="#">
        <div class="aspect-w-16 aspect-h-9">
          <img class="w-full object-cover rounded-t-xl" src="https://images.unsplash.com/photo-1668584054131-d5721c515211?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="p-4 md:p-5">
          <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
            Facilitate
          </p>
          <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
            Announcing Front Strategies: Ready-to-use rules
          </h3>
        </div>
      </a>
      <!-- End Card -->
    </div>
    <!-- End Grid -->
  
  
  </div>
  <!-- End Card Blog -->






  


  
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
      <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Meet Our Directors</h2>
    </div>
    <!-- End Title -->
  
    @if($avenue->directors->count() < 3)
      <div class="flex justify-center gap-8 md:gap-12">
    @else
      <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12">
    @endif
        @foreach($avenue->directors as $director)
        <div class="text-center">
          <img class="rounded-xl sm:w-48 lg:w-60 mx-auto" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
            <div class="mt-2 sm:mt-4">
              <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-neutral-200">
                {{ $director->name }}
              </h3>
              <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-neutral-400">
                {{ $director->role ?? 'Director' }}
              </p>
            </div>
        </div>
        @endforeach
      </div>
  </div>
  
  

@endsection