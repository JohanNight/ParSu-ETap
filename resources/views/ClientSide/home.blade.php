@include('partials.headerClient')
<div class="relative">
    <!-- background Image -->
    <div class=" absolute w-full h-screen">
        <img src="{{ asset('images/Entrance.jpg') }}" class="h-[100dvh] bg-no-repeat w-full opacity-80" alt="">
    </div>
    <div class=" w-full absolute h-full">
        <header class="text-center pt-2 bg-blue-800 mb-5 ">
            <h1 class="Bold-font text-yellow-400  text-6xl sm:text-5xl md:text-6xl">ParSU E-TAP
            </h1>
        </header>

        <div class="ml-[50px] mr-[50px] mb-[50px] flex justify-between">

            <a href="{{ route('welcome') }}"
                class="SemiB-font text-2xl text-white bg-gray-600 rounded-lg p-2 shadow-md hover:bg-yellow-500 active:bg-yellow-600 ">Return
                to Opening</a>
            <a href="{{ route('login') }}"
                class="SemiB-font text-2xl text-white border-2 border-green-500 rounded-lg p-2 shadow-md  active:bg-green-600 ">Login</a>

        </div>

        <div class="p-1 m-3 flex justify-center justify-around sm:gap-2 ">
            <x-messages />
            <div class="bg-gray-600 bg-opacity-70  rounded-md w-96 h-full shadow-lg floating-container">
                <div class=" block bg-gray  p-2 mt-2 w-full h-96 ">
                    <img src="{{ asset('images/PARSU IMAGES/admin_building.jpg') }}" alt="" srcset=""
                        class="w-full h-96">
                </div>
                <div class="block text-yellow-500 SemiB-font text-2xl text-center pb-2 pt-3 pointer">
                    <a href="{{ route('CitizenCharter') }}" class="hover:underline"> Citizens Charter</a>
                </div>

            </div>
            <div class="bg-gray-600 bg-opacity-70 rounded-md w-96 h-full shadow-lg floating-container">
                <div class=" block bg-gray p-2 mt-2 w-full h-full ">
                    <img src="{{ asset('images/CssImages.jpg') }}" alt="" srcset="" class="w-full h-96">
                </div>
                <div class="block text-yellow-500 SemiB-font text-2xl text-center pb-2 pointer">
                    <a href="{{ route('clientButton') }}" class="hover:underline"> Client Satisfaction Survey</a>
                </div>

            </div>

        </div>


    </div>
</div>

<script>
    const containers = document.querySelectorAll('.floating-container');

    containers.forEach(container => {
        container.addEventListener('mouseenter', () => {
            container.style.transition = 'transform 0.3s ease';
            container.style.transform = 'translateY(-20px)';
        });

        container.addEventListener('mouseleave', () => {
            container.style.transition = 'transform 0.3s ease';
            container.style.transform = 'translateY(0)';
        });
    });
</script>
@include('partials.footerClient')
