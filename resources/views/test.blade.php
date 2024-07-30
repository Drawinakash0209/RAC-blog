<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RAC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    

    <style>
      * {
    font-family: "Quicksand", sans-serif;
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
            z-index: 1000;

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

        .hero-section img#man{
            transform-origin: bottom;
        }

        #text{
            position: relative;
            color: #fff;
            font-size: 120px;
            bottom: 80px;
            font-family: "Bebas Neue", sans-serif;
        }
        
       




        h2{
          text-transform: uppercase;
        }

     
    </style>  
</head>

<body>


    <section class="hero-section">
        <img src="storage\about\6.png" id="bg">
        <h1 id="text">RAC APIIT</h1>
       
        
        <img src="storage\about\clouds_2.png" id="clouds_2">
        <img src="storage\about\mountain_left.png" id="mountain_left">
        <img src="storage\about\mountain_right.png" id="mountain_right">
        <img src="storage\about\clouds_1.png" id="clouds_1">
        <img src="storage\about\man.png" id="man">
      </section>

      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam alias porro eos amet sed incidunt quam voluptatibus doloribus possimus soluta perspiciatis, impedit inventore, commodi temporibus voluptates quaerat? Maxime, voluptatum dolorum?</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam alias porro eos amet sed incidunt quam voluptatibus doloribus possimus soluta perspiciatis, impedit inventore, commodi temporibus voluptates quaerat? Maxime, voluptatum dolorum?</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam alias porro eos amet sed incidunt quam voluptatibus doloribus possimus soluta perspiciatis, impedit inventore, commodi temporibus voluptates quaerat? Maxime, voluptatum dolorum?</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam alias porro eos amet sed incidunt quam voluptatibus doloribus possimus soluta perspiciatis, impedit inventore, commodi temporibus voluptates quaerat? Maxime, voluptatum dolorum?</p>












    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script>

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
