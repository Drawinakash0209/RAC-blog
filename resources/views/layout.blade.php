<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Rotaract Club of APIIT')</title>
    <meta name="description" content="Join the Rotaract Club of APIIT and be part of a dynamic community dedicated to making a difference. We focus on leadership, community service, and professional development, guided by Rotary International and the Rotary Club of Colombo East. Explore our projects, events, and how you can get involved.">
<meta name="keywords" content="Rotaract Club, APIIT, community service, leadership, professional development, Rotary International, Rotary Club of Colombo East, youth empowerment, social impact, volunteering">


    @yield('meta')
    @yield('structured-data')
   
    
    <link rel="icon" href="{{ asset('../storage/gallery/RotaractLOGO.png') }}"  sizes="128x128" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    width: 100%;
    position: relative;
    display: flex;
    justify-content: flex-start; /* Changed from center to flex-start */
    align-items: center;
    padding-left: 20px; /* Added padding to give some space from the left */
}

.image-container-overlay {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 10;
}

.hero-heading {
    font-size: 50px;
    color: white;
    position: relative;
    z-index: 20;
    text-align: left; /* Added to left-align the text */
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

.image-container h1 {
  letter-spacing: 4px;
  left: 40;
  font-size: 8rem;
  text-transform: uppercase;
  font-family: "Bebas Neue", sans-serif;
    
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

#main-container {
            margin: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #image-track-container {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            /* margin-top: 40px; */
            width: 100%;
            height: 100%;
            position: relative;
        }

        #image-track {
            display: flex;
            gap: 4vmin;
            position: absolute;
            transform: translate(10%, -50%);
            user-select: none;
        }

        #image-track > .image {
            width: 40vmin;
            height: 56vmin;
            object-fit: cover;
            object-position: 100% center;
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
 
    .image-container h1 {
        font-size: 5rem;
    }
    .image-container {
        padding-left: 10px;
    }
    #text {
        font-size: 50px;
        bottom: 50px;
    }
    .hero-section {
        height: auto; /* Allow the section to expand vertically */  
        min-height: 50vh; /* Ensure it's at least full viewport height */
    }

    .hero-section img {
  
       max-width: 100%; 
      max-height: 100vh;
    }


  
    /* .hero-section img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none; 
        } */
}

@media (max-width: 480px) {
    .image-container h1 {
        font-size: 3.5rem;
    }
    .image-container {
        padding-left: 5px;
    }
    .hero-section {
        height: auto; /* Allow the section to expand vertically */  
        min-height: 60vh; /* Ensure it's at least full viewport height */
    }

    #text {
        font-size: 50px;
       
    }
   =

   
    .hero-section img {
  
       max-width: 100%; 
      max-height: 100vh;
    }
}







      


     
    </style>  
</head>
<body>



<header class='shadow-md bg-white font-[sans-serif] tracking-wide relative z-50'>
  <section
    class='flex items-center flex-wrap lg:justify-center gap-4 py-3 sm:px-10 px-4 border-gray-200 border-b min-h-[75px]'>

   

    <a href="javascript:void(0)" class="shrink-0">
      <img src="../storage/gallery/RAC navbar logo.png" alt="logo" class="md:w-[400px] w-64" />
    </a>
    
    

  </section>

  <div class='flex flex-wrap justify-center px-10 py-3 relative'>

    <div id="collapseMenu"
      class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0 max-lg:before:z-50'>
      <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
          <path
            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
            data-original="#000000"></path>
          <path
            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
            data-original="#000000"></path>
        </svg>
      </button>

      <ul
        class='lg:flex lg:gap-x-10 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
        <li class='max-lg:border-b max-lg:pb-4 px-3 lg:hidden'>

          <a href="javascript:void(0)">
            <img src="../storage/gallery/RAC Lockup full colour.png" alt="logo" style="width: 500px;" />
          </a>
          
        </li>
        <li class='max-lg:border-b max-lg:px-3 max-lg:py-3'><a href='/home'
            class='hover:text-[#007bff] text-gray-600 font-semibold block text-[15px] block'>Home</a></li>




            
        <li class='max-lg:border-b max-lg:px-3 max-lg:py-3'><a href='{{ route('post.blog') }}'
          class='hover:text-[#007bff] text-gray-600 font-semibold text-[15px] block'>Blog</a></li>



        <li class='group max-lg:border-b max-lg:px-3 max-lg:py-3 relative'>
          <a href='javascript:void(0)'
            class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>Committee<svg
              xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
              viewBox="0 0 24 24">
              <path
                d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                data-name="16" data-original="#000000" />
            </svg>
          </a>
          <ul
            class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>
            <li class='border-b py-3'>
              <a href='{{route('exco.exco')}}'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                 Executive Committee
              </a>
            </li>
            <li class='border-b py-3'>
              <a href='{{route('directors.directors')}}'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                Board Of Directors
              </a>
            </li>
          </ul>
        </li>

       <li class='group max-lg:border-b max-lg:px-3 max-lg:py-3 relative'>
          <a href=''
            class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>About<svg
              xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
              viewBox="0 0 24 24">
              <path
                d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                data-name="16" data-original="#000000" />
            </svg>
          </a>
          <ul
            class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>
            <li class='border-b py-3'>
              <a href='{{route('about')}}'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                Who We Are
              </a>
            </li>


            <li class='border-b py-3'>
              <a href='{{route('rda.awards')}}'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                Awards
              </a>
            </li>

            <li class='border-b py-3'>
              <a href='{{route('annual-reports.reports')}}'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                Annual Reports
              </a>
            </li>
          </ul>
        </li>



            <li class='group max-lg:border-b max-lg:px-3 max-lg:py-3 relative'>
              <a href='javascript:void(0)'
                class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>Avenues<svg
                  xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
                  viewBox="0 0 24 24">
                  <path
                    d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                    data-name="16" data-original="#000000" />
                </svg>
              </a>

              <ul
                class='absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[250px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>


                @php
                $avenues = App\Models\Avenue::all();
                @endphp


                @foreach($avenues as $avenue)
                <li class='border-b py-3'>
                  <a href='{{ route('avenues.show', $avenue->id) }}'
                    class='hover:text-[#007bff] hover:fill-[#007bff] text-gray-600 font-semibold text-[15px] block'>
                    {{ $avenue->name }}
                  </a>
                </li>
                @endforeach
  
                </ul>
            </li>



            <li class='max-lg:border-b max-lg:px-3 max-lg:py-3'><a href='{{route('formalities')}}'
              class='hover:text-[#007bff] text-gray-600 font-semibold text-[15px] block'>Formalities</a></li>


      


        <li class='max-lg:border-b max-lg:px-3 max-lg:py-3'><a href='{{route('sdg-Goals')}}'
            class='hover:text-[#007bff] text-gray-600 font-semibold text-[15px] block'>Goals</a></li>


           


      </ul>
    </div>

    <div id="toggleOpen" class='flex ml-auto lg:hidden'>
      <button>
        <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
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