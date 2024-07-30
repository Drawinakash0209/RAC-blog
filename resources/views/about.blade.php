
@extends('layout')

@section('content')
<div class="max-w-[1920px] mx-auto text-black text-sm mb-20">
  <div class="bg-white">

    <section class="hero-section">
      <img src="storage\about\6.png" id="bg">
      <h1 id="text">ABOUT US</h1>
     
      
      <img src="storage\about\clouds_2.png" id="clouds_2">
      <img src="storage\about\mountain_left.png" id="mountain_left">
      <img src="storage\about\mountain_right.png" id="mountain_right">
      <img src="storage\about\clouds_1.png" id="clouds_1">
      <img src="storage\about\man.png" id="man">
    </section> 



   
    {{-- Hero banner --}}
    {{-- <div class="relative font-sans before:absolute before:w-full before:h-full before:inset-0 before:bg-black before:opacity-50 before:z-10">
        <img src="https://readymadeui.com/cardImg.webp" alt="Banner Image" class="absolute inset-0 w-full h-full object-cover" />
  
        <div class="min-h-[350px] relative z-50 h-full max-w-6xl mx-auto flex flex-col justify-center items-center text-center text-white p-6">
          <h2 class="sm:text-4xl text-2xl font-bold mb-6">Explore the World</h2>
          <p class="sm:text-lg text-base text-center text-gray-200">Embark on unforgettable journeys. Book your dream vacation today!</p>
  
          
        </div>
      </div> --}}





    <div class="px-4 sm:px-10 mt-28">
        <div class="max-w-7xl w-full mx-auto">
          <div class="grid md:grid-cols-2 items-center gap-10">
            <div class="w-full h-full">
              <img src="https://readymadeui.com/team-image.webp" alt="Premium Benefits"
                class="w-full h-full object-cover" />
            </div>
            <div>
              <h2 class="md:text-4xl text-3xl font-semibold mb-6">About the Rotaract Club of APIIT</h2>
              <p>The Rotaract Club of APIIT is a dynamic and vibrant community of young professionals and students dedicated to service, leadership, and professional development. As a part of the global Rotaract network, our club aims to create positive change in our local community and beyond.</p>

            </div>
          </div>
        </div>
      </div>    




   

    <div class="px-4 sm:px-10 mt-28">
      <div class="max-w-7xl w-full mx-auto grid md:grid-cols-2 justify-center items-center gap-10">
        <div>
          <h2 class="md:text-4xl text-3xl font-semibold mb-6">Founding Date and Brief History</h2>
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



    {{-- Objectives --}}

    <div class="bg-gray-200 px-2 py-10">

      <div id="features" class="mx-auto max-w-6xl">
        <p class="text-center text-base font-semibold leading-7 text-primary-500">Features</p>
        <h2 class="text-center font-display text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">
          Writing has never been so easy
        </h2>
        <ul class="mt-16 grid grid-cols-1 gap-6 text-center text-slate-700 md:grid-cols-3">


          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
    
            <img src="https://img.icons8.com/?size=100&id=36042&format=png&color=000000" alt="" class="mx-auto h-10 w-10">
            <h3 class="my-3 font-display font-medium">Foster Leadership Development</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
              Provide members with opportunities to develop their leadership skills through workshops, seminars, and practical experiences. Encourage members to take on leadership roles within the club and in their professional lives.
            </p>
    
          </li>


          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
    
            <img src="https://img.icons8.com/?size=100&id=123496&format=png&color=000000"
                    alt="" class="mx-auto h-10 w-10">
            <h3 class="my-3 font-display font-medium">Encourage Professional Development</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
              Offer programs and activities that enhance members' professional skills, including career counseling, mentorship programs, and networking events. Partner with industry professionals to provide insights and opportunities for career advancement.
            </p>
    
          </li>
          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
            <img src="https://img.icons8.com/?size=100&id=3734&format=png&color=000000" alt="" class="mx-auto h-10 w-10">
            <h3 class="my-3 font-display font-medium"> Promote Community Service</h3>
            <p class="mt-1.5 text-sm leading-6 text-secondary-500">
              Engage in a variety of community service projects aimed at improving the quality of life for local residents. Focus on initiatives that address critical issues such as education, health, and environmental sustainability.
            </p>
    
          </li>
          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
            <a href="/pricing" class="group">
              <img src="https://img.icons8.com/?size=100&id=6d5w9P1KecHv&format=png&color=000000" alt="" class="mx-auto h-10 w-10">
              <h3 class="my-3 font-display font-medium group-hover:text-primary-500"> Build International Understanding</h3>
              <p class="mt-1.5 text-sm leading-6 text-secondary-500">Participate in global Rotaract initiatives and foster international friendships. Promote cultural exchange and understanding through collaborative projects and events with Rotaract clubs from other countries.</p>
            </a>
          </li>
          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
            <a href="/templates" class="group">
              <img src="https://img.icons8.com/?size=100&id=62135&format=png&color=000000" alt="" class="mx-auto h-10 w-10">
              <h3 class="my-3 font-display font-medium group-hover:text-primary-500">
                Enhance Fellowship and Networking
              </h3>
              <p class="mt-1.5 text-sm leading-6 text-secondary-500">Create a supportive and engaging environment where members can build lasting friendships and professional connections. Organize social events, team-building activities, and networking sessions to strengthen the bond among members. </p>
            </a>
          </li>
          <li class="rounded-xl bg-white px-6 py-8 shadow-sm">
            <a href="/download" class="group">
              <img src="https://img.icons8.com/?size=100&id=4EIla3zm33eT&format=png&color=000000" alt="" class="mx-auto h-10 w-10">
              <h3 class="my-3 font-display font-medium group-hover:text-primary-500"> Empower Youth</h3>
              <p class="mt-1.5 text-sm leading-6 text-secondary-500">Develop programs that empower young people to become active and responsible citizens. Provide training, resources, and opportunities for youth to engage in community service and leadership activities.</p>
            </a>
          </li>
        </ul>
      </div>
    
    </div>

    <!-- Contact -->
    <form action="https://fabform.io/f/xxxxx" method="post">
      <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="grid lg:grid-cols-2 grid-cols-1">
            <div class="lg:mb-0 mb-10">
              <div class="group w-full h-full">
                <div class="relative h-full">
                  <img src="https://pagedone.io/asset/uploads/1696488602.png" alt="ContactUs tailwind section" class="w-full h-full lg:rounded-l-2xl rounded-2xl bg-blend-multiply bg-indigo-700" />
                  <h1 class="font-manrope text-white text-4xl font-bold leading-10 absolute top-11 left-11">Contact us</h1>
                  <div class="absolute bottom-0 w-full lg:p-11 p-5">
                    <div class="bg-white rounded-lg p-6 block">
                      <a href="javascript:;" class="flex items-center mb-6">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M22.3092 18.3098C22.0157 18.198 21.8689 18.1421 21.7145 18.1287C21.56 18.1154 21.4058 18.1453 21.0975 18.205L17.8126 18.8416C17.4392 18.9139 17.2525 18.9501 17.0616 18.9206C16.8707 18.891 16.7141 18.8058 16.4008 18.6353C13.8644 17.2551 12.1853 15.6617 11.1192 13.3695C10.9964 13.1055 10.935 12.9735 10.9133 12.8017C10.8917 12.6298 10.9218 12.4684 10.982 12.1456L11.6196 8.72559C11.6759 8.42342 11.7041 8.27233 11.6908 8.12115C11.6775 7.96998 11.6234 7.82612 11.5153 7.5384L10.6314 5.18758C10.37 4.49217 10.2392 4.14447 9.95437 3.94723C9.6695 3.75 9.29804 3.75 8.5551 3.75H5.85778C4.58478 3.75 3.58264 4.8018 3.77336 6.06012C4.24735 9.20085 5.64674 14.8966 9.73544 18.9853C14.0295 23.2794 20.2151 25.1426 23.6187 25.884C24.9335 26.1696 26.0993 25.1448 26.0993 23.7985V21.2824C26.0993 20.5428 26.0993 20.173 25.9034 19.8888C25.7076 19.6046 25.362 19.4729 24.6708 19.2096L22.3092 18.3098Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h5 class="text-black text-base font-normal leading-6 ml-5">470-601-1911</h5>
                      </a>
                      <a href="https://veilmail.io/irish-geoff" class="flex items-center mb-6">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.81501 8.75L10.1985 13.6191C12.8358 15.2015 14.1544 15.9927 15.6032 15.9582C17.0519 15.9237 18.3315 15.0707 20.8905 13.3647L27.185 8.75M12.5 25H17.5C22.214 25 24.5711 25 26.0355 23.5355C27.5 22.0711 27.5 19.714 27.5 15C27.5 10.286 27.5 7.92893 26.0355 6.46447C24.5711 5 22.214 5 17.5 5H12.5C7.78595 5 5.42893 5 3.96447 6.46447C2.5 7.92893 2.5 10.286 2.5 15C2.5 19.714 2.5 22.0711 3.96447 23.5355C5.42893 25 7.78595 25 12.5 25Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <h5 class="text-black text-base font-normal leading-6 ml-5">https://veilmail.io/irish-geoff</h5>
                      </a>
                      <a href="javascript:;" class="flex items-center">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M25 12.9169C25 17.716 21.1939 21.5832 18.2779 24.9828C16.8385 26.6609 16.1188 27.5 15 27.5C13.8812 27.5 13.1615 26.6609 11.7221 24.9828C8.80612 21.5832 5 17.716 5 12.9169C5 10.1542 6.05357 7.5046 7.92893 5.55105C9.8043 3.59749 12.3478 2.5 15 2.5C17.6522 2.5 20.1957 3.59749 22.0711 5.55105C23.9464 7.5046 25 10.1542 25 12.9169Z" stroke="#4F46E5" stroke-width="2" />
                          <path d="M17.5 11.6148C17.5 13.0531 16.3807 14.219 15 14.219C13.6193 14.219 12.5 13.0531 12.5 11.6148C12.5 10.1765 13.6193 9.01058 15 9.01058C16.3807 9.01058 17.5 10.1765 17.5 11.6148Z" stroke="#4F46E5" stroke-width="2" />
                        </svg>
                        <h5 class="text-black text-base font-normal leading-6 ml-5">654 Sycamore Avenue, Meadowville, WA 76543</h5>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 p-5 lg:p-11 lg:rounded-r-2xl rounded-2xl">
              <h2 class="text-indigo-600 font-manrope text-4xl font-semibold leading-10 mb-11">Send Us A Message</h2>
              <input type="text" class="w-full h-12 text-gray-600 placeholder-gray-400  shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10" placeholder="Name">
              <input type="text" class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10" placeholder="Email">
              <input type="text" class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10" placeholder="Phone">
              <div class="mb-10">
                <h4 class="text-gray-500 text-lg font-normal leading-7 mb-4">Preferred method of communication</h4>
                <div class="flex">
                  <div class="flex items-center mr-11">
                    <input id="radio-group-1" type="radio" name="radio-group" class="hidden checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                    <label for="radio-group-1" class="flex items-center cursor-pointer text-gray-500 text-base font-normal leading-6">
                      <span class="border border-gray-300 rounded-full mr-2 w-4 h-4  ml-2 "></span> Email
                    </label>
                  </div>
                  <div class="flex items-center">
                    <input id="radio-group-2" type="radio" name="radio-group" class="hidden checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                    <label for="radio-group-2" class="flex items-center cursor-pointer text-gray-500 text-base font-normal leading-6">
                      <span class="border border-gray-300  rounded-full mr-2 w-4 h-4  ml-2 "></span> Phone
                    </label>
                  </div>
                </div>
              </div>
              <input type="text" class="w-full h-12 text-gray-600 placeholder-gray-400 bg-transparent text-lg shadow-sm font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10" placeholder="Message">
              <button class="w-full h-12 text-white text-base font-semibold leading-6 rounded-full transition-all duration-700 hover:bg-indigo-800 bg-indigo-600 shadow-sm">Send</button>
            </div>
          </div>
        </div>
      </section>
    </form>

@endsection