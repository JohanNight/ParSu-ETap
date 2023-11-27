@include('partials.headerClient')
<div class="relative">
    <x-messages />
    <!-- background Image -->
    <div class=" absolute w-full ">
        <img src="{{ asset('images/ImageForPSU/IMG_2539.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80"
            alt="">
    </div>
    <!-- background Image -->
    <div class=" min-h-screen w-full absolute">
        <x-messages />
        <div class="flex flex-col  gap-10">
            <div class="flex justify-start ml-5">
                <form action="{{ route('welcome') }}" method="get">
                    <button type="submit"
                        class=" px-1 rounded-lg   transition duration-100  Bold-font text-2xl text-white w-20 h-12 shadow-md ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 -960 960 960"
                            class="text-white" id="colorChangingSvg">
                            <path
                                d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"
                                fill="#3490dc" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="flex justify-center items-center mt-[40px]">
                <div class=" mt bg-blue-800 p-2 rounded-lg w-96 flex justify-center items-center">
                    <h1 class="text-xl SemiB-font uppercase p-2 text-white">
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
                            class="text-lg SemiB-font px-3 py-1 bg-blue-800 rounded-lg active:bg-blue-900">
                            Enter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var svg = document.getElementById('colorChangingSvg');

    svg.addEventListener('click', function() {
        svg.querySelector('path').setAttribute('fill', '#87CEEB');
    });
</script>
@include('partials.footerClient')
