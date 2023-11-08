@include('partials.headerAdmin')
<div class="bg-blue-800 max-h-lg shadow-lg w-full px-2 py-2.5">
    <div class="flex flex-wrap justify-between items-center ">
        <x-logo />
        <div>
            <h1 class="Bold-font text-yellow-400 text-4xl">
                ParSU Electronic Transaction and Processes
            </h1>
        </div>
        <div class="mx-2  py-2 pr-4 pl-3  flex gap-2 ">
            <a href="/home" class="SemiB-font text-[20px] text-white hover:text-yellow-400 ">Return </a>
            <a href="/register"
                class="SemiB-font text-[20px] hover:bg-yellow-400 rounded-md text-white hover:text-blue-700 ">Sign
                Up</a>

        </div>
    </div>
</div>
<section class="flex justify-around items-center mt-4">
    <header class="m-5 p-2.5 flex items-center">
        <h1 class="text-6xl font-bold text-blue-500">
            ParSU eTAP Admin
        </h1>
    </header>
    <div class="bg-gray-100 max-w-full mx-auto my-5 p-10 rounded-lg shadow-2xl border-2 ">
        <div class="bg-gray-100">
            <h3 class="font-bold text-2xl">Welcome to ParSU eTAP System</h3>
            <p class="text-gray-600 pt-2">Sign in to your Account</p>
        </div>
        <div class="mt-2 bg-blue-700 w-full p-2"></div>{{-- separation line --}}
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
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" name="password"
                        class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4  border-b-gray-600 border-gray-400 px-3">
                </div>

                <button type="submit"
                    class="w-full  mb-5 Bold-font text-[20px] border-2 p-2 bg-green-500 rounded-md">Sign
                    In</button>

                <hr class="mb-6 border-t" />
                <div class="text-center">
                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                        href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>
@include('partials.footerAdmin')
