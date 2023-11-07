@include('partials.headerClient')
<div class="relative">
    <x-messages />
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80" alt="">
    </div>
    <!-- background Image -->
    <div class=" min-h-screen w-full absolute">
        <x-messages />
        <div class="flex flex-col  gap-10">
            <div class="p-2 rounded-lg  flex justify-start items-center ">
                <a href="{{ route('clientButton') }}"
                    class=" border-2 border-blue-800 rounded-lg text-xl SemiB-font uppercase p-2 text-white border-2 border-black mr-[50px]">
                    Return
                </a>
            </div>
            <div class="flex justify-center items-center mt-[40px]">
                <div class=" mt bg-blue-800 p-2 rounded-lg w-96 flex justify-center items-center">
                    <h1 class="text-xl SemiB-font uppercase p-2 text-yellow-400">
                        For Security Purposes
                    </h1>
                </div>
            </div>
            <div class="mt-2 flex justify-center items-center">
                <form action="/clientSecurity" method="POST">
                    @csrf
                    <div class="w-full mt-2 mb-3">
                        <input type="text" name="srvy_keycode" id="srvy_keycode"
                            class="w-96 bg-gray-300 text-lg p-2 rounded-lg focus:outline-none border-2"autocomplete="off"
                            placeholder="ENTER YOUR CODE">
                    </div>
                    <div class="mt-2 flex justify-center items-center">
                        <button type="submit"
                            class="text-lg SemiB-font px-3 py-1 bg-green-400 rounded-lg active:bg-green-500">
                            Enter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('partials.footerClient')
