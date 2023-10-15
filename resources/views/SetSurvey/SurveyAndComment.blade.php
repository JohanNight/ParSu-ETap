@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">
    <div class="p-2 w-full flex">
        <a href="{{ route('index') }}" class="bg-blue-700 px-2 py-1 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white">
            Return
        </a>
    </div>
    {{-- <x-navBarClient /> Main Header --}}
    <div class="p-2">
        <form action="" method="POST">
            @csrf
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
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
                    </div>
                    <div class="survey_question flex flex-col p-3 w-full gap-4 mt-4 ">
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">1.</label>
                            <input type="text" name="srvy_qstn[1]" id="srvy_qstn[1]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">

                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">2.</label>
                            <input type="text" name="srvy_qstn[2]" id="srvy_qstn[2]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">

                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">3.</label>
                            <input type="text" name="srvy_qstn[3]" id="srvy_qstn[3]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">4.</label>
                            <input type="text" name="srvy_qstn[4]" id="srvy_qstn[4]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">5.</label>
                            <input type="text" name="srvy_qstn[5]" id="srvy_qstn[5]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">6.</label>
                            <input type="text" name="srvy_qstn[6]" id="srvy_qstn[6]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">7.</label>
                            <input type="text" name="srvy_qstn[7]" id="srvy_qstn[7]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">8.</label>
                            <input type="text" name="srvy_qstn[8]" id="srvy_qstn[8]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">9.</label>
                            <input type="text" name="srvy_qstn[9" id="srvy_qstn[9]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="srvy_qstn[]">10.</label>
                            <input type="text" name="srvy_qstn[10]" id="srvy_qstn[10]"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide">
                        </div>
                    </div>
                </div>
                {{-- Survey Number 3 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3 border-2 border-black">
                    <div class="w-full mb-3 ">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Comment Question
                            </h1>
                        </div>
                    </div>
                    <div class="flex flex-col p-3 w-full gap-4 mt-4">
                        <div class="flex items-center gap-2">
                            <h3 class="text-[15px] Reg-font capotalize">
                                Any Comments?
                            </h3>
                            <span class="SemiB-font text-sm">
                                (Sample Question)
                            </span>
                        </div>
                        <div class="flex gap-2 w-full ">
                            <label for="comment">1.</label>
                            <input type="text" name="comment" id="comment"
                                class="w-full bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                readonly autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit button --}}
            <div class="mt-2 p-10 flex justify-center ">
                <button class="p-2 text-[40px] w-full Reg-font bg-green-400 rounded active:bg-green-600"
                    type="submit">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--for handling the data-->
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();
            // Create an empty object to store the data
            const formData = {
                cc_question: {},
                option: {},
            };

            // Collect data from the CC Instructions
            const instruction = document.getElementById('instruction').value;
            formData.cc_question[1] = instruction;

            // Collect data from Questions and Options
            const questionContainers = document.querySelectorAll('.set-question');
            questionContainers.forEach((questionContainer, index) => {
                const questionData = {
                    question: questionContainer.querySelector(
                        `input[name="cc_question[${index + 1}][]"]`).value,
                    options: [],
                };
                const optionInputs = questionContainer.querySelectorAll(
                    `input[name^="option[${index + 1}]"]`);
                optionInputs.forEach((optionInput, optionIndex) => {
                    questionData.options.push(optionInput.value);
                });
                formData.option[index + 1] = [questionData];
            });

            // Send all the data to the server using AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/indexAdmin/Create-questionnaire'
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content'), // Include the CSRF token
                    formData: JSON.stringify(formData),
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
</script>

@include('partials.footerClient')
