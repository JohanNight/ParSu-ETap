@include('partials.headerClient')
<div class="bg-gray-50 min-h-screen">
    <div class="p-2 w-full flex">
        <a href="{{ route('Admin') }}" class="bg-blue-700 px-2 py-1 rounded-md ml-5 mb-5 Reg-font text-[18px] text-white">
            Return
        </a>
    </div>
    {{-- <x-navBarClient /> Main Header --}}
    <div class="p-2">
        <x-messages />
        <form action="" method="POST">
            @csrf
            <div class="flex justify-center items-center mb-1 w-full bg-blue-800 h-16">
                <h1 class="text-2xl SemiB-font text-yellow-400 ">
                    Add Survey Question
                </h1>
            </div>
            <div class="p-2 border-2 border-black w-full">
                {{-- Survey Number 1 --}}
                <div class="bg-white p-2 w-full shadow-lg mt-4 rounded-md mb-3">
                    <div class="w-full flex justify-start items-center mb-3">
                        <div>
                            <h1 class="text-[20px] Bold-font">
                                Citizen's Charter Question
                            </h1>
                        </div>
                    </div>
                    {{-- Instruction --}}
                    <div class="mt-2 mb-3 gap-2 flex flex-col border-2 border-black p-1 rounded-md">
                        <label for="instruction" class="text-[15px] Reg-font">Instruction: </label>
                        <textarea name="instruction" id="instruction" cols="30" rows="3"
                            class="w-full bg-gray-100 border-2 px-1 py-1 focus:outline-none text-sm" autocomplete="off"></textarea>
                    </div>

                    {{-- CC Number 0 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question_0">
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
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 1:
                                </label>
                                <input type="text" name="cc_questions[0][question]" id="cc_questions[0][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">1.</label>
                                    <input type="text" name="cc_questions[0][options][0]"
                                        id="cc_questions[0][options][0]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">2.</label>
                                    <input type="text" name="cc_questions[0][options][1]"
                                        id="cc_questions[0][options][1]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[0][options][0]">3.</label>
                                    <input type="text" name="cc_questions[0][options][2]"
                                        id="cc_questions[0][options][2]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">4.</label>
                                    <input type="text" name="cc_questions[0][options][3]"
                                        id="cc_questions[0][options]3]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">5.</label>
                                    <input type="text" name="cc_questions[0][options][4]"
                                        id="cc_questions[0][options][4]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- CC Number 1 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question_1">
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
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 2:
                                </label>
                                <input type="text" name="cc_questions[1][question]" id="cc_questions[1][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">1.</label>
                                    <input type="text" name="cc_questions[1][options][0]"
                                        id="cc_questions[1][options][0]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">2.</label>
                                    <input type="text" name="cc_questions[1][options][1]"
                                        id="cc_questions[1][options][1]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">3.</label>
                                    <input type="text" name="cc_questions[1][options][2]"
                                        id="cc_questions[1][options][2]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">4.</label>
                                    <input type="text" name="cc_questions[1][options][3]"
                                        id="cc_questions[1][options][3]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">5.</label>
                                    <input type="text" name="cc_questions[1][options][4]"
                                        id="cc_questions[1][options][4]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CC Number 2 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question_2">
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
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 3:
                                </label>
                                <input type="text" name="cc_questions[2][question]" id="cc_questions[2][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">1.</label>
                                    <input type="text" name="cc_questions[2][options][0]"
                                        id="cc_questions[2][options][0]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">2.</label>
                                    <input type="text" name="cc_questions[2][options][1]"
                                        id="cc_questions[2][options][1]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">3.</label>
                                    <input type="text" name="cc_questions[2][options][2]"
                                        id="cc_questions[2][options][2]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">4.</label>
                                    <input type="text" name="cc_questions[2][options][3]"
                                        id="cc_questions[2][options][3]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">5.</label>
                                    <input type="text" name="cc_questions[2][options][4]"
                                        id="cc_questions[2][options][4]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CC Number 3 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question_3">
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
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 4:
                                </label>
                                <input type="text" name="cc_questions[3][question]" id="cc_questions[3][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">1.</label>
                                    <input type="text" name="cc_questions[3][options][0]"
                                        id="cc_questions[3][options][0]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">2.</label>
                                    <input type="text" name="cc_questions[3][options][1]"
                                        id="cc_questions[3][options][1]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">3.</label>
                                    <input type="text" name="cc_questions[3][options][2]"
                                        id="cc_questions[3][options][2]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">4.</label>
                                    <input type="text" name="cc_questions[3][options][3]"
                                        id="cc_questions[3][options][3]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">5.</label>
                                    <input type="text" name="cc_questions[3][options][4]"
                                        id="cc_questions[3][options][4]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CC Number 4 --}}
                    <div class="set-question w-full flex flex-col border-2 border-black p-2 mb-3 rounded-md"
                        id="set_cc_question_4">
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
                                <span>4. I do not know what a CC is and I did not see one in this office. (Answer ‘N/A’
                                    on CC2 and CC3)</span>
                            </div>
                        </div>
                        {{-- Question Number and Questions --}}
                        <div class="mt-2 mb-3 flex flex-col gap-4">
                            <div class="gap-2 flex flex-col">
                                <label for="cc_questions[][question]" class="text-[15px] Reg-font">Citizen Charter
                                    Question 4:
                                </label>
                                <input type="text" name="cc_questions[4][question]" id="cc_questions[4][question]"
                                    class="w-full h-12 bg-gray-100 border-2 px-1 py-1 focus:outline-none text-md Reg-font"
                                    autocomplete="off">
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
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">1.</label>
                                    <input type="text" name="cc_questions[4][options][0]"
                                        id="cc_questions[4][options][0]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">2.</label>
                                    <input type="text" name="cc_questions[4][options][1]"
                                        id="cc_questions[4][options][1]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">3.</label>
                                    <input type="text" name="cc_questions[4][options][2]"
                                        id="cc_questions[4][options][2]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">4.</label>
                                    <input type="text" name="cc_questions[4][options][3]"
                                        id="cc_questions[4][options][3]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                                <div class="flex gap-2 w-full">
                                    <label for="cc_questions[][options][]">5.</label>
                                    <input type="text" name="cc_questions[4][options][4]"
                                        id="cc_questions[4][options][4]"
                                        class="w-full Reg-font bg-gray-100 border-2 px-1 py-0.5 focus:outline-none text-sm tracking-wide"
                                        autocomplete="off">
                                </div>
                            </div>
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
    const form = document.querySelector('form');
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);

            const data = {
                instruction: formData.get('instruction'),
                questions: [],
            };

            for (let i = 0; i < 5; i++) { // Assuming there are 5 sets of questions and options
                const question = formData.get(`cc_questions[${i}][question]`);
                const options = [];

                for (let j = 0; j < 5; j++) {
                    const option = formData.get(`cc_questions[${i}][options][${j}]`);
                    options.push(option);
                }

                data.questions.push({
                    description: question,
                    options: options,
                });
            }

            // Send all the data to the server using AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/indexAdmin/Create-CC-Questionnaire'
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content'), // Include the CSRF token
                    // formData: JSON.stringify(formData),
                    formData: data
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
