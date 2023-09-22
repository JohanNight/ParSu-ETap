@include('partials.headerAdmin')
<div class="min-h-screen bg-gray-200">
    <div class="p-2">
        <div class=" p-2 bg-red-500 rounded-md m-2 ">
            <button class="text-[20px] SemiB-font underline hover:text-blue-700">
                Return
            </button>
        </div>
        <div class="flex flex-col p-2 border-2 mt-2 w-full border-2 border-black">
            <div class="flex justify-center border-b-2 border-b-red-600">
                <header class="p-2 border-b-2 border-b-gray-400">
                    <h1 class=" Bold-font text-[30px]">
                        Service 1
                    </h1>
                </header>
            </div>
            <div class="flex justify-end p-2 mr-10 border-b-2 border-b-red-600">
                <button type="button" class="bg-blue-700 Reg-font text-[15px] p-2 text-white">
                    Assess All
                </button>
            </div>
            <div class="flex p-2 justify-between w-full border-2 border-red-600">
                <div class="flex px-4">
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
                <div class="tables">

                </div>

            </div>

        </div>

    </div>
</div>


@include('partials.footerAdmin')
