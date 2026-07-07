@extends('layout')

@section('title', 'About | Rotaract Club of APIIT')
@section('meta-description', 'Learn about the Rotaract Club of APIIT — our story, history, mission, and the objectives driving our community impact.')

@section('content')

{{-- ════════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="ab-hero" aria-label="About us hero">
    <img
        class="ab-hero__img"
        src="/storage/gallery/IMG_8707.PNG"
        alt="Rotaract Club of APIIT"
        onload="this.classList.add('loaded')"
    />
    <div class="ab-hero__overlay"></div>

    <div class="ab-hero__content">
        <span class="ab-hero__eyebrow">About Us</span>
        <h1 class="ab-hero__title">Who We Are</h1>
        <p class="ab-hero__sub">"When hands unite and hearts align, even the smallest act becomes a legacy."</p>
    </div>
</section>

{{-- ════════════════════════════════════════════
     OUR STORY
════════════════════════════════════════════ --}}
<section class="ab-section ab-section--white">
    <div class="ab-inner">
        <div class="ab-two-col ab-two-col--reverse">

            <div>
                <span class="ab-text__eyebrow">Our Story</span>
                <h2 class="ab-text__heading">About the Rotaract Club of APIIT</h2>
                <div class="ab-text__body">
                    <p>Welcome to the Rotaract Club of APIIT!</p>
                    <p><strong>Chartered in 2019</strong>, the Rotaract Club of APIIT, part of Rotaract in <strong>RID 3220</strong>, is a vibrant community of passionate students dedicated to making a positive difference in the world. From humble beginnings with a modest membership, we have grown into a thriving club with <strong>100+ Rotaractors</strong>.</p>
                    <p>Now, in our <strong>7th successful year</strong>, the club continues to grow stronger under the leadership of <strong>Rtr. Gayathri Manoharan</strong>, driven by our goal of <strong>Inspire Service, Empower Change</strong>.</p>
                </div>

                <h3 class="ab-text__sub-heading">Overview</h3>
                <p class="ab-text__body">The Rotaract Club of APIIT is an institute-based club at the Asia Pacific Institute of Information Technology — a dynamic organization committed to fostering leadership, service, and community engagement. Operating within Rotaract in <strong>RID 3220</strong>, we work under the guidance of <strong>Rotary International</strong> and our sponsoring Rotary Club, the <strong>Rotary Club of Colombo East</strong>.</p>
            </div>

            <div class="ab-img-wrap">
                <img class="ab-img" src="/storage/gallery/group1.jpg" alt="Rotaract Club of APIIT members" loading="lazy" />
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     HISTORY
════════════════════════════════════════════ --}}
<section class="ab-section ab-section--gray">
    <div class="ab-inner">
        <div class="ab-two-col">

            <div>
                <span class="ab-text__eyebrow">Our History</span>
                <h2 class="ab-text__heading">Founding Date &amp; Brief History</h2>
                <div class="ab-text__body">
                    <p><strong>Incepted in 2019</strong>, the Rotaract Club of APIIT was chartered through the pioneering vision of our inaugural president, <strong>Rtr. PP. Vinura Weerakoon</strong>, and the dedicated support of our Club Patron, <strong>Mr. Vihanga Jayasinghe</strong>. Despite starting with just <strong>18 members</strong>, the club has rapidly evolved into a vibrant youth-led organization with nearly <strong>100 committed members</strong>.</p>
                    <p>In the early years, <strong>RAC APIIT</strong> faced numerous challenges — particularly during the COVID-19 pandemic — yet our determination never faltered. Thanks to the relentless efforts of our <strong>5 past Presidents</strong>, RAC APIIT has not only survived but thrived.</p>
                    <p>During the <strong>RI years 2023/24</strong>, under the transformative leadership of <strong>Rtr. IPP. Janani Mathiyalagan</strong>, RAC APIIT experienced unprecedented growth — introducing signature projects such as <strong>'Baila Friday'</strong>, <strong>'Frosts of Love'</strong>, and <strong>'Thaiththirunaal'</strong>, receiving prestigious awards at the <strong>34th Rotaract District Assembly</strong>, and expanding influence on a global scale.</p>
                    <p>As we continue to climb the ladder of excellence, we remain committed to the core values of Rotaract: <strong>service, leadership, and fellowship</strong>.</p>
                </div>
            </div>

            <div class="ab-img-wrap ab-img-wrap--offset">
                <img class="ab-img" src="/storage/gallery/coverimage.jpg" alt="Club history" loading="lazy" />
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     THEME / RI YEAR
════════════════════════════════════════════ --}}
<section class="ab-section ab-section--white">
    <div class="ab-inner">
        <div class="ab-two-col ab-two-col--reverse">

            <div>
                <span class="ab-text__eyebrow">Our Theme</span>
                <h2 class="ab-text__heading">Theme for the RI Year 2025/26</h2>
                <div class="ab-text__body">
                    <p>Now, in our <strong>7th impactful year</strong>, under the visionary leadership of <strong>Rtr. Gayathri Manoharan</strong>, the Rotaract Club of APIIT steps into a new chapter guided by the theme <strong>"Inspire Service, Empower Change"</strong>.</p>
                    <p>This theme reflects the core of our mission — to ignite the spirit of service and create real, lasting change through empathy, leadership, and collective action. At RACAPIIT, we believe inspiration is the first step toward transformation, and change is most powerful when it uplifts entire communities.</p>
                    <p>Through this vision, we empower our members to take bold initiatives, challenge conventional thinking, and serve with intention and compassion — leading with purpose and creating meaningful impact in every step they take.</p>
                </div>
            </div>

            <div class="ab-img-wrap">
                <img class="ab-img" src="/storage/gallery/img9.jpg" alt="RI Year 2025/26 theme" loading="lazy" />
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     MISSION BANNER
════════════════════════════════════════════ --}}
<div class="ab-banner" aria-hidden="true">
    <p class="ab-banner__label">Our Mission</p>
    <h2 class="ab-banner__title">
        <em>INSPIRE SERVICE</em>
        <span> : EMPOWER CHANGE</span>
    </h2>
