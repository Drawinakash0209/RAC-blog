<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
      (function () {
        var stored = localStorage.getItem('theme');
        var dark = stored ? stored === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (dark) document.documentElement.classList.add('dark');
      })();
    </script>
    <title>@yield('title', 'Rotaract Club of APIIT')</title>
    <meta name="description" content="Join the Rotaract Club of APIIT and be part of a dynamic community dedicated to making a difference. We focus on leadership, community service, and professional development, guided by Rotary International and the Rotary Club of Colombo East. Explore our projects, events, and how you can get involved.">
<meta name="keywords" content="Rotaract Club, APIIT, community service, leadership, professional development, Rotary International, Rotary Club of Colombo East, youth empowerment, social impact, volunteering">


    @yield('meta')
    @yield('structured-data')
    @stack('styles')
   
    
    <link rel="icon" href="{{ asset('../storage/gallery/RotaractLOGO.png') }}"  sizes="128x128" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.css" rel="stylesheet" />
   
    <style>
      * {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


.hero-section{
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        
        .hero-section::before{
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: linear-gradient(to top, #fff, transparent);
            z-index: 40;

        }

        .hero-section img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none; 
        }

        /* .hero-section img#man{
            transform-origin: bottom;
        } */
        .hero-section img#man {
          transform-origin: bottom;
          }


        #text{
            position: relative;
            color: #fff;
            font-size: 120px;
            bottom: 100px;
            font-family: "Bebas Neue", sans-serif;
            text-align: center; /* Center the text horizontally */
        }
        
     
       




.image-container {
    height: 100vh;
    min-height: 500px;
    width: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 0 0 2.5rem 2.5rem;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
}

@keyframes fade {
    0% {
        opacity: 1;
    }
    33% {
        opacity: 0;
    }
    67% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.image-container img {
    width: 100%;
    height: 100%;
    position: absolute;
    object-fit: cover;
    top: 0;
    left: 0;
    animation: fade 9s ease-in-out infinite alternate;
}

.image-container img:nth-of-type(1) {
    animation-delay: 0s;
}

.image-container img:nth-of-type(2) {
    animation-delay: 3s;
}

.image-container img:nth-of-type(3) {
    animation-delay: 6s;
}

        h2{
          text-transform: uppercase;
        }


/* Responsive Adjustments */
@media (max-width: 1200px) {
    .image-container h1 {
        font-size: 6rem;
    }
    #text {
        font-size: 100px;
    }


}

@media (max-width: 768px) {
    .image-container {
        height: 100svh;
        min-height: 480px;
        border-radius: 0 0 1.75rem 1.75rem;
    }
}

/* ── Nav links ─────────────────────────────── */
.nav-link {
    position: relative;
    color: #4b5563;
    transition: color .2s ease;
}
.nav-link:hover,
.nav-link:focus {
    color: #d41367;
    fill: #d41367;
}
:root.dark .nav-link {
    color: #d1d5db;
}
:root.dark .nav-link:hover,
:root.dark .nav-link:focus {
    color: #f486b5;
    fill: #f486b5;
}
@media (min-width: 1024px) {
    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: -6px;
        height: 2px;
        background: #d41367;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .25s ease;
    }
    .nav-link:hover::after {
        transform: scaleX(1);
    }
    :root.dark .nav-link::after {
        background: #f486b5;
    }
}
.dropdown-link {
    display: block;
    padding: .65rem 1.25rem;
    font-size: 14px;
    font-weight: 600;
    color: #4b5563;
    border-radius: .5rem;
    transition: background-color .2s ease, color .2s ease;
}
.dropdown-link:hover {
    background-color: #f3f4f6;
    color: #d41367;
}
:root.dark .dropdown-link {
    color: #d1d5db;
}
:root.dark .dropdown-link:hover {
    background-color: #374151;
    color: #f486b5;
}







      


     
    </style>  
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors">



@php
    $siteLogoPath = \App\Models\SiteContent::getValue('site_logo');
    $siteLogoUrl = $siteLogoPath ? Storage::url($siteLogoPath) : asset('storage/gallery/RAC navbar logo.png');
