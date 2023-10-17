@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">
    <div class="p-2 w-full flex">
        <a href="{{ route('index') }}" class="bg-blue-700 px-2 py-1 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white">
            Return
        </a>
    </div>
    {{-- <x-navBarClient /> Main Header --}}
    <div class="p-2">
        <div class="flex justify-center items-center mb-4 mt-3">
            <header class="bg-blue-800 p-4 rounded-md">
                <h1 class="text-[30px] SemiB-font text-yellow-400 ">
                    Edit Citizen's Charter Instruction
                </h1>
            </header>
        </div>
        <form action="/indexAdmin/edit/ccInsruction/{{ $ccInstruction->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="p-2 border-2 border-black w-full">
                {{-- Survey Number 1 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">
                    {{-- Instruction --}}
                    <div class="mt-2 mb-3 gap-2 flex flex-col border-2 border-black p-1 rounded-md">
                        <label for="instruction" class="text-[15px] Reg-font">Instruction: </label>

                        <textarea name="instruction" id="instruction" cols="30" rows="3"
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off">{{ $ccInstruction->instruction }}</textarea>


                    </div>
                </div>

            </div>

            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-[40px] text-white w-full Med-font bg-blue-600 rounded active:bg-green-600"
                    type="submit">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<!--for handling the data-->
{{--   --}}

@include('partials.footerClient')
