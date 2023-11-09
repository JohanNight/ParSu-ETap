@include('partials.headerAdmin')
<div class="p-2">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-8">
                <h1 class="text-4xl SemiB-font text-yellow-400 tracking-wide"> <span class="text-blue-700">ParSU</span>
                    eTAP</h1>
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
