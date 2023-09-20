@include('partials.headerAdmin')
<div class="p-2">
    <section class=" flex justify-center items-center">
        <header class="m-5 p-2.5 flex items-center">
            <h1 class="text-4xl font-bold text-blue-500">
                Admin Registration
            </h1>
        </header>
    </section>
    <section class="flex flex-col items-center">
        <div class="bg-gray-100 max-w-full mx-auto my-5 p-10 rounded-lg shadow-2xl border-2 ">
            <div class="bg-gray-100">
                <h3 class="font-bold text-2xl">Registration e-TAP Systems</h3>
                <p class="text-gray-600 pt-2"></p>
            </div>
            <div class="mt-2 bg-blue-700 w-full p-2"></div>{{-- separation line --}}
            <div class="mt-5">
                <form action="/register/storeData" method="POST" class="flex flex-col">
                    @csrf
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                        <input type="text" name="name"
                            class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3">
                    </div>
                    <div class="mb-6 pt-3rounded bg-gray-200 rounded-md">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-b-gray-600 border-gray-400  px-3"
                            autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="offices" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Office:
                        </label>
                        <select name="offices" id="offices"
                            class="  bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-b-gray-600 border-gray-400  px-3">
                            <option value=""></option>
                            @foreach ($officeTypes as $officeType)
                                <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize ">
                                    {{ $officeType->officeAcronym }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6 pt-3 rounded bg-gray-200 rounded-md">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                        <input type="password" name="password"
                            class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4  border-b-gray-600 border-gray-400 px-3">
                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label for="password_confirmation"
                            class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation"
                            class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 borderr-50 px-3">

                    </div>

                    <button
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                        type="submit">Sign up
                    </button>


                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{ route('login') }}">
                            Already have an Account
                        </a>
                    </div>

                </form>
            </div>
        </div>
        {{-- <div class="bg-gray-100 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl ">
            <section class="bg-gray-100">
                <h3 class="font-bold text-2xl">Register for an Account</h3>
            </section>

        </div>
        <form action="/store" method="POST"class="flex flex-col w-full">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="name_admin" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                <input type="text" name="name_admin"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email_admin" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email_admin"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3">
            </div>


            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="campus_college_office"
                    class="block text-gray-700 text-sm font-bold mb-2 ml-3">Office</label>
                <input type="text" name="office"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3">
            </div>


            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 borderr-50 px-3">

            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm
                    Password</label>
                <input type="password" name="password_confirmation"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 borderr-50 px-3">

            </div>

            <button
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">Sign up
            </button>

        </form> --}}
    </section>
</div>

@include('partials.footerAdmin')
