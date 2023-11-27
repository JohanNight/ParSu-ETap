@include('partials.headerAdmin')
<div class="relative">

    <!--- Background Video--->
    <div class="relative">
        <video autoplay muted loop class="absolute inset-0 w-full min-h-screen object-cover">
            <source src="{{ asset('images/images/IMG_7519.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class=" relative shadow-lg w-full px-2 py-2.5">
        <div class="flex flex-wrap justify-between items-center ">
            <x-logo />
            <div>
                <h1 class="Bold-font text-white text-4xl">
                    ParSU eTAP:Electronic Transaction and Process
                </h1>
            </div>
            <div class="mx-2  py-2 pr-4 pl-3  flex gap-2 ">
                <a href="{{ route('welcome') }}" class="SemiB-font text-[20px] text-white hover:text-blue-400 ">Return
                </a>
                <a href="/register" class="SemiB-font text-[20px]  rounded-md text-white hover:text-blue-700 ">Sign
                    Up</a>

            </div>
        </div>
    </div>
    <div class="relative z-10 h-full">
        <div class="flex justify-around items-center mt-2">
            {{-- <header class="m-5 p-2.5 flex items-center">
                <h1 class="text-6xl font-bold text-blue-500">
                    ParSU eTAP Admin
                </h1>
            </header> --}}
            <div class=" max-w-full mx-auto my-5 p-10 rounded-xl shadow-2xl bg-white bg-opacity-80">
                <div class="">
                    <h3 class="Bold-font text-2xl text-blue-800">Welcome to ParSU eTAP System</h3>
                    <p class="text-blue-800 Med-font pt-2 ">Sign in to your Account</p>
                </div>
                <div class="mt-2 bg-gray-500 w-full p-2"></div>{{-- separation line --}}
                <div class="mt-5">
                    <form action="/login/process" method="POST" class="flex flex-col">
                        @csrf
                        @error('email')
                            <p class="text-red-400 text-sm m-1">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="mb-6 pt-3rounded bg-gray-200 rounded-md">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-b-gray-600 border-gray-400  px-3"
                                autocomplete="off">
                        </div>

                        <div class="mb-6 pt-3 rounded bg-gray-200 rounded-md">
                            <label for="password"
                                class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                            <input type="password" name="password"
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4  border-b-gray-600 border-gray-400 px-3">
                        </div>

                        <button type="submit"
                            class="w-full  mb-5 Bold-font text-[20px]  p-2 bg-[#0047ab] active:bg-[#00008B]  rounded-md">Sign
                            In</button>

                        <hr class="mb-6 border-t border-t-gray-500 " />
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-400 align-baseline hover:text-blue-500"
                                href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@include('partials.footerAdmin')

{{-- <div class="bg-[#00008B] max-h-lg shadow-lg w-full px-2 py-2.5">
        <div class="flex flex-wrap justify-between items-center ">
            <x-logo />
            <div>
                <h1 class="Bold-font text-yellow-400 text-4xl">
                    ParSU Electronic Transaction and Processes
                </h1>
            </div>
            <div class="mx-2  py-2 pr-4 pl-3  flex gap-2 ">
                <a href="{{ route('welcome') }}" class="SemiB-font text-[20px] text-white hover:text-yellow-400 ">Return
                </a>
                <a href="/register"
                    class="SemiB-font text-[20px] hover:bg-yellow-400 rounded-md text-white hover:text-blue-700 ">Sign
                    Up</a>

            </div>
        </div>
</div> --}}
