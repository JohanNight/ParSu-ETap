@include('partials.headerAdmin')
<div class="min-h-screen bg-gray-200">
    <div class="p-2">
        <div class=" p-2 bg-red-500 rounded-md m-2 ">
            <button class="text-[20px] SemiB-font underline hover:text-blue-700">
                Return
            </button>
        </div>
        <div class="flex flex-col p-2 border-2 mt-2 w-full border-2 border-black">
            {{-- Title of Service --}}
            <div class="flex justify-center border-b-2 border-b-red-600">
                <header class="p-2 border-b-2 border-b-gray-400">
                    <h1 class=" Bold-font text-[30px]">
                        Service 1
                    </h1>
                </header>
            </div>
            {{-- Button to assesst all --}}
            <div class="flex justify-end p-2 mr-10 border-b-2 border-b-red-600">
                <button type="button" id="assess_id" class="bg-blue-700 Reg-font text-[15px] p-2 text-white">
                    Assess All
                </button>
            </div>
            {{-- Selection type --}}
            <div class="flex flex-col p-2 w-full border-2 border-red-600">
                <div class="flex justify-around px-4 w-full block">
                    <div class="p-2">
                        <label for="client_type" class="text-[18px] Reg-font capitalize">Client Type</label>
                        <select name="client_type" id="client_type"
                            class=" w-full p-2 text-[15px] Reg-font bg-white capitalize">
                            <option value=""></option>
                            <option value="Student">Student</option>
                            <option value="Personnel">Personnel</option>
                            <option value="Non-Personnel">Non-Personnel</option>
                            <option value="All">All</option>
                        </select>
                    </div>
                    <div class="p-2 flex">
                        <div class="flex flex-col ">
                            <label for="year" class="text-[18px] Reg-font capitalize text-center">Year</label>
                            <select name="year" id="year"
                                class=" w-48 p-2 text-[15px] Reg-font bg-white capitalize">
                                <option value=""></option>
                                <option value="2021">2021</option>
                                <option value=">2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="flex flex-col ">
                            <label for="month" class="text-[18px] Reg-font capitalize text-center">month</label>
                            <select name="month" id="month"
                                class="ml-2 w-48 p-2 text-[15px] Reg-font bg-white capitalize">
                                <option value=""></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="Personnel">october</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- main content --}}
                <div class="tables flex flex-col gap-2 p-1 block">
                    <div class="flex flex-col p-[10px] w-full">
                        <header class="flex justify-start">
                            <h1 class="text-[25px] SemiB-font tracking-wide">
                                CC1
                            </h1>
                        </header>
                        <div>
                            <table class="table-fixed w-full text-center">
                                <thead>
                                    <tr class="uppercase Bold-font ">
                                        <th class=" text-md py-3 px-6 border-collapse border border-slate-400">

                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            I know what a CC is and I saw this office’s CC.
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            I know what a CC is but I did NOT see this office’s CC.
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            I learned of the CC only when I saw this office’s CC.
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            .I do not know what a CC is and I did not see one in this office. (Answer
                                            ‘N/A’ on CC2 and CC3)
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            Which of the following best describes your awareness of a CC?</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            23</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            13</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            61</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            34</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            139</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex flex-col p-[10px] w-full">
                        <header class="flex justify-start">
                            <h1 class="text-[25px] SemiB-font tracking-wide">
                                CC2
                            </h1>
                        </header>
                        <div>
                            <table class="table-fixed w-full text-center">
                                <thead>
                                    <tr class="uppercase Bold-font ">
                                        <th class=" text-md py-3 px-6 border-collapse border border-slate-400">

                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Easy to see
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Somewhat easy to see
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Difficult to see
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Not visible at all
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            N/A
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            If aware of CC (answered 1-3 in CC1), would you say that the CC of this
                                            office was …?</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            23</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            13</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            61</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            34</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            22</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            153</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex flex-col p-[10px] w-full">
                        <header class="flex justify-start">
                            <h1 class="text-[25px] SemiB-font tracking-wide">
                                CC3
                            </h1>
                        </header>
                        <div>
                            <table class="table-fixed w-full text-center">
                                <thead>
                                    <tr class="uppercase Bold-font ">
                                        <th class=" text-md py-3 px-6 border-collapse border border-slate-400">

                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Helped very much
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Somewhat helped
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Did not help
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            N/A
                                        </th>
                                        <th scope="row"
                                            class=" text-md py-3 px-6 border-collapse border border-slate-400">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            If aware of CC (answered codes 1-3 in CC1), how much did the CC help you in
                                            your transaction?</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            23</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            13</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            61</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            34</td>
                                        <td scope="row"
                                            class="Reg-font text-md py-3 px-6 border-collapse border border-slate-400">
                                            153</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


@include('partials.footerAdmin')
