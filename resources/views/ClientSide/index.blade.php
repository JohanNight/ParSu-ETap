@include('partials.headerClient')
<div class="min-h-screen w-full relative">
    <div class="h-full w-full flex">
        <div class=" min-h-sceen w-[50%]">
            <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full " alt="">
        </div>
        <div class=" min-h-sceen w-[50%]">
            <div class="bg-indigo-900 w-full h-screen">
                <div class="flex justify-center items-center">
                    <div class="mt-10">
                        <h1 class="text-[30px] SemiB-font text-white">
                            ParSU eTAP
                        </h1>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="mt-[30px] ml-10">
                        <h1
                            class="text-[50px] uppercase Bold-font text-yellow-400 text-center sm:text-[30px] md:text-[50px]">
                            ELECTRONIC CLIENT SATISFACTION SYSTEM OF UNIVERSITY SERVICES
                        </h1>
                    </div>

                </div>
                <div class="flex justify-center items-center">
                    <div class="mt-[30px] ml-10 w-full p-5">
                        <div class="flex justify-center items-center w-full">
                            <a href="{{ route('HomePage') }}"
                                class=" w-full text-[30px] text-white SemiB-font bg-yellow-400 p-5 rounded-[100px] text-center active:bg-yellow-500 animate-bounce">Get
                                Started</a>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('login') }}"
                                class="mt-2 text-sm underline text-blue-800 Reg-font active:text-blue-900">Login</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footerClient')


{{-- <div class="relative">
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80" alt="">
    </div>
    <!-- background Image -->
    <div class=" min-h-screen w-full absolute">
        <header class="text-center mb-5 pt-2  bg-blue-800 h-16 w-full">
            <h1 class="Bold-font text-yellow-400  text-5xl sm:text-4xl md:text-5xl">
                ParSU eTAP
            </h1>
        </header>
        <div class="flex flex-col items-center pointer ">
            <div
                class="swiper-container relative w-[600px] h-[400px] overflow-hidden border-4 border-gray-50 rounded-md shadow-md  ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/entrance.jpg') }}" alt="slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/slide3.jpg') }}" alt="slide 2" class="h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/production_sq.png') }}" alt="slide 2"
                            class=" w-full h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/research_sq2.png') }}" alt="slide 2"
                            class=" w-full h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/man-extension.png') }}" alt="slide 2"
                            class=" w-full h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/man-instruction.png') }}" alt="slide 2"
                            class=" w-full h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/PARSU IMAGES/ProductionBanner.png') }}" alt="slide 2"
                            class=" w-full h-full">
                    </div>

                    <!-- Add more slides as needed -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="mt-5">
                <a href="{{ route('HomePage') }}"
                    class="block w-full text-2xl SemiB-font text-black bg-green-500 p-3 rounded-lg  border-4 border-green-600 active:bg-green-600 capitalize">Enter</a>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".swiper-container", {
            loop: true,
            autoplay: {
                delay: 5000, // Adjust the delay in milliseconds (ms)
            },
            pagination: {
                el: ".swiper-pagination",
            },
            effect: 'coverflow', // Add this line for the coverflow effect
            coverflowEffect: {
                rotate: 30, // Adjust the rotation angle
                slideShadows: false, // Set to true if you want slide shadows
            },
        });
    });
</script> --}}
