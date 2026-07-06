@extends('layout')

@section('title', 'About | Rotaract Club of APIIT')

@section('content')
<div class="max-w-[1920px] mx-auto text-black text-sm mb-20">
  <div class="bg-white">

    {{-- Hero banner --}}
    <div class="relative overflow-hidden">
      <img src="/storage/gallery/IMG_8707.PNG" alt="Banner Image" class="absolute inset-0 h-full w-full object-cover" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>

      <div class="relative z-10 flex min-h-[380px] flex-col items-center justify-center px-6 py-24 text-center">
        <span class="text-sm font-semibold uppercase tracking-wider text-red-500">About Us</span>
        <h1 class="mt-2 text-3xl font-bold text-white sm:text-5xl">Who We Are</h1>
        <p class="mt-4 max-w-xl text-base text-white/80 sm:text-lg">
          When hands unite and hearts align, even the smallest act becomes a legacy.
        </p>
      </div>
    </div>

    <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid items-center gap-10 md:grid-cols-2">
        <div class="order-2 md:order-1">
          <img src="/storage/gallery/group1.jpg" alt="Rotaract Club of APIIT members" class="h-72 w-full rounded-2xl object-cover shadow-xl sm:h-96" />
        </div>
        <div class="order-1 md:order-2">
          <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our Story</span>
          <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">About the Rotaract Club of APIIT</h2>
          <div class="mt-4 space-y-4 text-base leading-relaxed text-gray-600">
            <p>Welcome to the Rotaract Club of APIIT!</p>
            <p><strong>Chartered in 2019</strong>, the Rotaract Club of APIIT, part of Rotaract in <strong>RID 3220</strong>, is a vibrant community of passionate students dedicated to making a positive difference in the world. From our humble beginnings with a modest membership, we have grown into a thriving club with <strong>100+ Rotaractors</strong>.</p>
            <p>Now, in our <strong>6th successful year</strong>, the club continues to grow stronger under the leadership of <strong>Rtr. Shagaan Thevarajah</strong>, driven by our goal of <strong>serving beyond boundaries</strong>.</p>
          </div>

          <h3 class="mt-8 text-2xl font-semibold text-gray-800">Overview</h3>
          <p class="mt-3 text-base leading-relaxed text-gray-600">The Rotaract Club of APIIT is an institute-based club located at the Asia Pacific Institute of Information Technology. We are a dynamic and diverse organization committed to fostering leadership, service, and community engagement among young adults. Operating within Rotaract in <strong>RID 3220</strong>, we work under the guidance of <strong>Rotary International</strong> and our sponsoring Rotary Club, the <strong>Rotary Club of Colombo East</strong>, to drive impactful projects and initiatives.</p>
        </div>
      </div>
    </div>

    <div class="bg-gray-50">
      <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 md:grid-cols-2">
          <div>
            <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our History</span>
            <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">Founding Date and Brief History</h2>
            <div class="mt-4 space-y-4 text-base leading-relaxed text-gray-600">
              <p><strong>Incepted in 2019</strong>, the Rotaract Club of APIIT was chartered through the pioneering vision and efforts of our inaugural president, <strong>Rtr. PP. Vinura Weerakoon</strong>, and the dedicated support of our Club Patron, <strong>Mr. Vihanga Jayasinghe</strong>. Despite starting with a modest membership base of just <strong>18 members</strong>, the club has rapidly evolved over the past six years into a vibrant, youth-led organization with nearly <strong>100 committed members</strong>.</p>
              <p>In the early years, <strong>RAC APIIT</strong> encountered numerous challenges, particularly during the COVID-19 pandemic, and faced financial constraints as a self-funded club. However, our determination never faltered. Thanks to the relentless efforts of the <strong>5 past Presidents</strong> and their teams, RAC APIIT has not only survived but thrived, achieving consistent growth and reaching new heights.</p>
              <p>During the <strong>RI years 2023/24</strong>, under the transformative leadership of <strong>Rtr. IPP. Janani Mathiyalagan</strong>, RAC APIIT experienced unprecedented growth. This era was marked by the introduction of several signature projects, including <strong>&lsquo;Baila Friday&rsquo;</strong>, <strong>&lsquo;Frosts of Love&rsquo;</strong>, and <strong>&lsquo;Thaiththirunaal&rsquo;</strong>, all of which have gained significant attention and acclaim. For the first time, we also received prestigious awards and accolades at the <strong>34th Rotaract District Assembly</strong> and expanded our influence on a global scale, further solidifying our reputation.</p>
              <p>As we continue to climb the ladder of excellence, we remain steadfast in our commitment to the core values of Rotaract: <strong>service, leadership, and fellowship</strong>. Over the years, <strong>RAC APIIT</strong> has become a beacon of unity, resilience, and the indomitable spirit of our members. As we embark on our 6th year, we are driven by the mission to <strong>serve beyond boundaries</strong>, always remembering that <strong>today&rsquo;s youth is tomorrow&rsquo;s future</strong>.</p>
            </div>
          </div>
          <div>
            <img src="/storage/gallery/coverimage.jpg" alt="Club history" class="h-72 w-full rounded-2xl object-cover shadow-xl sm:h-96" />
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid items-center gap-10 md:grid-cols-2">
        <div class="order-2 md:order-1">
          <img src="/storage/gallery/img9.jpg" alt="RI Year 2025/26 theme" class="h-72 w-full rounded-2xl object-cover shadow-xl sm:h-96" />
        </div>
        <div class="order-1 md:order-2">
          <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our Theme</span>
          <h2 class="mt-2 text-3xl font-bold text-gray-800 sm:text-4xl">Theme for the RI Year 2025/26</h2>
          <div class="mt-4 space-y-4 text-base leading-relaxed text-gray-600">
            <p>Now, in our <strong>7th impactful year</strong>, under the visionary leadership of <strong>Rtr. Gayathri Manoharan</strong>, the Rotaract Club of APIIT steps into a new chapter guided by the theme <strong>&ldquo;Inspire Service, Empower Change&rdquo;</strong>.</p>
            <p>This theme reflects the core of our club&rsquo;s mission to ignite the spirit of service in others and to create real, lasting change through empathy, leadership, and collective action. At RACAPIIT, we believe inspiration is the first step toward transformation, and change is most powerful when it uplifts not just individuals, but entire communities.</p>
            <p>Through this vision, we aim to empower our members to take bold initiatives, challenge conventional thinking, and serve with intention and compassion. Whether through community outreach, personal development, or global collaborations, our members are encouraged to lead with purpose and create meaningful impact in every step they take.</p>
            <p>With the mission of <strong>Inspire Service, Empower Change</strong>, the Rotaract Club of APIIT is committed to building a generation of changemakers&mdash;individuals who serve not just to act, but to inspire; not to lead, but to uplift.</p>
          </div>
        </div>
      </div>
    </div>

    {{-- Objectives --}}
    <div class="bg-gray-900">
      <div class="max-w-[85rem] mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-12">
          <span class="text-sm font-semibold uppercase tracking-wider text-red-500">Our Objectives</span>
          <h2 class="mt-2 text-3xl font-bold text-white sm:text-4xl">Driving Positive Change through Service and Leadership</h2>
        </div>

        <ul class="grid grid-cols-1 gap-6 md:grid-cols-3">
          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=36042&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Foster Leadership Development</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">
              Provide members with opportunities to develop their leadership skills through workshops, seminars, and practical experiences. Encourage members to take on leadership roles within the club and in their professional lives.
            </p>
          </li>

          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=123496&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Encourage Professional Development</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">
              Offer programs and activities that enhance members' professional skills, including career counseling, mentorship programs, and networking events. Partner with industry professionals to provide insights and opportunities for career advancement.
            </p>
          </li>

          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=3734&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Promote Community Service</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">
              Engage in a variety of community service projects aimed at improving the quality of life for local residents. Focus on initiatives that address critical issues such as education, health, and environmental sustainability.
            </p>
          </li>

          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=6d5w9P1KecHv&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Build International Understanding</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">Participate in global Rotaract initiatives and foster international friendships. Promote cultural exchange and understanding through collaborative projects and events with Rotaract clubs from other countries.</p>
          </li>

          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=62135&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Enhance Fellowship and Networking</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">Create a supportive and engaging environment where members can build lasting friendships and professional connections. Organize social events, team-building activities, and networking sessions to strengthen the bond among members.</p>
          </li>

          <li class="rounded-2xl bg-white/5 p-8 text-center transition duration-300 hover:-translate-y-1 hover:bg-white/10">
            <img src="https://img.icons8.com/?size=100&id=4EIla3zm33eT&format=png&color=ef4444" alt="" class="mx-auto h-10 w-10">
            <h3 class="mt-4 font-semibold text-white">Empower Youth</h3>
            <p class="mt-2 text-sm leading-6 text-gray-400">Develop programs that empower young people to become active and responsible citizens. Provide training, resources, and opportunities for youth to engage in community service and leadership activities.</p>
          </li>
        </ul>
      </div>
    </div>

  </div>
</div>
@endsection
