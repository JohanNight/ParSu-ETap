@include('partials.headerClient')
<div class="min-h-screen w-full relative">
    <div class="h-full w-full flex">
        <div class=" min-h-sceen w-[50%]">
            <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full " alt="">
        </div>
        <div class="min-h-sceen w-[50%]">
            <div class="bg-indigo-900 w-full h-screen flex flex-col items-center">
                <div class="mt-10">
                    <h1 class="text-[30px] SemiB-font text-white">
                        ParSU eTAP
                    </h1>
                </div>
                <div class="mt-[30px]  flex flex-col items-center">
                    <h1
                        class="text-[50px] uppercase Bold-font text-yellow-400 text-center sm:text-[30px] md:text-[50px]">
                        ELECTRONIC CLIENT SATISFACTION SYSTEM OF UNIVERSITY SERVICES
                    </h1>
                    <div class="mt-[30px] w-full p-5">
                        <div class="flex justify-center items-center w-full">
                            <a href="{{ route('HomePage') }}"
                                class="w-full text-[30px] text-white SemiB-font bg-yellow-400 p-5 rounded-[100px] text-center active:bg-yellow-500 animate-bounce">Get
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
