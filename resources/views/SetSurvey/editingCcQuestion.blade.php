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
                    Edit Citizen's Charter Question
                </h1>
            </header>
        </div>
        <form action="/indexAdmin/edit/ccQuestion/{{ $ccQuestion->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="p-2 border-2 border-black w-full">
                {{-- Survey Number 1 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">

                    {{-- CC Number 0 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <h1 class="text-[18px] Bold-font">
                                    CC1
                                </h1>
                                <h3 class="text-[15px] Reg-font">
                                    Which of the following best describes your awareness of a CC?
                                </h3>
                                <span class="SemiB-font text-sm">
                                    (Sample Format)
                                </span>
                            </div>
                            <div class="flex flex-col text-xs Reg-font ml-2">
                                <span>1. I know what a CC is and I saw this office’s CC</span>
                                <span>2. I know what a CC is but I did NOT see this office’s CC.</span>
                                <span>3. I learned of the CC only when I saw this office’s CC.</span>
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer
                                    ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>

                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 1:
                                </label>
                                <input type="text" name="cc_questions[{{ $ccQuestion->id }}][question]"
                                    id="cc_questions[{{ $ccQuestion->id }}][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off" value="{{ $ccQuestion->description }}">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="w-full flex justify-between items-center">
                                <div>
                                    <h1 class="text-[15px] Bold-font">
                                        Options
                                    </h1>
                                </div>
                            </div>
                            <div class="Option flex flex-col p-3 w-full gap-4 mt-4">
                                @foreach ($ccQuestion->CcOption as $index => $option)
                                    <div class="flex gap-2 w-full">
                                        <label for="cc_questions[][options][]">{{ $index }}.</label>
                                        <input type="text"
                                            name="cc_questions[{{ $option->table_cc_question_id }}][options][{{ $index }}]"
                                            id="cc_questions[0][options][0]"
                                            class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                            autocomplete="off" value="{{ $option->option_text }}">
                                    </div>
                                @endforeach

                            </div>
                        </div>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script> --}}

@include('partials.footerClient')
