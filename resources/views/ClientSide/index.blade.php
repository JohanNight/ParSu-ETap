@include('partials.headerClient')
<div class="bg-black min-h-screen w-full relative">
    <div class=" absolute w-full h-screen">
        <div class=" min-h-sceen w-[100%]">
            <img src="{{ asset('images/ImageForPSU/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-70 "
                alt="">
        </div>
    </div>
    <div class="absolute max-h-screen w-full">
        <nav class="w-full h-full flex flex-col justify-center items-center">
            <div class="relative w-full flex justify-between items-center px-4 py-8 bg-[#1d3557] bg-center bg-cover">
                <div class="relative lg:ml-[1rem] z-30 w-full ">
                    <h1 class="text-4xl text-center lg:text-start Bold-font text-white">
                        ParSU eTap
                    </h1>
                </div>
                <ul
                    class="w-full flex justify-center items-center gap-2 lg:gap-8 px-2 py-4 text-sm lg:text-xl text-[#1d3557]">
                    <li><a href="{{ route('CitizenCharter') }}"
                            class="hover:text-blue-400   text-white underline Bold-font">Citizen
                            Charter</a></li>
                    <li class="relative group">
                        <a href="#" class="group hover:text-blue-400 underline Bold-font text-white">
                            Client Satisfaction Survey
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-5 w-5 inline-block ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </a>
                        <ul class="absolute hidden group-hover:block bg-white  text-gray-800 py-2 px-4 space-y-2">
                            <li><a href="{{ route('Step1') }}" class="hover:underline">Walk-In</a></li>
                            <li><a href="{{ route('clientSecurity') }}" class="hover:underline">Online</a></li>
                            <!-- Add more options as needed -->
                        </ul>
                    </li>
                    <li><a href="{{ route('login') }}"class="underline text-[13px] Med-I-font text-blue-800">Login</a>
                    </li>
                </ul>
            </div>
        </nav>


        <header class="w-full flex flex-col lg:flex-row items-center gap-8 p-8">
            <div class="w-[50%] p-4 flex justify-center items-center">
                <div>
                    <h1 class="text-white text-[3.5rem] text-center lg:text-start Bold-font leading-[4rem]">
                        Partido State <br />
                        University
                    </h1>
                    <p class="my-6 text-white SemiB-font">
                        ParSU eTAP:Electronic Satisfaction Survey
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-2">
                <h1 class="Bold-font text-white text-center uppercase mb-2 text-sm lg:text-xl xl:text-2xl">The
                    Anti-Red
                    Tape Authority
                </h1>
                <p class="text-sm lg:text-base xl:text-lg Med-font text-justify tracking-wide text-white">
                    Section 17
                    of Republic Act No. 11032
                    provides for the
                    creation of the Anti-Red Tape Authority or
                    ARTA, the government agency mandated to administer and implement the said law and its
                    Implementing Rules and Regulations, and to monitor and ensure compliance with the national
                    policy on anti-red tape and ease of doing business in the country.
                </p>
            </div>

        </header>
    </div>

</div>



@include('partials.footerClient')
