@include('partials.headerAdmin')
<div class="bg-blue-800 max-h-full shadow-lg w-full px-2 py-2.5 text-white">
    <div class="flex flex-wrap justify-between items-center ">
        <x-logo />
        <div>
            <h1 class="Bold-font text-yellow-400 text-4xl">
                ParSU Electronic Transaction and Processes
            </h1>
        </div>
        <div class="mx-2 hover:bg-yellow-400 hover:rounded-lg hover:shadow-md">
            <ul class=" flex flex-col md:flex-row px-3 ">
                <li>
                    <a href="#" class=" block py-2 pr-4 pl-3 font-semibold text-[20px]">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="flex justify-around items-center mt-10">
    <header class="m-5 p-2.5 flex items-center">
        <h1 class="text-6xl font-bold text-blue-500">
            ParSU e-Tap Admin
        </h1>
    </header>
    <div class="bg-gray-100 max-w-full mx-auto my-10 p-10 rounded-lg shadow-2xl border-2 border-blue-700 ">
        <section class="bg-gray-100">
            <h3 class="font-bold text-2xl">Welcome to ParSU e-TAP Systems</h3>
            <p class="text-gray-600 pt-2">Sign in to your Account</p>
        </section>
        <div class="mt-2 bg-blue-700 w-full p-2"></div>
        <section class="mt-10">
            <form action="/login/authenticate" method="POST" class="flex flex-col">
                @csrf
                <div class="mb-6 pt-3rounded bg-gray-200 rounded-md">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="text" name="email" id="email"
                        class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3"
                        autocomplete="off">
                </div>

                <div class="mb-6 pt-3rounded bg-gray-200 rounded-md">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" name="password"
                        class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 borderr-50 px-3">
                </div>

                <button
                    class="bg-green-600 w-full hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                    type="submit">Sign in
                </button>

                <hr class="mb-6 border-t" />
                <div class="text-center">
                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>

            </form>
        </section>
    </div>
</section>
@include('partials.footerAdmin')
