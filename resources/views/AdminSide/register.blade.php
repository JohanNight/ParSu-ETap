@include('partials.headerAdmin')
<div class="p-2">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-8">
                <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-30 h-20">
            </div>
            <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Admin Registration</h1>
            <form action="/register/storeData" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm text-gray-600">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        autocomplete="off">
                    @error('name')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="offices" class="block mb-2 text-sm text-gray-600">Office</label>
                    <select name="offices" id="offices"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <option value=""></option>
                        @foreach ($officeTypes as $officeType)
                            <option value="{{ $officeType->idOffices }}" class="text-[16px] Reg-font capitalize ">
                                {{ $officeType->officeDescription }}</option>
                        @endforeach
                    </select>
                    @error('offices')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        autocomplete="off">
                    @error('email')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    @error('password')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm text-gray-600">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">Register</button>
            </form>
            <div class="text-center">
                <p class="text-sm">Already have an Account? <a href="{{ route('login') }}" class="text-cyan-600">Log
                        in</a></p>
            </div>
        </div>
    </div>
</div>

@include('partials.footerAdmin')
{{-- <div class="bg-gray-100 max-w-full mx-auto my-5 p-10 rounded-lg shadow-2xl border-2 ">
    <div class="bg-gray-100">
        <h3 class="font-bold text-2xl">Registration e-TAP Systems</h3>
        <p class="text-gray-600 pt-2"></p>
    </div>
    <div class="mt-2 bg-blue-700 w-full p-2"></div>{{-- separation line 
    <div class="mt-5">
        <form action="/register/storeData" method="POST" class="flex flex-col">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Name</label>
                <input type="text" name="name"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400  px-3"autocomplete="off"
                    value="{{ old('name') }}">

                @error('name')
                    <p class="text-red-400 text-sm p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3rounded bg-gray-200 rounded-md">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="text" name="email" id="email"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-b-gray-600 border-gray-400  px-3"
                    autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-400 text-sm p-1">
                        {{ $message }}
                    </p>
                @enderror
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
                @error('offices')
                    <p class="text-red-400 text-sm p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200 rounded-md">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4  border-b-gray-600 border-gray-400 px-3"autocomplete="off">
                @error('password')
                    <p class="text-red-400 text-sm p-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password_confirmation"
                    class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm
                    Password</label>
                <input type="password" name="password_confirmation"
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 borderr-50 px-3"autocomplete="off">
                @error('password_confirmation')
                    <p class="text-red-400 text-sm p-1">
                        {{ $message }}
                    </p>
                @enderror

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
</div> --}}
