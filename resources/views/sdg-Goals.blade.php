<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        :root{
            --pr-color: #da3417;
            --second-color: #efe8e8;
            --cubicbz: cubic-bezier(.9,0,.1,1);
            --index: 35px;
            --fz-big:70px;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-feature-settings: 'pnum' on, 'lnum' on;
        }

        body{
            position: relative;
        }

        body::before{
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            /* background: url('storage/hero/bg.jpg'); */
            background-position: center;
            background-size: cover;
            filter: blur(30px);
            transform: scale(2);
            z-index: 1;
        }

        .wrapp{
            position: relative;
            z-index: 2;
        }

        .color{
            color:var(--second-color);
        }

        .fixed-top{
            position: fixed;
            widows: 100%;
            padding: var(--index);
            top: 0;
            left: 0;
            z-index: 3;
        }

        .title{
            height: auto;
            margin: 0;
            text-align: right;
            font-size: var(--fz-sm);
            line-height: 1;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--pr-color);
        }

        .fixed-footer{
            position: fixed;
            width: 100%;
            height: auto;
            padding: var(--index);
            bottom: 0;
            left: 0;
            pointer-events: none;
            z-index: 3;
        }

        .fixed-footer_wrapp{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: auto;
        }

        .fixed-footer_txt{
            position: relative;
            padding-left: 60px;
            color: var(--second-color);
            font-size: var(--fz-sm);
            text-transform: uppercase;
        }

        .fixed-footer_txt:nth-child(2){
            margin-left: auto;
            color: var(--pr-color);
            text-align: right;
            line-height: .7;
            font-size: 50px;
            
        }

        .fixed-footer_img{
            position: absolute;
            top: 50%;
            left: 0;
            width: 50px;
            height: 50px;
            transform: translateY(-50%);
        }

        .fixed-footer_img img{
            display: block;
            width: 100%;
            height: 100%;
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate{
            from{
                transform: rotate(0);
            }
            to{
                transform: rotate(-360deg);
            }
        }

        .animation-title{
            position: fixed;
            height: auto;
            margin: 0;
            padding-top: var(--index);
            padding-left: var(--index);
            top: 0;
            left: 0;
            font-size: var(--fz-big);
            line-height: 1;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--pr-color);
            z-index: 1;
            
        }

        .footer{
            height: 30vh;
            background: #baa0a01a;
            backdrop-filter: blur(10px);
        }



        /* Stacking cards
         */

        .section-card{
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: var(--index);
            padding-bottom: 80px;
            padding-top: 250px;
            z-index: 2;
            
        }

        .cards{
            width: 70%;
            margin: 0 auto;
            padding: 0 50px;
        }

        .cards_item{
            width: 100%;
            perspective: 500px;
            margin-bottom: 50px;
          
        }
        .cards_item:last-child{
            margin-bottom: 0;
        }

        .cards_el{
            width: 100%;
            height: 400px;
        }

        .cards_el-wrapp{
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            gap: 40px;
            padding: 45px;
            border-radius: 20px;
            background: #baa0a01a;
            backdrop-filter: blur(10px);
            will-change: blur;


        }

        .cards_img{
            width: 40%;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
        }

        .cards_img img{
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cards_txt{
           width: calc(60% - 40px);
        }

        .cards_el-title{
            font-size: 35px;
            color: var(--pr-color);
            margin-bottom: 20px;
            text-transform: uppercase;

        }

        .cards_el-p{
            font-size: 20px;
            color: var(--second-color);
        
        }


        .end-anim{
            height: 1px;
            margin-top: 50px;
        }



      
    </style>
</head>
<body>

       {{-- <div class="" id="home">
        <div class="absolute inset-0 opacity-70">
            <img src="https://image1.jdomni.in/banner/13062021/0A/52/CC/1AF5FC422867D96E06C4B7BD69_1623557926542.png"
                alt="Background Image" class="object-cover object-center " />
        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-grey-700 font-medium text-4xl md:text-5xl leading-tight mb-2">We are</h1>
                <p class="font-regular text-xl mb-8 mt-4">Rotaract Club of APIIT</p>
            </div>
        </div>
    </div> --}}



    {{-- <section>
        <img src="storage\hero\bg.jpg" id="bg">
        <h1 id="text">SDG Goals</h1>
        <img src="storage\hero\man.png" id="man">
        <img src="storage\hero\clouds_1.png" id="clouds_1">
        <img src="storage\hero\clouds_2.png" id="clouds_2">
        <img src="storage\hero\mountain_left.png" id="mountain_left">
        <img src="storage\hero\mountain_right.png" id="mountain_right">
       


    </section>

    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, laborum illo alias magnam quidem deserunt eaque doloribus animi enim nulla beatae? Ut officia odit iure nisi eligendi excepturi vero accusamus?</p> --}}
    

<div class="wrapp">

    {{-- <div class="fixed-top">
        <h2 class="title"> Made by <br> <span class="color"> ApproveCode </span> </h2>
    </div> --}}

    {{-- <div class="fixed-footer">
        <div class="fixed-footer_wrapp">
            <div class="fixed-footer_txt">
                <div class="fixed-footer_img"><img src="storage\hero\bg.jpg"> </div>full code <br> in 
                description
            </div>
            <div class="fixed-footer_txt">a<span class="color">v</span></div>
        </div>
    </div> --}}

    <h2 class="animation-title"><span class="color" >Stacking cards</span> Animations </h2>

    <section class="section-card">
        <div class="cards">

            
          


            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/PeacBuildingLogoWhiteBckgrnd.png?v=1676184674&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Peacebuilding and Conflict Prevention</h3>
                            <p class="cards_el-p">Rotary works to prevent conflicts by training leaders in communities around the world to mediate disputes and help create peaceful societies. They support initiatives related to peace-building, mediation, and training to resolve conflicts.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/DiseasePreventionWhiteBckgrnd.png?v=1676184871" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Disease Prevention and Treatment</h3>
                            <p class="cards_el-p">Rotary focuses on improving and expanding access to low-cost and free healthcare in underserved areas. They lead efforts to prevent and treat diseases like polio, malaria, and HIV/AIDS through vaccination programs, community health education, and improving medical facilities.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/WaterSanitationWhiteBckgrnd.png?v=1676185061&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Water, Sanitation, and Hygiene</h3>
                            <p class="cards_el-p">This focus area aims to provide people with access to clean water and adequate sanitation to improve health and prevent the spread of waterborne diseases. Rotary supports projects that build wells, provide clean water, and promote hygiene practices.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/Maternal_ChildHealthLogoWhiteBckgrnd.png?v=1676183856&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Maternal and Child Health</h3>
                            <p class="cards_el-p">Rotary strives to reduce maternal and infant mortality rates by providing access to quality health care for mothers and their children. They support efforts to improve maternal health through education, proper nutrition, and medical services.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/BasicEducation_LiteracyWhiteBckgrnd.png?v=1678263139&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Basic Education and Literacy</h3>
                            <p class="cards_el-p">Rotary supports education for all children and literacy for children and adults. They promote projects that improve educational opportunities, provide teacher training, and support the creation of educational materials and infrastructure.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/EnvironmentWhiteBckgrnd.png?v=1676185488&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Environment</h3>
                            <p class="cards_el-p">Rotary supports local economies to alleviate poverty. They provide microloans, vocational training, and other financial services to entrepreneurs and small business owners to foster economic development and create opportunities for sustainable growth.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards_item">
                <div class="cards_el">
                    <div class="cards_el-wrapp">
                        <div class="cards_img">
                            <img src="https://www.rockypointrotary.org/cdn/shop/products/EconomicDevelopmentWhiteBckgrnd.png?v=1676185647&width=823" alt="">
                        </div>
                        <div class="cards_txt">
                            <h3 class="cards_el-title">Community Economic Development</h3>
                            <p class="cards_el-p">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati perferendis ullam magnam cumque cupiditate expedita a impedit, eligendi suscipit cum amet quia, nisi maiores laboriosam est exercitationem earum atque ad.</p>
                        </div>
                    </div>
                </div>
            </div>

      


        </div>

        <div class="end-anim"></div>



    </section>

    <footer class="footer"></footer>













</div>



{{-- 
 <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script> --}}
<script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', function(){
        'use strict';

        gsap.registerPlugin(ScrollTrigger);

        // Lenis
        const lenis = new Lenis();
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);

        // Animation for cards
        const cardsWrapper = gsap.utils.toArray('.cards_item');
        const cardsEl = gsap.utils.toArray('.cards_el');

        cardsWrapper.forEach((e, i) => {
            const card = cardsEl[i];
            let scale = 1,
                rotate = 0;

            if (i !== cardsEl.length - 1) {
                scale = 0.9 + 0.025 * i;
                rotate = -10;
            }

            gsap.to(card, {
                scale: scale,
                rotationX: rotate,
                transformOrigin: "top center",
                ease: 'none',
                scrollTrigger: {
                    trigger: e,
                    start: "top " + (70 + 40 * i),
                    end: "bottom +=650px",
                    endTrigger: ".end-anim",
                    pin: e,
                    pinSpacing: false,
                    scrub: true,
                }
            });
        });
    });

    // Background and elements animations
    gsap.to("#bg", {
        scrollTrigger: {
            scrub: 1
        },
        scale: 1.5
    });

    gsap.to("#man", {
        scrollTrigger: {
            scrub: 1
        },
        scale: 0.5
    });

    gsap.to("#mountain_left", {
        scrollTrigger: {
            scrub: 1
        },
        x: -500,
    });

    gsap.to("#mountain_right", {
        scrollTrigger: {
            scrub: 1
        },
        x: 500,
    });

    gsap.to("#clouds_1", {
        scrollTrigger: {
            scrub: 1
        },
        x: 200,
    });

    gsap.to("#clouds_2", {
        scrollTrigger: {
            scrub: 1
        },
        x: -200,
    });

    gsap.to("#text", {
        scrollTrigger: {
            scrub: 1
        },
        y: 500,
    });
</script>
</body>
</html>