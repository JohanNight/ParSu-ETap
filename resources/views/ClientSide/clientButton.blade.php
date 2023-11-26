@include('partials.headerClient')
<div class="relative">
    <x-messages />
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/ImageForPSU/IMG_2543.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80"
            alt="">
    </div>
    <!-- background Image -->
    <div class=" min-h-screen w-full absolute">
        <x-messages />
        <div class="flex flex-col  gap-10">
            <div class="p-2 rounded-lg  flex justify-start items-center ">
                <a href="{{ route('HomePage') }}"
                    class=" border-2 border-blue-800 rounded-lg text-xl SemiB-font uppercase p-2 text-white border-2 border-black mr-[50px]">
                    Return
                </a>
            </div>
            <div class="flex justify-evenly items-center mt-[40px] p-5">
                <a href="{{ route('Step1') }}"
                    class=" border-2 border-yellow-400 bg-yellow-400 rounded-lg text-4xl SemiB-font uppercase p-2 text-white border-2 border-black mr-[50px] active:bg-yellow-500">
                    Walk-In Survey
                </a>
                <a href="{{ route('clientSecurity') }}"
                    class=" border-2 border-blue-800 bg-blue-800 rounded-lg text-4xl SemiB-font uppercase p-2 text-white border-2 border-black mr-[50px] active:bg-blue-900">
                    Online Satifaction Survey
                </a>
            </div>
            < </div>
        </div>
    </div>


    @include('partials.footerClient')
