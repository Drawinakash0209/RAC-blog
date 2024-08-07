@extends('layout')

@section('content')

<div class="w-full h-full bg-white">
    <div class="w-full mx-auto py-10 bg-white">
  

        <!--  -->
        <h1 class="w-[92%] mx-auto lg:text-4xl md:text-3xl xs:text-2xl text-center  font-semibold pb-4 pt-8 text-black">{{$project->name}}</h1>

        <!-- Blog Cover -->
        <img src="{{ Storage::url($project->coverimage) }}" alt="Blog Cover" class="xl:w-[80%] xs:w-[96%] mx-auto rounded-lg" />

        <!-- Blog Info -->
        <div class="w-[90%] mx-auto flex md:gap-4 xs:gap-2 justify-center items-center pt-4">
            <div class="flex gap-2 items-center">
                <img src="{{ $project->avenues->first()->logo ?? 'default-logo-url.jpg' }}" alt="Blogger Profile" class="md:w-[2.2rem] md:h-[2.2rem] xs:w-[2rem] xs:h-[2rem] rounded-full" />
                <h2 class="text-sm font-semibold text-black">{{$project->avenues->first()->name ?? 'No Avenue'}}</h2>

            </div>
            <div class="text-gray-500">|</div>

            <h3 class="text-sm font-semibold text-gray-600"> {{ $project->created_at->diffForHumans() }}</h3>

            
        </div>

        <!-- Blog -->
        <div class="py-6 bg-white">
            <div class="md:w-[80%] xs:w-[90%] mx-auto pt-4">
                <p class="mx-auto text-md text-black">
                    In the world of CSS frameworks, there are plenty of contenders vying for your attention. But for me,
                    Tailwind CSS stands out from the pack. Here's why Tailwind CSS is my go-to for building modern
                    websites:
                </p>

                <h1 class="font-semibold text-lg mt-4 text-black">1. Utility-First Philosophy</h1>
                <p class="mt-2 text-md text-black">
                    Tailwind ditches bulky pre-built components and instead offers a massive toolbox of utility classes.
                    These classes, like "text-red-500" or "flex justify-center," target specific styles (color, layout)
                    and can be easily combined to achieve your desired look. This gives you ultimate control and keeps
                    your CSS nice and lean.
                </p>

                <!--  -->

                <h1 class="font-semibold text-lg mt-4 text-black">2. Rapid Prototyping</h1>
                <p class="mt-2 text-md text-black">
                    Need to get a design off the ground quickly? Tailwind's utility classes make it a breeze. Forget
                    digging through stylesheets - just apply classes directly in your HTML. This lets you iterate on
                    designs faster and see the visual changes instantly.
                </p>

                <!--  -->
                <h1 class="font-semibold text-lg mt-4 text-black">3. Responsive Out of the Box</h1>
                <p class="mt-2 text-md text-black">
                    Tailwind's utility classes are inherently responsive, meaning they adapt to different screen sizes.
                    No need for complex media queries - just add a responsive variant to your class (e.g. "text-lg" for
                    large screens). This saves you time and ensures your website looks sharp on any device.
                </p>

                <!--  -->
                <h1 class="font-semibold text-lg mt-4 text-black">4. Customization King</h1>
                <p class="mt-2 text-md text-black">
                    Don't be fooled by Tailwind's utility-first approach. You can still create custom themes and
                    components. Need a specific button style? No problem, define it with custom CSS and reuse it
                    throughout your project. Tailwind integrates seamlessly with your existing workflow.
                </p>

                <!--  -->
                <h1 class="font-semibold text-lg mt-4 text-black">5. Framework Agnostic</h1>
                <p class="mt-2 text-md text-black">
                    Tailwind plays well with others. Whether you're using React, Vue, Angular, or plain JavaScript,
                    Tailwind integrates without a hitch. This flexibility makes it a valuable asset for any project
                    regardless of your preferred framework.
                </p>

                <!--  -->
                <h1 class="font-semibold text-lg mt-4 text-black">Conclusion</h1>
                <p class="mt-2 text-md text-black">
                    Tailwind CSS offers a unique approach to styling that prioritizes speed, customization, and
                    responsiveness. It's a powerful tool that can streamline your workflow and help you build beautiful,
                    modern websites. So, if you're looking for a CSS framework that empowers you to create with freedom,
                    give Tailwind CSS a try!
                </p>

            </div>
        </div>

    </div>
</div>
@endsection
