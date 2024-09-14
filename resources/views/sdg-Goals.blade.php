{{-- 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 62.5%;
}

body {
  width: 100vw;
  min-height: 100vh;
  background-color: #f0f0f0;
  font-family: 'Poppins', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.container .box {
  position: relative;
  width: 30rem;
  height: 30rem;
  margin: 4rem;
}

.container .box:hover .imgBox {
  transform: translate(-3.5rem, -3.5rem);
}

.container .box:hover .content {
  transform: translate(3.5rem, 3.5rem);
}

.imgBox {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  transition: all 0.5s ease-in-out;
}

.imgBox img {
  width: 30rem;
  height: 30rem;
  object-fit: cover;
  resize: both;
}

.content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 1.5rem;
  display: flex;
  justify-content: center;
  background-color: #fff;
  z-index: 1;
  align-items: flex-end;
  text-align: center;
  transition: 0.5s ease-in-out;
}

.content h2 {
  display: block;
  font-size: 2rem;
  color: #111;
  font-weight: 500;
  line-height: 2rem;
  letter-spacing: 1px;
}

.content span {
  color: #555;
  font-size: 1.4rem;
  font-weight: 300;
  letter-spacing: 2px;
}

@media (max-width: 600px) {
  .container .box:hover .content {
    transform: translate(0, 3.5rem);
  }
  .container .box:hover .imgBox {
    transform: translate(0, -3.5rem);
  }
}
/*# sourceMappingURL=main.css.map */    

        </style>

    
</head>
<body>


    <div class="container">
        <div class="box">
            <div class="imgBox">
                <img src="https://img.freepik.com/free-photo/portrait-handsome-young-man-makes-okay-gesture-demonstrates-agreement-likes-idea-smiles-happily-wears-optical-glasses-yellow-hat-t-shirt-models-indoor-its-fine-thank-you-hand-sign_273609-30676.jpg?size=626&ext=jpg" alt="">
            </div>
            <div class="content">
                <h2>Karan Singh</br>
                <span>Graphic Designer</span></h2>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="https://image.freepik.com/free-photo/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair_285396-896.jpg" alt="">
            </div>
            <div class="content">
                <h2>Dolly Seth</br>
                <span>Digital Marketing</span></h2>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="https://image.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg" alt="">
            </div>
            <div class="content">
                <h2>Aakash Agrawal</br>
                <span>Chartered Accountant C.A</span></h2>
            </div>
        </div>
    </div> --}}

    @extends('layout')

    @section('content')



    <!-- Events section -->
    <section class="text-gray-700 body-font mt-10">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight  sm:text-4xl">
          Rotaract and the SDGs
        </h2>
        <p class="mt-2 text-lg leading-8">
          Explore and learn more about each of the 17 Sustainable Development Goals that are crucial for building a better future for everyone.
        </p>
      </div>
      
    
      <div class="container px-5 py-12 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
    
          <!-- No Poverty -->
          <div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('\storage\SDG icons\E-WEB-Goal-01.png'); background-size: cover;">
            <div class="z-10 absolute w-full h-full peer"></div>
            <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-20 w-32 h-44 rounded-full bg-[#F36C5A] transition-all duration-500"></div>
            <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-52 -right-16 w-10 h-44 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#F36C5A]">
              End poverty in all its forms everywhere
            </div>
            <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
           
            </div>
          </div>
    
          <!-- Zero Hunger -->
          <div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-02.png'); background-size: cover;">
            <div class="z-10 absolute w-full h-full peer"></div>
            <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#F0C751] transition-all duration-500"></div>
            <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-52 -right-16 w-10 h-44 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#F0C751]">
              End hunger, achieve food security and improved nutrition
            </div>
            <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
             
            </div>
          </div>

          <!-- Good Health and Well-being -->
          <div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-03.png'); background-size: cover;">
            <div class="z-10 absolute w-full h-full peer"></div>
            <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#72B74B] transition-all duration-500"></div>
            <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#72B74B]">
              Ensure healthy lives and promote well-being for all at all ages
            </div>
            <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
             
            </div>
          </div>



          <!-- Quality Education -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-04.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#E2575D] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#E2575D]">
    Ensure inclusive and equitable quality education
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>

<!-- Gender Equality -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-05.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#FF6F4F] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 -bottom-32 -right-16 w-36 h-44 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#FF6F4F]">
    Achieve gender equality and empower all women and girls
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
  
  </div>
</div>

<!-- Clean Water and Sanitation -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-06.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#5AB8E4] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#5AB8E4]">
    Ensure availability and sustainable management of water and sanitation
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
  
  </div>
</div>



<!-- Affordable and Clean Energy -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-07.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#FEE58F] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full  -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#FEE58F]">
    Ensure access to affordable, reliable, sustainable, and modern energy
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>

<!-- Decent Work and Economic Growth -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-08.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#D16D77] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full  -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#D16D77]">
    Promote sustained, inclusive, and sustainable economic growth
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>

<!-- Industry, Innovation, and Infrastructure -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-09.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#FCA27D] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full  -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#FCA27D]">
    Build resilient infrastructure, promote inclusive and sustainable industrialization
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
   
  </div>
</div>

<!-- Reduced Inequality -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-10.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#E77B9B] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full - -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#E77B9B]">
    Reduce inequality within and among countries
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
 
  </div>
</div>

<!-- Sustainable Cities and Communities -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-11.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#FEC97D] transition-all duration-500"></div> 
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full  -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#FEC97D]">
    Make cities and human settlements inclusive, safe, resilient, and sustainable
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>


<!-- Responsible Consumption and Production -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-12.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#D4A94F] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#D4A94F]">
    Ensure sustainable consumption and production patterns
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>

<!-- Climate Action -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-13.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#6B9B69] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#6B9B69]">
    Take urgent action to combat climate change
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
    
  </div>
</div>

<!-- Life Below Water -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-14.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#4AB4E0] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#4AB4E0]">
    Conserve and sustainably use the oceans, seas, and marine resources
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
  
  </div>
</div>

<!-- Life on Land -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-15.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#7BD87E] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#7BD87E]">
    Protect, restore, and promote sustainable use of terrestrial ecosystems
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
 
  </div>
</div>

<!-- Peace, Justice, and Strong Institutions -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-16.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#3384B7] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#3384B7]">
    Promote peaceful and inclusive societies
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
  
  </div>
</div>

<!-- Partnerships for the Goals -->
<div class="relative overflow-hidden w-82 h-96 rounded-3xl cursor-pointer text-2xl font-bold bg-purple-400 bg-cover bg-center" style="background-image: url('/storage/SDG icons/E-WEB-Goal-17.png'); background-size: cover;">
  <div class="z-10 absolute w-full h-full peer"></div>
  <div class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-[#3577A0] transition-all duration-500"></div>
  <div class="absolute flex text-xl text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-60 -right-16 w-2 h-20 rounded-full bg-purple-300 transition-all duration-500 peer-hover:bg-[#3577A0]">
    Strengthen the means of implementation and revitalize the Global Partnership
  </div>
  <div class="w-full h-full items-center justify-center flex uppercase transition-opacity duration-500 opacity-0 peer-hover:opacity-100">
 
  </div>
</div>








    
        </div>
      </div>
    </section>
    
    
 

 
    
    
    
    


   
 
 
    

  
    
@endsection