@endphp
<header class='bg-white dark:bg-gray-900 font-[sans-serif] tracking-wide sticky top-0 z-50 shadow-sm border-b border-gray-100 dark:border-gray-800 transition-colors'>
  <div class="flex items-center flex-wrap gap-4 sm:px-8 px-4 py-2">

    <a href="/" class="shrink-0 flex items-center">
  <img src="{{ $siteLogoUrl }}"
       alt="logo"
       class="h-10 md:h-12 w-auto" />
    </a>

  <div class='flex items-center ml-auto gap-4'>

    <div id="collapseMenu"
      class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0 max-lg:before:z-50'>
      <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white dark:bg-gray-800 p-3 shadow-md'>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black dark:fill-white" viewBox="0 0 320.591 320.591">
          <path
            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
            data-original="#000000"></path>
          <path
            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
            data-original="#000000"></path>
        </svg>
      </button>

      <ul
        class='lg:flex lg:items-center lg:gap-x-8 max-lg:space-y-1 max-lg:fixed max-lg:bg-white dark:max-lg:bg-gray-900 max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-2xl max-lg:overflow-auto z-50'>
        <li class='max-lg:border-b max-lg:pb-4 max-lg:mb-2 px-1 lg:hidden'>

          <a href="javascript:void(0)">
            <img src="{{ $siteLogoUrl }}" alt="logo" class="w-28 h-auto" />
          </a>

        </li>
        <li class='max-lg:py-1'><a href='/home'
            class='nav-link block text-[15px] font-semibold'>Home</a></li>





        <li class='max-lg:py-1'><a href='{{ route('post.blog') }}'
          class='nav-link block text-[15px] font-semibold'>Blog</a></li>

        <li class='max-lg:py-1'><a href='{{ route('projects.projects') }}'
          class='nav-link block text-[15px] font-semibold'>Projects</a></li>

        <li class='group max-lg:py-1 relative'>
          <a href='javascript:void(0)'
            class='nav-link flex items-center gap-1 text-[15px] font-semibold'>Committee<svg
              xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" class="inline-block transition-transform duration-300 group-hover:rotate-180"
              viewBox="0 0 24 24">
              <path
                d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                data-name="16" data-original="#000000" />
            </svg>
          </a>
          <ul
            class='absolute top-6 max-lg:top-8 left-0 z-50 block shadow-xl bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 max-h-0 overflow-hidden min-w-[240px] group-hover:opacity-100 group-hover:max-h-[700px] p-0 group-hover:p-2 transition-all duration-500'>
            <li>
              <a href='{{route('exco.exco')}}' class='dropdown-link'>
                 Executive Committee
              </a>
            </li>
            <li>
              <a href='{{route('directors.directors')}}' class='dropdown-link'>
                Board Of Directors
              </a>
            </li>
          </ul>
        </li>

       <li class='group max-lg:py-1 relative'>
          <a href=''
            class='nav-link flex items-center gap-1 text-[15px] font-semibold'>About<svg
              xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" class="inline-block transition-transform duration-300 group-hover:rotate-180"
              viewBox="0 0 24 24">
              <path
                d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                data-name="16" data-original="#000000" />
            </svg>
          </a>
          <ul
            class='absolute top-6 max-lg:top-8 left-0 z-50 block shadow-xl bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 max-h-0 overflow-hidden min-w-[240px] group-hover:opacity-100 group-hover:max-h-[700px] p-0 group-hover:p-2 transition-all duration-500'>
            <li>
              <a href='{{route('about')}}' class='dropdown-link'>
                Who We Are
              </a>
            </li>


            <li>
              <a href='{{route('rda.awards')}}' class='dropdown-link'>
                Awards
              </a>
            </li>

            <li>
              <a href='{{route('annual-reports.reports')}}' class='dropdown-link'>
                Annual Reports
              </a>
            </li>
          </ul>
        </li>



            <li class='group max-lg:py-1 relative'>
              <a href='javascript:void(0)'
                class='nav-link flex items-center gap-1 text-[15px] font-semibold'>Avenues<svg
                  xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" class="inline-block transition-transform duration-300 group-hover:rotate-180"
                  viewBox="0 0 24 24">
                  <path
                    d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                    data-name="16" data-original="#000000" />
                </svg>
              </a>

              <ul
                class='absolute top-6 max-lg:top-8 left-0 z-50 block shadow-xl bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 max-h-0 overflow-hidden min-w-[240px] group-hover:opacity-100 group-hover:max-h-[700px] p-0 group-hover:p-2 transition-all duration-500'>


                @php
                $avenues = App\Models\Avenue::all();
                @endphp


                @foreach($avenues as $avenue)
                <li>
                  <a href='{{ route('avenues.show', $avenue->slug) }}' class='dropdown-link'>
                    {{ $avenue->name }}
                  </a>
                </li>
                @endforeach

                </ul>
            </li>



            <li class='max-lg:py-1'><a href='{{route('formalities')}}'
              class='nav-link block text-[15px] font-semibold'>Formalities</a></li>





        <li class='max-lg:py-1'><a href='{{route('sdg-Goals')}}'
            class='nav-link block text-[15px] font-semibold'>Goals</a></li>





      </ul>
    </div>

    <div id="toggleOpen" class='flex lg:hidden'>
      <button class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
        <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>

    <button id="theme-toggle" type="button" aria-label="Toggle dark mode"
      class="flex items-center justify-center w-9 h-9 rounded-full text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
      <svg id="theme-toggle-sun" class="w-5 h-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1.5m0 15V21m9-9h-1.5M4.5 12H3m15.36 6.36l-1.06-1.06M6.7 6.7 5.64 5.64m12.72 0-1.06 1.06M6.7 17.3l-1.06 1.06M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
      </svg>
      <svg id="theme-toggle-moon" class="w-5 h-5 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
      </svg>
    </button>
  </div>
  </div>
