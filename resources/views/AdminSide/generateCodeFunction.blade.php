@include('partials.headerAdmin')

<div class="flex flex-col h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-1/2 bg-gray-200 min-h-screen ">
            <!-- component -->
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">Code Generator</div>
            <div
                class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 bg-gray-100 p-4 shadow-xl max-w-2xl mb-6 rounded-lg">
                <!--Generate code-->
                <form id="form_generateCode" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4">
                        {{-- <div class="block mt-2 mb-3">
                            <label for="client_name"class="text-lg Reg-font p-2 capitalize">Name: </label>
                            <input type="text" name="client_name" id="client_name"
                                class="w-full text-lg Reg-font p-4 focus:outline-none bg-white" autocomplete="off">
                        </div> --}}
                        <div class="flex flex-col gap-2  mt-2 mb-3">
                            <label for="service_code" class="text-md Reg-font capitalize">Services:</label>
                            <select name="service_code" id="service_code"
                                class=" bg-white border border-gray-300 p-2 mb-4 outline-none Reg-font"
                                spellcheck="false">
                                <option value=""></option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->serviceCode }}"
                                        class="text-[16px] Reg-font capitalize ">
                                        {{ $service->serviceTitle }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_serviceCode')
                                <p class="text-red-400 text-sm p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="block mt-2 mb-3 flex justify-between  p-2">
                            <button type="button" id="regenerate_code"
                                class="text-lg SemiB-font bg-yellow-400 rounded p-2 text-blue-600">Reset</button>
                            <button type="button" id="generate_code"
                                class="text-lg SemiB-font bg-blue-600 active:bg-blue-700 rounded p-2 text-yellow-400">Generate</button>
                        </div>
                        <div class="block mt-2 mb-3 border border-gray-200">
                            <input type="text" name="code_generated" id="code_generated"
                                class="w-full text-lg Reg-font p-5 focus:outline-none bg-white" autocomplete="off"
                                value="">
                        </div>
                    </div>
                </form>
                {{-- <form action="" method="post">
                    <div class="block mt-10 mb-3 flex flex-col items-center ">
                        <div class="mt-2 flex flex-col items-center">
                            <div class="text-lg Reg-font">
                                <label for="msg_type">Send by: </label>
                                <select name="msg_type" id="msg_type" class="w-96 p-2">
                                    <option value=""></option>
                                    <option value="Sms">Sms</option>
                                    <option value="Email">Email</option>
                                </select>
                            </div>
                            <div class="mt-5 text-lg Reg-font">
                                <input type="text" name="sendTo_client" id="sendTo_client"
                                    class="w-80  p-2 focus:outline-none bg-white" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="button"
                                class="text-lg SemiB-font bg-blue-600 rounded p-2 text-white">Send</button>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#generate_code').click(function() {
            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/indexAdmin/generateCode',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') //get the token from the header
                },
                data: $('#form_generateCode').serialize(), // Change this line
                success: function(data) {
                    $('#code_generated').val(data.code);
                },
                error: function(xhr, status, error) {
                    console.log("XHR Response:", xhr);
                    console.log("Status:", status);
                    console.log("Error:", error);
                }
            });
        });
    });

    // Event handler for the "Reset" button
    $('#regenerate_code').click(function() {
        // Get the form element and reset it
        document.getElementById('form_generateCode').reset();
        // Clear the "code_generated" input field
        $('#code_generated').val('');
    });
</script>


@include('partials.footerAdmin')
