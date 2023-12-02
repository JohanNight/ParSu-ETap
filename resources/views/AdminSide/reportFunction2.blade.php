@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Top navigation bar -->
    <x-NavigationTop />

    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />

        <!--Main content area -->
        <div class="flex-1  py-2 px-4 w-full md:w-1/2 bg-gray-200 min-h-screen">
            <!--Filter--> <!--Assess-->
            <div class=" flex justify-center items-center gap-10 p-2 w-full  rounded-md bg-white mt-2 mb-3 shadow-md">

                <form action="{{ route('filterResult') }}" method="POST" class="flex gap-2">
                    @csrf
                    <div class=" bg-white border-2 p-2" id="fltr_from">
                        <label for="date_from" class="text-[18px] Reg-font ml-2">From:</label>
                        <input type="date"
                            name="date_from"class="p-1 rounded-md border-2 border-black focus:outline-none">
                    </div>
                    <div class=" bg-white border-2 p-2" id="fltr_to">
                        <label for="to_date" class="text-[18px] Reg-font ml-2">To:</label>
                        <input type="date"
                            name="to_date"class="p-1 rounded-md border-2 border-black focus:outline-none">
                        @error('to_date')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center">
                        <button type="submit" id="fltr_date"
                            class="text-[18px] Reg-font bg-green-300 active:bg-green-400 rounded-md px-3 py-1">
                            Filter
                        </button>
                    </div>

                </form>

                <form action="{{ route('assessResult') }}" method="POST" class="flex gap-2">
                    @csrf
                    <div class=" bg-white border-2 p-2">
                        <label for="Assess_From_date" class="text-[18px] Reg-font ml-2">From:</label>
                        <input type="date" name="Assess_From_date" id="assess_from"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                    </div>
                    <div class=" bg-white border-2 p-2">
                        <label for="Assess_date_To" class="text-[18px] Reg-font ml-2">To:</label>
                        <input type="date" name="Assess_date_To" id="assess_to"
                            class="p-1 rounded-md border-2 border-black focus:outline-none">
                        @error('Assess_date_To')
                            <p class="text-red-400 text-sm p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center">
                        <button type="submit" id="assess_report"
                            class="text-[18px] Reg-font bg-blue-700 active:bg-blue-800 rounded-md px-3 py-1 text-black">
                            Assess
                        </button>
                    </div>

                </form>

            </div>
            <!--Conatainer Card 1-->
            <div class="p-1 flex  justify-evenly gap-4 bg-white shadow-md rounded-lg w-full">
                <!-- Card 1-->
                <div class="bg-sky-500 rounded-md p-2">
                    <header class="p-1 ">
                        <h1 class="Bold-font text-[20px] text-white capitalize">
                            Total Number of Clients
                        </h1>
                    </header>
                    <div class="flex justify-between">
                        <div class="p-1 ml-2">
                            <span class="text-white SemiB-font text-[40px]">
                                {{ $totalClient }}
                            </span>
                        </div>
                        <div class="p-1 mr-2">
                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">
                                <!-- Paste your SVG code here -->
                                <?xml version="1.0" ?><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: none;
                                                stroke: #000;
                                                stroke-linecap: round;
                                                stroke-linejoin: round;
                                                stroke-width: 2px;
                                            }
                                        </style>
                                    </defs>
                                    <title />
                                    <g data-name="79-users" id="_79-users">
                                        <circle class="cls-1" cx="16" cy="13" r="5" />
                                        <path class="cls-1" d="M23,28A7,7,0,0,0,9,28Z" />
                                        <path class="cls-1" d="M24,14a5,5,0,1,0-4-8" />
                                        <path class="cls-1" d="M25,24h6a7,7,0,0,0-7-7" />
                                        <path class="cls-1" d="M12,6a5,5,0,1,0-4,8" />
                                        <path class="cls-1" d="M8,17a7,7,0,0,0-7,7H7" />
                                    </g>
                                </svg>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Card 2-->
                <div class="bg-yellow-300 rounded-md p-2">
                    <header class="p-1 ">
                        <h1 class="Bold-font text-[20px] text-white capitalize">
                            Service Distributed
                        </h1>
                    </header>
                    <div class="flex justify-between">
                        <div class="p-1 ml-2">
                            <span class="text-white SemiB-font text-[40px]">
                                {{ $totalClient }}
                            </span>
                        </div>
                        <div class="p-1 mr-2">
                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">
                                <!-- Paste your SVG code here -->
                                <?xml version="1.0" ?><svg id="Layer_1_1_" style="enable-background:new 0 0 64 64;"
                                    version="1.1" viewBox="0 0 64 64" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <circle cx="18" cy="23" r="1" />
                                        <circle cx="28" cy="23" r="1" />
                                        <path
                                            d="M47,57c5.514,0,10-4.486,10-10s-4.486-10-10-10s-10,4.486-10,10S41.486,57,47,57z M47,39c4.411,0,8,3.589,8,8s-3.589,8-8,8   s-8-3.589-8-8S42.589,39,47,39z" />
                                        <path
                                            d="M47,53c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S43.691,53,47,53z M47,43c2.206,0,4,1.794,4,4s-1.794,4-4,4   s-4-1.794-4-4S44.794,43,47,43z" />
                                        <path
                                            d="M55.671,12.743C56.528,11.886,57,10.747,57,9.536C57,7.035,54.965,5,52.464,5c-1.211,0-2.351,0.472-3.207,1.329L49,6.586   l-0.257-0.257C47.886,5.472,46.747,5,45.536,5C43.035,5,41,7.035,41,9.536c0,1.211,0.472,2.351,1.329,3.207L49,19.414   L55.671,12.743z M43,9.536C43,8.138,44.138,7,45.536,7c0.677,0,1.314,0.264,1.793,0.743L49,9.414l1.671-1.671   C51.15,7.264,51.787,7,52.464,7C53.862,7,55,8.138,55,9.536c0,0.677-0.264,1.314-0.743,1.793L49,16.586l-5.257-5.257   C43.264,10.85,43,10.213,43,9.536z" />
                                        <path
                                            d="M51.303,23H60c1.654,0,3-1.346,3-3V4c0-1.654-1.346-3-3-3H38c-1.654,0-3,1.346-3,3v3.038C32.262,3.381,27.909,1,23,1   C14.729,1,8,7.729,8,16v3h0.031C6.806,19.912,6,21.359,6,23c0,1.627,0.793,3.061,2,3.974V30v10.365l-1.804,0.481   C3.137,41.662,1,44.443,1,47.61V59h35.373l1.988,1.988l2.413-1.451c0.563,0.279,1.153,0.521,1.764,0.726L43.218,63h7.563   l0.681-2.737c0.611-0.205,1.201-0.447,1.764-0.726l2.413,1.451l5.348-5.348l-1.451-2.413c0.279-0.563,0.521-1.153,0.726-1.764   L63,50.782v-7.563l-2.737-0.681c-0.205-0.611-0.447-1.201-0.726-1.764l1.451-2.413l-5.348-5.348l-2.413,1.451   c-0.563-0.279-1.153-0.521-1.764-0.726L50.782,31h-7.563l-0.681,2.737c-0.611,0.205-1.201,0.447-1.764,0.726l-2.413-1.451   L38,33.373v-6.398c1.207-0.914,2-2.348,2-3.974h4v4.869L51.303,23z M10,16c0-7.168,5.832-13,13-13s13,5.832,13,13v2.101   C35.677,18.035,35.342,18,35,18h-1v-3h-2c0,1.654-1.346,3-3,3c-0.864,0-1.662-0.369-2.248-1.038L26,16.102l-0.752,0.861   c-1.171,1.338-3.324,1.338-4.495,0L20,16.102l-0.752,0.861C18.662,17.631,17.864,18,17,18c-1.654,0-3-1.346-3-3h-2v3h-1   c-0.342,0-0.677,0.035-1,0.101V16z M31,43.218v0.739l-2.316,4.478l-4.202-3.502l4.818-4.818l4.873,1.3   c-0.158,0.366-0.307,0.738-0.436,1.123L31,43.218z M22.721,53h0.559l1.333,4h-3.225L22.721,53z M23.5,51h-1l-1.976-2.635L23,46.302   l2.476,2.063L23.5,51z M16.701,40.115l4.818,4.818l-4.206,3.505l-3.89-7.449L16.701,40.115z M28,38.586l-5,5l-5-5v-0.8   C19.502,38.556,21.199,39,23,39s3.498-0.444,5-1.214V38.586z M23,37c-3.113,0-5.861-1.59-7.478-4h2.662   c0.414,1.161,1.514,2,2.816,2h4c1.654,0,3-1.346,3-3s-1.346-3-3-3h-4c-1.302,0-2.402,0.839-2.816,2h-3.659   C14.191,30.06,14,29.053,14,28v-9.002C14.836,19.626,15.875,20,17,20c1.086,0,2.138-0.363,3-1.018c1.725,1.311,4.275,1.311,6,0   C26.862,19.637,27.914,20,29,20c1.125,0,2.164-0.374,3-1.002V28C32,32.962,27.962,37,23,37z M20,32c0-0.551,0.449-1,1-1h4   c0.551,0,1,0.449,1,1s-0.449,1-1,1h-4C20.449,33,20,32.551,20,32z M11,20h1v6h-1c-1.654,0-3-1.346-3-3S9.346,20,11,20z M10,27.899   C10.323,27.965,10.658,28,11,28h1c0,1.041,0.155,2.045,0.426,3H11c-0.551,0-1-0.449-1-1V27.899z M10,32.816   C10.314,32.928,10.648,33,11,33h2.214c0.688,1.34,1.634,2.526,2.786,3.479v1.753l-6,1.6V32.816z M3,47.61   c0-2.262,1.526-4.249,3.712-4.831l4.73-1.262l5.245,10.045l2.298-1.915l1.9,2.534L19.279,57H11v-7H9v7H3V47.61z M26.721,57   l-1.607-4.819l1.9-2.534l2.302,1.918L31,48.31v2.471l2.737,0.681c0.205,0.611,0.447,1.201,0.726,1.764l-1.451,2.413l1.36,1.36   H26.721z M38.669,35.532l2.048,1.231l0.504-0.278c0.75-0.413,1.567-0.75,2.43-1l0.552-0.161L44.782,33h4.437l0.579,2.323   l0.552,0.161c0.862,0.25,1.68,0.587,2.43,1l0.504,0.278l2.048-1.231l3.137,3.137l-1.231,2.048l0.278,0.504   c0.413,0.75,0.75,1.567,1,2.43l0.161,0.552L61,44.782v4.437l-2.323,0.579l-0.161,0.552c-0.25,0.862-0.587,1.68-1,2.43l-0.278,0.504   l1.231,2.048l-3.137,3.137l-2.048-1.231l-0.504,0.278c-0.75,0.413-1.567,0.75-2.43,1l-0.552,0.161L49.218,61h-4.437l-0.579-2.323   l-0.552-0.161c-0.862-0.25-1.68-0.587-2.43-1l-0.504-0.278l-2.048,1.231l-3.137-3.137l1.231-2.048l-0.278-0.504   c-0.413-0.75-0.75-1.567-1-2.43l-0.161-0.552L33,49.218v-4.437l2.323-0.579l0.161-0.552c0.25-0.862,0.587-1.68,1-2.43l0.278-0.504   l-1.231-2.048L38.669,35.532z M36,35.373l-2.988,2.988l0.483,0.804L30,38.232v-1.753c2.441-2.019,4-5.07,4-8.479h1   c0.342,0,0.677-0.035,1-0.101V35.373z M35,26h-1v-6h1c1.654,0,3,1.346,3,3S36.654,26,35,26z M39.576,21   c-0.352-0.801-0.913-1.483-1.607-2H38v-3c0-1.883-0.364-3.679-1-5.34V4c0-0.551,0.449-1,1-1h22c0.551,0,1,0.449,1,1v16   c0,0.551-0.449,1-1,1h-9.303L46,24.131V21H39.576z" />
                                    </g>
                                </svg>
                            </svg>
                        </div>
                    </div>

                </div>
                <!-- Card 3-->
                <div class="bg-green-300 rounded-md p-2">
                    <header class="p-1 ">
                        <h1 class="Bold-font text-[20px] text-white capitalize">
                            Total Survey Answered
                        </h1>
                    </header>
                    <div class="flex justify-between">
                        <div class="p-1 ml-2">
                            <span class="text-white SemiB-font text-[40px]">
                                {{ $totalClient }}
                            </span>
                        </div>
                        <div class="p-1 mr-2">
                            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">
                                <!-- Paste your SVG code here -->
                                <?xml version="1.0" ?><svg id="Layer_1" style="enable-background:new 0 0 52 52;"
                                    version="1.1" viewBox="0 0 52 52" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #231F20;
                                        }
                                    </style>
                                    <g>
                                        <g>
                                            <path class="st0"
                                                d="M21.5782852,10.3674936c1.2400417-0.0005598,2.4800835-0.0011196,3.7201252-0.0016794    c0.7355385-0.0003319,2.7315521-0.3483133,3.2569904,0.1810932c0.3793411,0.3822079,0.1463146,2.7191763,0.1569691,3.2789068    c0.0106888,0.561573-0.1145077,1.4244776,0.0048904,1.9697609c-0.0044212,0.2188272-0.0088425,0.4376554-0.0132637,0.6564817    c0.6250477,0.0094376,0.6835594,0.0157299,0.1755371,0.0188751c-1.1189232,0.0623741-2.2506409,0.0349121-3.3712139,0.0522938    c-0.5157242,0.0079994-3.4013271,0.3998852-3.7083359,0.0575218c0.3247299,0.3621273,0.4035797-1.0150986,0.4075222-1.1579342    c0.0153694-0.5568781,0.0307388-1.1137562,0.0461082-1.6706343c0.0368881-1.3365088,0.0737743-2.6730165,0.1106625-4.0095243    c0.0399742-1.4483862-2.2100544-1.4473352-2.25,0c-0.0553303,2.0047617-0.1106625,4.0095243-0.1659927,6.014286    c-0.0305977,1.1086311-0.2396374,2.4276657,1.0045948,2.9363346c1.3995819,0.5721779,3.7527676,0.0923996,5.2296848,0.0694904    c1.1937447-0.0185165,3.2731438,0.4175377,4.2456684-0.4803295c0.9124107-0.8423653,0.5518169-2.6854019,0.5432129-3.8000679    c-0.0117054-1.5163822,0.2325382-3.7853918-0.3227863-5.2280102c-0.4610481-1.197711-1.5399399-1.1402636-2.6447029-1.1397648    c-2.1418896,0.0009661-4.2837791,0.0019331-6.4256706,0.0029001    C20.1305466,8.1181469,20.1280918,10.3681479,21.5782852,10.3674936L21.5782852,10.3674936z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M35.8278809,27.3316059c4.7568321-0.0409069,9.5136604-0.0818157,14.2704887-0.1227226    c-0.375-0.375-0.75-0.75-1.125-1.125c0.0414429,4.0355129,0.0828819,8.0710239,0.1243248,12.1065388    c0.056797,5.5308037,0.1310806,10.379631-7.1229591,10.6546135c-7.9579277,0.3016624-15.9839725,0.0178604-23.9484215,0.0217247    c-4.2928247,0.0020828-9.5419531,0.9958687-12.3579445-2.6046219c-2.7183428-3.4756393-2.5624075-7.7464485-2.5704005-11.921402    C3.0823939,26.2059612,3.0668194,18.0711861,3.051245,9.936409C3.0470426,7.741477,2.4525518,5.6699805,4.0526171,4.0592709    c1.5901256-1.6007044,3.7493858-1.0641196,5.9181986-1.1047766c4.2534695-0.0797367,8.5075989-0.1214294,12.7618237-0.1237001    c2.6265736-0.0014021,9.9826241-1.2197591,11.3033981,1.6215956c0.6222763,1.3386965-0.0182762,4.4836988-0.0240288,5.8950119    c-0.008007,1.965004-0.0160179,3.930007-0.024025,5.8950109c-0.0317497,7.7889481-0.3619537,15.6397152-0.0804482,23.4230042    c0.1768379,4.8893242,1.621563,9.5527534,6.7625313,10.9496727c1.3991165,0.3801689,1.9960861-1.7897758,0.5981407-2.1696281    c-6.1882248-1.6814804-5.122139-9.651619-5.1023064-14.518013c0.0173531-4.2575092,0.0347061-8.5150185,0.0520592-12.7725258    c0.0160179-3.9300079,0.0320358-7.8600149,0.0480537-11.7900229c0.0075569-1.8543549,1.0611496-6.7123313-0.3647614-8.1124887    c-1.0373077-1.0185721-3.0563354-0.6045309-4.3331776-0.6199483c-4.2538872-0.0513642-8.5082417-0.0646779-12.7623653-0.0385706    c-3.9268541,0.0240988-7.8535872,0.081202-11.7794819,0.1713045C5.5104737,0.799984,2.3901432,0.2669868,1.1929086,1.6583014    C0.0428983,2.9947364,0.7945648,6.4472346,0.7975071,7.9840631c0.0080987,4.2300835,0.0161974,8.4601679,0.0242961,12.6902514    s0.0161974,8.4601669,0.0242961,12.6902485c0.0062158,3.2465935-0.4724808,6.952877,0.663585,10.0737228    c1.4892719,4.0911255,3.511318,7.4721069,7.9038582,7.6826515c7.9324675,0.3802147,15.9814558-0.0077515,23.9243622-0.0116043    c4.8060684-0.0023308,14.124485,1.8599091,17.1277237-3.2558632c1.3390083-2.2808876,0.9270515-5.2822418,0.9011917-7.8005066    c-0.0478172-4.6563606-0.0956345-9.3127193-0.1434517-13.96908c-0.0062027-0.6042042-0.5103722-1.1302872-1.125-1.125    c-4.7568283,0.0409069-9.5136566,0.0818157-14.2704887,0.1227226    C34.3807564,25.0940514,34.377285,27.3440819,35.8278809,27.3316059L35.8278809,27.3316059z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M8.7031708,11.741396c2.083334,0,4.166667,0,6.25,0c1.4477673,0,1.4501667-2.25,0-2.25    c-2.083333,0-4.166666,0-6.25,0C7.2554035,9.491396,7.2530055,11.741396,8.7031708,11.741396L8.7031708,11.741396z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M9.2053328,17.3932877c1.6769991-0.1208153,3.3417206-0.0753326,5.0095415,0.1368427    c1.432519,0.1822395,1.4192314-2.0694513,0-2.250001c-1.6679029-0.2121849-3.3326254-0.2576504-5.0095415-0.1368418    C7.7695112,15.2467279,7.7581677,17.4975452,9.2053328,17.3932877L9.2053328,17.3932877z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M8.7079401,23.2412243c6.3320799,0.2412415,12.6641588,0.4824829,18.9962387,0.7237244    c1.4480438,0.0551682,1.4456825-2.1949215,0-2.25c-6.3320789-0.2412415-12.6641579-0.4824829-18.9962387-0.7237244    C7.2598977,20.9360561,7.2622581,23.1861458,8.7079401,23.2412243L8.7079401,23.2412243z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M8.9531708,30.866396c6.083334,0,12.1666679,0,18.25,0c1.4477673,0,1.4501667-2.25,0-2.25    c-6.0833321,0-12.166666,0-18.25,0C7.5054035,28.616396,7.5030055,30.866396,8.9531708,30.866396L8.9531708,30.866396z" />
                                        </g>
                                        <g>
                                            <path class="st0"
                                                d="M8.9540997,38.0286674c7.2554073-0.1603775,14.5035191-0.0772514,21.7532959,0.2494774    c1.4476376,0.0652428,1.4444103-2.1849022,0-2.25c-7.2498207-0.3267326-14.4979324-0.4098549-21.7532959-0.2494774    C7.5084171,35.810627,7.5032587,38.0607414,8.9540997,38.0286674L8.9540997,38.0286674z" />
                                        </g>
                                    </g>
                                </svg>
                            </svg>
                        </div>
                    </div>

                </div>

            </div>


            <!--Graph 1-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Survey Answered per Service</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {{-- <canvas id="usersChart[2]"></canvas> --}}
                    {!! $totalDataPerServices->container() !!}
                </div>
            </div>

            <!--Graph 2-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Users</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {{-- <canvas id="usersChart[2]"></canvas> --}}
                    {!! $totalClientUser->container() !!}
                </div>
            </div>

            <!--Graph 3-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Client Satisfaction</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {{-- <canvas id="usersChart[2]"></canvas> --}}
                    {!! $totalClientSatisfaction->container() !!}
                </div>
            </div>
            <!--Graph 4-->
            <div class="flex-1 bg-white p-4 shadow-md rounded-lg md:w-full mt-3">
                <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Citizens Charter Result</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!--Line with gradient-->
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- The canvas for the graph -->
                    {!! $totalCcOptions->container() !!}
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/Chart.min.js" charset="utf-8"></script>

{!! $totalDataPerServices->script() !!}
{!! $totalClientSatisfaction->script() !!}
{!! $totalClientUser->script() !!}
{!! $totalCcOptions->script() !!}
{{-- <script>
    ServiceBarChart();

    function ServiceBarChart() {
        const labels = ['Service1', 'Service2', 'Service3', 'Service4']; // Updated labels
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Survey Answered per Service',
                data: [65, 59, 80, 81], // Update this data with your specific values
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderWidth: 1,
            }],
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Prevent maintaining aspect ratio
            },
        };
        const ctx = document.getElementById('usersChart[2]').getContext('2d');
        new Chart(ctx, config);
    }
</script> --}}

<script>
    // date_autofill.js
    // Get the current date in the format "YYYY-MM-DD"
    var dateFrom = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("assess_from").value = dateFrom;

    // Get the current date in the format "YYYY-MM-DD"
    var dateTo = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("assess_to").value = dateTo;
</script>


@include('partials.footerAdmin')
