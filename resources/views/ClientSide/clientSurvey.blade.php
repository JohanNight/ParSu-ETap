@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">

    <x-navBarClient />{{-- Main Header --}}
    <div class="pagecontainer">
        {{-- This is for the title and the logo --}}
        <div class="flex flex-col items-center  bg-blue-700 bg-opacity-50 w-full ">
            <div class="block flex justify-center items-center">
                <div class=" relative h-22 p-[10px] mr-2">
                    <img src="{{ asset('images/NewPSUlogo.png') }}" alt="PSU logo" class="w-20 h-20" srcset="">
                </div>
                <div class="ml-[20px]">
                    <h1 class="text-2xl SemiB-font text-yellow-400">ParSU E-Tap</h1>
                </div>
            </div>
            <div class="block">
                <h1 class="text-[30px] Bold-font text-black tracking-wide uppercase">
                    Help Us Serve You Better
                </h1>
            </div>
        </div>
        {{-- Description --}}
        <div class=" block mt-2 p-5 border-b-2 border-b-gray-700">
            <div class="mx-2 ">
                <p class="text-center text-[18px] Reg-font text-black tracking-wide leading-2">
                    This Client Satisfaction Measurement (CSM) tracks the customer experience of government offices.
                    Your
                    feedback on your recently concluded transaction will help this office provide a better service.
                    Personal
                    information shared will be kept confidential and you always have the option to not answer this form.
                </p>
            </div>
        </div>

    </div>
</div>



@include('partials.footerClient')
