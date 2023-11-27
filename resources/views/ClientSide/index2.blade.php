@include('partials.headerClient')
<div class="bg-white min-h-screen w-full relative">
    <div class=" absolute w-full h-screen">
        <div class=" min-h-sceen w-[100%]">
            <img src="{{ asset('images/ImageForPSU/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full "
                alt="">
        </div>
    </div>
    <div class="absolute max-h-screen w-full">
        <nav class="w-full h-full flex flex-col justify-center items-center">
            <div class="relative w-full px-4 py-8 bg-[url('/public/images/images/itbg.png')] bg-center bg-cover">
                <div class="absolute z-10 top-0 left-0 w-full h-full bg-gradient-to-r from-[#ffffff]"></div>
                <div class="relative lg:ml-[6rem] z-30">
                    <h1 class="text-2xl text-center lg:text-start font-bold text-[#1d3557]">
                        PARSU E-TAP
                    </h1>
                </div>
            </div>

            <ul
                class="w-full flex justify-center items-center gap-2 lg:gap-8 px-4 py-8 text-sm lg:text-xl text-white font-semibold bg-[#1d3557]">
                {{-- <li><a href="home.html">Home</a></li> --}}
                <li><a href="{{ route('CitizenCharter') }}">Citizen Charter</a></li>
                <li class="relative group">
                    <a href="#" class="group">
                        Client Satisfaction Survey
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-5 w-5 inline-block ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                    <ul class="absolute hidden group-hover:block bg-white  text-gray-800 py-2 px-4 space-y-2">
                        <li><a href="{{ route('Step1') }}" class="hover:underline">Walk-In</a></li>
                        <li><a href="{{ route('clientSecurity') }}" class="hover:underline">Online</a></li>
                        <!-- Add more options as needed -->
                    </ul>
                </li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </nav>


        <header class="w-full flex flex-col lg:flex-row items-center gap-8 p-8">
            <div class="w-[50%] p-4 flex justify-center items-center">
                <div>
                    <h1 class="text-[#000080] text-[3.5rem] text-center lg:text-start Bold-font leading-[4rem]">
                        Partido State <br />
                        University
                    </h1>
                    <p class="my-6 text-[#00008b] SemiB-font">
                        Parsu eTAP:Electronic Satisfaction Survey
                    </p>

                    <div class="flex gap-4 font-medium">
                        {{-- <button class="py-1 px-6 border-2 border-[#1d3557] rounded-full">
                            Get Started
                        </button>
                        <button class="py-1 px-6 text-white bg-[#1d3557] rounded-full">
                            Log In
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="w-[50%] h-full flex justify-center items-center">
                <img class="lg:w-[23rem]" src="{{ asset('images/images/logo.png') }}" alt="" />
            </div>
        </header>
    </div>

</div>


@include('partials.footerClient')
