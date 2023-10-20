@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">
    <div class="p-2 w-full flex">
        <a href="{{ route('CcAndCssPage') }}"
            class="bg-blue-700 px-2 py-1 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white">
            Return
        </a>
    </div>
    {{-- <x-navBarClient /> Main Header --}}
    <div class="p-2">
        <x-messages />
        <form action="/indexAdmin/save/Css-Question/{{ $SrvyQuestion->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex justify-center items-center mb-1 w-full bg-blue-800 h-16">
                <h1 class="text-2xl SemiB-font text-yellow-400 ">
                    Edit Client Satisfaction Survey Question
                </h1>
            </div>
            <div class="p-2 border-2 border-black w-full">
                {{-- Survey Number 2 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3 border-2 border-black">
                    <div class="w-full mb-3 ">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Survey Question
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-2 mb-3 ">
                        <h3 class="text-[15px] Reg-font">
                            SQD0. I am satisfied with the service that I availed.
                        </h3>
                        <span class=" SemiB-font text-sm">
                            (Sample Question)
                        </span>
                    </div>
                    <div class="survey_question flex flex-col p-3 w-full gap-4 mt-4 ">
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">1.</label>
                            <input type="text" name="srvy_qstn" id="srvy_qstn"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                autocomplete="off" value="{{ $SrvyQuestion->questions }}">

                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-[40px] w-full Reg-font bg-green-400 rounded active:bg-green-600" type="submit">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>


@include('partials.footerClient')