</div>

{{-- ════════════════════════════════════════════
     OBJECTIVES
════════════════════════════════════════════ --}}
<section class="ab-objectives" aria-labelledby="ab-obj-heading">

    <div class="ab-section-header">
        <span class="ab-section-header__eyebrow">Our Objectives</span>
        <h2 id="ab-obj-heading" class="ab-section-header__heading">Driving Positive Change through Service and Leadership</h2>
    </div>

    <div class="ab-obj-grid">

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=36042&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Foster Leadership Development</h3>
            <p class="ab-obj-card__body">Provide members with opportunities to develop leadership skills through workshops, seminars, and practical experiences. Encourage members to take on leadership roles within the club and in their professional lives.</p>
        </div>

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=123496&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Encourage Professional Development</h3>
            <p class="ab-obj-card__body">Offer programs that enhance members' professional skills, including career counseling, mentorship programs, and networking events. Partner with industry professionals to provide career advancement opportunities.</p>
        </div>

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=3734&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Promote Community Service</h3>
            <p class="ab-obj-card__body">Engage in community service projects aimed at improving quality of life for local residents. Focus on education, health, and environmental sustainability initiatives that create lasting impact.</p>
        </div>

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=6d5w9P1KecHv&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Build International Understanding</h3>
            <p class="ab-obj-card__body">Participate in global Rotaract initiatives and foster international friendships. Promote cultural exchange and understanding through collaborative projects with Rotaract clubs from other countries.</p>
        </div>

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=62135&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Enhance Fellowship &amp; Networking</h3>
            <p class="ab-obj-card__body">Create a supportive environment where members can build lasting friendships and professional connections. Organize social events, team-building activities, and networking sessions to strengthen bonds.</p>
        </div>

        <div class="ab-obj-card">
            <img class="ab-obj-card__icon" src="https://img.icons8.com/?size=100&id=4EIla3zm33eT&format=png&color=ef4444" alt="" aria-hidden="true">
            <h3 class="ab-obj-card__title">Empower Youth</h3>
            <p class="ab-obj-card__body">Develop programs that empower young people to become active and responsible citizens. Provide training, resources, and opportunities for youth to engage in community service and leadership activities.</p>
        </div>

    </div>

</section>

@endsection
