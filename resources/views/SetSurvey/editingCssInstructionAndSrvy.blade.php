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
        <form action="/indexAdmin/edit/Css-Instruction/{{ $SrvyInstruction->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex justify-center items-center mb-1 w-full bg-blue-800 h-16">
                <h1 class="text-2xl SemiB-font text-yellow-400 ">
                    Edit Survey Question
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
                    <div class="mt-2 mb-3 gap-2 flex flex-col border-2 border-black p-1 rounded-md">
                        <label for="instruction_SQstn" class="text-[15px] Reg-font">Instruction: </label>
                        <textarea name="instruction_SQstn" id="instruction_SQstn" cols="30" rows="3"
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off">{{ $SrvyInstruction->instruction }}</textarea>
                    </div>
                    {{-- Submit button --}}
                    <div class="mt-2 p-10 flex justify-center ">
                        <button
                            class="p-2 text-[40px] text-white w-full Med-font bg-blue-600 rounded active:bg-green-600"
                            type="submit">
                            Update
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>



</div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--for handling the data-->
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();
            // Create an empty object to store the data
            const formData = new FormData(form);
            // Send all the data to the server using AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/indexAdmin/Create-Survey-Questionnaire'
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content'), // Include the CSRF token
                    formData: formData,
                },
                success: function(response) {
                    // Handle the success response or redirect to a success page
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        });
    });
</script> --}}

@include('partials.footerClient')
