@include('partials.headerAdmin')
<div class="min-h-screen bg-gray-200">
    <div class="p-2">
        <div class=" p-2 bg-red-500 rounded-md m-2 ">
            <button class="text-[20px] SemiB-font underline hover:text-blue-700">
                Return
            </button>
        </div>
        <div class="flex flex-col p-2 border-2 mt-2 w-full border-2 border-black">
            <div class="flex justify-center ">
                <header class="p-2 border-b-2 border-b-gray-400">
                    <h1 class=" Bold-font text-[30px]">
                        Service 1
                    </h1>
                </header>
            </div>
            <div class="flex justify-end p-2">
                <button type="button">
                    Assess All
                </button>
            </div>
        </div>

    </div>
</div>


@include('partials.footerAdmin')