</header>


    <main>
      
        @yield('content')
    
    </main>


    
    <!-- Rotaract Club of APIIT Footer with Black Background -->
{{-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"> --}}

<footer class="relative bg-black pt-8 pb-6">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap text-left lg:text-left">
      <div class="w-full lg:w-6/12 px-4">
        <img src="../storage/gallery/RAC Lockup full colour.png" alt="Rotaract Club of APIIT logo" class="md:w-[400px] w-64" />
        <h5 class="text-lg mt-0 mb-2 text-gray-400">
          Join hands with the Rotaract Club of APIIT and become part of a global community committed to service, leadership, and growth.
        </h5>
        <a href="https://www.tiktok.com/@apiit_rotaract" target="_blank">
          <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-tiktok"></i>
          </button>
        </a>
        <a href="https://web.facebook.com/APIITRotaract/?_rdc=1&_rdr" target="_blank">
          <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-facebook-square"></i>
          </button>
        </a>
        <a href="https://www.instagram.com/apiit_rotaract/" target="_blank">
          <button class="bg-white shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-instagram"></i>
          </button>
        </a>
        <a href="https://www.linkedin.com/company/apiit-rotaract/?originalSubdomain=lk" target="_blank">
          <button class="bg-white shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
            <i class="fab fa-linkedin"></i>
          </button>
        </a>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span class="block uppercase text-gray-400 text-sm font-semibold mb-2">Quick Links</span>
            <ul class="list-unstyled">

              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="/home">Home</a>
              </li>
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="{{route('about')}}">About Us</a>
              </li>
            
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="{{ route('post.blog') }}">Blog</a>
              </li>
            
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="{{route('formalities')}}">Formalities</a>
              </li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span class="block uppercase text-gray-400 text-sm font-semibold mb-2">Legal</span>
            <ul class="list-unstyled">
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="#privacy-policy">Privacy Policy</a>
              </li>
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="#terms-conditions">Terms &amp; Conditions</a>
              </li>
              <li>
                <a class="text-gray-300 hover:text-white font-semibold block pb-2 text-sm" href="#faq">FAQ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-600">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
        <div class="text-sm text-gray-400 font-semibold py-1">
          © <span id="get-current-year"></span> Rotaract Club of APIIT. All rights reserved.
        </div>
      </div>
    </div>
  </div>
</footer>



<script>
  document.getElementById("get-current-year").textContent = new Date().getFullYear();
</script>


    

      <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
      
      
<script>

var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

var themeToggle = document.getElementById('theme-toggle');
themeToggle.addEventListener('click', function () {
  var isDark = document.documentElement.classList.toggle('dark');
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
});















          gsap.to("#bg", {
              scrollTrigger : {
                 scrub : 1
              },
      
              scale : 1.5
          });
      
          gsap.to("#man", {
              scrollTrigger : {
                 scrub : 1.5
              },
      
              scale : 0.5
          });
      
          gsap.to("#mountain_left", {
              scrollTrigger : {
                 scrub : 1
              },
              x : -800,   
          });
      
          gsap.to("#mountain_right", {
              scrollTrigger : {
                 scrub : 1
              },
              x : 800,   
          });
      
          gsap.to("#clouds_1", {
              scrollTrigger : {
                 scrub : 1
              },
              x : 400,   
          });
      
          gsap.to("#clouds_2", {
              scrollTrigger : {
                 scrub : 1
              },
              x : -400,   
          });
      
          gsap.to("#text", {
              scrollTrigger : {
                 scrub : 1
              },
              y : 400,   
          });
      
      </script>
</body>
</html>