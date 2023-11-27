@include('partials.headerAdmin')
<div class="p-2">
    <x-messages />
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-8">
                <h3 class="text-2xl text-yellow-400 tracking-wide SemiB-font">ParSU eTAP</h3>
            </div>
            <h1 class="text-3xl font-semibold text-center text-gray-500 mt-8 mb-6">Reset Password</h1>
            <form action="{{ $data->remember_token }}" method="POST">
                @csrf
                {{-- <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        autocomplete="off" value="{{ $data->email }}" readonly>
                    @error('email')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div> --}}
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm Reg-font text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        value="">
                    @error('password')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm Reg-font text-gray-600">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">Change
                    Password</button>

                <p class="text-center">Return to <a href="{{ route('login') }}"
                        class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Login now
                        </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg></span></a></p>
            </form>
        </div>
    </div>
</div>

@include('partials.footerAdmin')
