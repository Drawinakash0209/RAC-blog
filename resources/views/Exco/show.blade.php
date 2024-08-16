
@extends('layout')

@section('content')

<divx class="w-full overflow-hidden dark:bg-gray-900">
    <div class="w-full mx-auto">
        
        <!-- User Cover IMAGE -->
        <img src="https://images.unsplash.com/photo-1560697529-7236591c0066?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMHx8Y292ZXJ8ZW58MHwwfHx8MTcxMDQ4MTEwNnww&ixlib=rb-4.0.3&q=80&w=1080" alt="User Cover"
                class="w-full xl:h-[20rem] lg:h-[22rem] md:h-[16rem] sm:h-[13rem] xs:h-[9.5rem]" />

        <!-- User Profile Image -->
        <div class="w-full mx-auto flex justify-center">
            <img src={{$excoMember->image ? asset('storage/' . $excoMember ->image): asset('/images/CR7.png')}} alt="User Profile"
                    class="rounded-full object-cover xl:w-[16rem] xl:h-[16rem] lg:w-[16rem] lg:h-[16rem] md:w-[12rem] md:h-[12rem] sm:w-[10rem] sm:h-[10rem] xs:w-[8rem] xs:h-[8rem] outline outline-2 outline-offset-2 outline-yellow-500 shadow-xl relative xl:bottom-[7rem] lg:bottom-[8rem] md:bottom-[6rem] sm:bottom-[5rem] xs:bottom-[4.3rem]" />
        </div>

        <div
            class="xl:w-[80%] lg:w-[90%] md:w-[94%] sm:w-[96%] xs:w-[92%] mx-auto flex flex-col gap-4 justify-center items-center relative xl:-top-[6rem] lg:-top-[6rem] md:-top-[4rem] sm:-top-[3rem] xs:-top-[2.2rem]">
            <!-- FullName -->
            <h1 class="text-center text-gray-800 text-4xl">{{ $excoMember->name }}</h1>
            <!-- About -->
            <p class="w-full text-gray-700 dark:text-gray-400 text-md text-pretty sm:text-center xs:text-justify">
                {{ $excoMember->about }}
            </p>

            <!-- Social Links -->
            <div
                class="px-2 flex rounded-sm  text-gray-500  dark:text-gray-700 hover:text-gray-600 hover:dark:text-gray-400">

    
                <div id="social" class="flex flex-wrap justify-start items-center gap-4">
                    <a rel="noopener" target="_blank" href="https://github.com/iam-aydin" class="bg-gray-800 rounded-lg p-5 w-64 flex items-center gap-2 text-white">
                        <img class="mr-2 hover:scale-105 transition duration-300 ease-in-out" src="https://ucarecdn.com/1f465c47-4849-4935-91f4-29135d8607af/github2.svg" width="20px" height="20px" alt="Github" />
                        <span>Visit my Github</span>
                    </a>
                    <a rel="noopener" target="_blank" href="https://www.linkedin.com/in/aydin-vesali-moghaddam-82a860275/" class="bg-gray-800 rounded-lg p-5 w-64 flex items-center gap-2 text-white">
                        <img class="mr-2 hover:scale-105 transition duration-300 ease-in-out" src="https://ucarecdn.com/95eebb9c-85cf-4d12-942f-3c40d7044dc6/linkedin.svg" width="20px" height="20px" alt="LinkedIn" />
                        <span>Follow me on Linkedin</span>
                    </a>
                    <a rel="noopener" target="_blank" href="https://twitter.com/ichbinaydin" class="bg-gray-800 rounded-lg p-5 w-64 flex items-center gap-2 text-white">
                        <img class="mr-2 hover:scale-105 transition duration-300 ease-in-out" src="https://ucarecdn.com/82d7ca0a-c380-44c4-ba24-658723e2ab07/" width="20px" height="20px" alt="Twitter" />
                        <span>Follow me on Twitter</span>
                    </a>
                </div>
  
            </div>

  
        </div>
    </div>
</div>



@endsection