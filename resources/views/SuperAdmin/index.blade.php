@include('partials.headerAdmin')
<!-- component -->
<div class="flex flex-col min-h-screen bg-gray-100">

    <!-- Top navigation bar -->
    <x-NavigationTop />
    <!-- Main Content -->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />


        <!--Main content area -->
        <div class="flex-1 p-4 w-full md:w-1/2 bg-gray-200 min-h-screen">
            <!-- Search field -->
            <div class="relative max-w-md w-full">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input
                    class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                    type="search" placeholder="Search...">
            </div>

            <!--Conatainer Card 1-->
            <div class="p-2 flex  justify-around gap-4 bg-white shadow-md rounded-lg w-full mt-2">
                <!-- Card 1-->
                <div class="bg-sky-500 rounded-md p-2">
                    <div>
                        <header class="p-1 ">
                            <h1 class="Bold-font text-[18px] text-white capitalize">
                                Overall Total of Survey taken
                            </h1>
                        </header>
                        <div class="p-1 ml-2">
                            <span class="text-white SemiB-font text-[18px]">
                                Total: 60
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-evenly">
                        <!-- Student-->
                        <div class="p-1 ml-2 flex justify-center items-center">
                            <div>
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Paste your SVG code here -->
                                    <?xml version="1.0" ?><svg viewBox="0 0 256 256"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect fill="none" height="256" width="256" />
                                        <line fill="none" stroke="#000" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="16" x1="32" x2="32"
                                            y1="64" y2="144" />
                                        <path d="M54.2,216a88.1,88.1,0,0,1,147.6,0" fill="none" stroke="#000"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                        <polygon fill="none" points="224 64 128 96 32 64 128 32 224 64"
                                            stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="16" />
                                        <path d="M169.3,82.2a56,56,0,1,1-82.6,0" fill="none" stroke="#000"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    </svg>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center">
                                <header class="p-1 ">
                                    <h1 class="Bold-font text-[15px] text-black capitalize">
                                        Student
                                    </h1>
                                </header>
                                <span class="text-white SemiB-font text-[15px]">
                                    20
                                </span>
                            </div>

                        </div>
                        <!-- Personnel and Non-Personnel-->
                        <div class="p-1 ml-2 flex justify-center items-center">
                            <div>
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Paste your SVG code here -->
                                    <?xml version="1.0" ?><svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M276.12,208.05a33.7,33.7,0,0,0-33.27,28.56H230.5a33.65,33.65,0,1,0,0,10.2h12.35a33.65,33.65,0,1,0,33.27-38.76Zm-78.88,57.11a23.46,23.46,0,1,1,23.45-23.45A23.48,23.48,0,0,1,197.24,265.16Zm78.88,0a23.46,23.46,0,1,1,23.45-23.45A23.48,23.48,0,0,1,276.12,265.16Z" />
                                        <path
                                            d="M276.55,294.89a5.11,5.11,0,0,0-7,1.68c-.39.62-9.69,15.21-32.87,15.21s-32.49-14.59-32.85-15.18a5.1,5.1,0,0,0-8.75,5.25c.49.83,12.43,20.13,41.6,20.13s41.1-19.3,41.59-20.13A5.08,5.08,0,0,0,276.55,294.89Z" />
                                        <path
                                            d="M424.53,316.07a5.1,5.1,0,0,0-2.64-4c-14.12-7.68-28.07-44.27-8.63-113.58,13.75-49,10.57-97.2-8.49-128.92C393.44,50.7,376.82,38.4,356.72,34c-49.75-10.88-74.67,21.7-80,29.71A121.38,121.38,0,0,0,115.31,178.27a122.27,122.27,0,0,0,2.11,22.64,34.5,34.5,0,0,0,14.86,62.35A104.72,104.72,0,0,0,204,357.78l-1.37,5.46a8.47,8.47,0,0,1-6.9,6.33L141,378.29a60.21,60.21,0,0,0-50.89,55.88l-2.62,40.6a5.1,5.1,0,0,0,4.76,5.42h.33a5.1,5.1,0,0,0,5.09-4.77l2.62-40.6a50.07,50.07,0,0,1,42.31-46.47l45.87-7.3v94a5.1,5.1,0,0,0,10.2,0V415.05c7.62,6.3,20.05,13.17,38,13.17s30.41-6.87,38-13.17V475.1a5.1,5.1,0,0,0,10.2,0v-94l45.87,7.3a50.09,50.09,0,0,1,42.32,46.47l2.62,40.6a5.1,5.1,0,0,0,5.08,4.77h.33a5.11,5.11,0,0,0,4.77-5.42l-2.62-40.6a60.22,60.22,0,0,0-50.89-55.88l-54.75-8.72a8.49,8.49,0,0,1-6.92-6.33l-1.36-5.46A105.05,105.05,0,0,0,328,309.23c13.55,15.56,28.88,24.33,45.63,26.1a61.31,61.31,0,0,0,6.27.33c24.21,0,42-14.5,42.79-15.17A5.12,5.12,0,0,0,424.53,316.07Zm-299-137.8A111.17,111.17,0,1,1,346.4,196.18a34.21,34.21,0,0,0-10.32-1.58H334.5c-39.4-5.66-60.09-46.24-60.3-46.65a5.1,5.1,0,0,0-8.49-1C228,192.46,140,194.58,139.21,194.6h-1.93a34.66,34.66,0,0,0-10.34,1.58A112.58,112.58,0,0,1,125.51,178.27ZM260.83,365.71a18.66,18.66,0,0,0,13.88,13.67v21.15c-3,4-14.89,17.49-38,17.49s-35-13.47-38-17.48V379.38a18.66,18.66,0,0,0,13.88-13.67l1.3-5.21a104.9,104.9,0,0,0,45.71,0ZM263,349.06a4.86,4.86,0,0,0-1.07.16,4.63,4.63,0,0,0-1.22.48,94.45,94.45,0,0,1-48.15,0,4.56,4.56,0,0,0-1.21-.48,4.48,4.48,0,0,0-1.08-.16,94.46,94.46,0,0,1-67.93-90.54,5.1,5.1,0,0,0-5.1-5.1,24.31,24.31,0,0,1,0-48.62h2c3.66-.06,86.88-2,129.43-45.93,8.07,12.88,29.46,41,64.71,45.88a5.49,5.49,0,0,0,.7.05h1.94a24.31,24.31,0,1,1,0,48.62,5.1,5.1,0,0,0-5.1,5.1A94.47,94.47,0,0,1,263,349.06Zm111.57-23.89c-15.17-1.63-29.19-10.38-41.68-26a103.71,103.71,0,0,0,8.14-35.92,34.49,34.49,0,0,0,14.86-62.35A121.44,121.44,0,0,0,286.46,67.58c6-8.42,27.29-32.53,68.07-23.61C372.08,47.81,386,58.19,396,74.83c17.64,29.36,20.41,74.57,7.41,120.91-19.72,70.3-6.72,106.69,7.34,120.57C403.66,320.58,390.23,326.84,374.61,325.17Z" />
                                        <path
                                            d="M349.81,448.11H310.94a5.1,5.1,0,0,0,0,10.2h38.87a5.1,5.1,0,1,0,0-10.2Z" />
                                    </svg>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center">
                                <header class="p-1 ">
                                    <h1 class="Bold-font text-[15px] text-black capitalize">
                                        Personnel/Non-Personnel
                                    </h1>
                                </header>
                                <span class="text-white SemiB-font text-[15px]">
                                    20
                                </span>
                            </div>

                        </div>
                        <!-- Visitor-->
                        <div class="p-1 ml-2 flex justify-center items-center">
                            <div>
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Paste your SVG code here -->
                                    <?xml version="1.0" ?><svg fill="none" height="40" viewBox="0 0 20 20"
                                        width="40" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 9C8 7.89543 8.89543 7 10 7C11.1046 7 12 7.89543 12 9C12 10.1046 11.1046 11 10 11C8.89543 11 8 10.1046 8 9ZM10 8C9.44772 8 9 8.44772 9 9C9 9.55228 9.44772 10 10 10C10.5523 10 11 9.55228 11 9C11 8.44772 10.5523 8 10 8Z"
                                            fill="#212121" />
                                        <path
                                            d="M7.72077 12C7.10838 12 6.40961 12.4146 6.38992 13.1973C6.37693 13.7135 6.48426 14.4381 7.04816 15.0319C7.61451 15.6283 8.55301 16 10 16C11.447 16 12.3855 15.6283 12.9519 15.0319C13.5158 14.4381 13.6231 13.7135 13.6101 13.1973C13.5904 12.4146 12.8916 12 12.2793 12H7.72077ZM7.3896 13.2225C7.39099 13.1675 7.41262 13.1226 7.46275 13.082C7.51876 13.0366 7.6101 13 7.72077 13H12.2793C12.3899 13 12.4813 13.0366 12.5373 13.082C12.5874 13.1226 12.609 13.1675 12.6104 13.2225C12.6198 13.5933 12.5397 14.0138 12.2268 14.3433C11.9163 14.6702 11.2885 15 10 15C8.71154 15 8.08375 14.6702 7.77327 14.3433C7.46033 14.0138 7.38027 13.5933 7.3896 13.2225Z"
                                            fill="#212121" />
                                        <path
                                            d="M9 2C7.89543 2 7 2.89543 7 4H5.5C4.67157 4 4 4.67157 4 5.5V16.5C4 17.3284 4.67157 18 5.5 18H14.5C15.3284 18 16 17.3284 16 16.5V5.5C16 4.67157 15.3284 4 14.5 4H13C13 2.89543 12.1046 2 11 2H9ZM12.7324 5H14.5C14.7761 5 15 5.22386 15 5.5V16.5C15 16.7761 14.7761 17 14.5 17H5.5C5.22386 17 5 16.7761 5 16.5V5.5C5 5.22386 5.22386 5 5.5 5H7.26756C7.61337 5.5978 8.25972 6 9 6H11C11.7403 6 12.3866 5.5978 12.7324 5ZM8 4C8 3.44772 8.44772 3 9 3H11C11.5523 3 12 3.44772 12 4C12 4.55228 11.5523 5 11 5H9C8.44772 5 8 4.55228 8 4Z"
                                            fill="#212121" />
                                    </svg>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center">
                                <header class="p-1 ">
                                    <h1 class="Bold-font text-[15px] text-black capitalize">
                                        Visitor
                                    </h1>
                                </header>
                                <span class="text-white SemiB-font text-[15px]">
                                    20
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card 2-->
                <div class="bg-yellow-400 rounded-md p-2">
                    <header class="p-1 ">
                        <h1 class="Bold-font text-[18px] text-white capitalize">
                            Total No. Access of Citizen's Charter
                        </h1>
                    </header>
                    <div class="flex justify-between">
                        <div class="p-1 ml-2">
                            <span class="text-white SemiB-font text-[40px]">
                                45
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

            <!-- Graphics Container -->
            <div class="mt-6 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                <!-- First container -->
                <!-- Section 1 - User Chart -->
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Total Service Answered:Office: OVPAD
                    </h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    <!--Line with gradient-->
                    <div class="chart-container" style="position: relative; height:300px; width:100%">
                        <!-- The canvas for the graph -->
                        <canvas id="usersChart[1]"></canvas>
                    </div>
                </div>

                <!-- Second container -->
                <!-- Section 2 - FeedBack -->
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg SemiB-font pb-1 capitalize">Over All Feedback of Clients </h2>
                    <div class="my-1"></div> <!-- Separation space -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                    <!-- Line with gradient -->
                    <div class="chart-container" style="position: relative; height:300px; width:100%">
                        <!-- The canvas for the graph -->
                        <canvas id="commercesChart[2]"></canvas>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-4xl SemiB-font pb-4 capitalize">Total Service Available per Office/Campus
                </h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                {{-- <table class="w-full table-auto text-sm">
                    <thead class="text-left">
                        <tr class="text-sm leading-normal">

                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-grey-light border-b border-grey-light">
                                Office/Colleges</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest Bold-font uppercase text-lg text-grey-light border-b border-grey-light">
                                Number Of Services</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">

                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">Offices of the
                                Presidents</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">1</td>
                        </tr>
                        <!-- Add more rows here like the one above for each pending authorization -->
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">

                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">OVPAA</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">2</td>
                        </tr>
                        </tr>
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">

                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">OVPAD</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">3</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">

                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">OVPREA</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">4</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">

                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">COED</td>
                            <td class="py-2 px-4 border-b border-grey-light text-[15px] Reg-font">5</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter mt-2 mb-3">
                            <td class="py-2 px-4 border-b border-grey-light Bold-font text-[25px]">ToTal</td>
                            <td class="py-2 px-4 border-b border-grey-light SemiB-font text-[20px]">100</td>
                        </tr>
                    </tbody>
                </table> --}}

                <div class="flex gap-2 justify-evenly">
                    <table class=" border-r-2 border-r-black">
                        <tbody class="leading-tight">
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OP
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAD
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPREA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    COED
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    6
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    7
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CBM
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    8
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OSAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    9
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    URO
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    10
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CASHIER
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    11
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    BUDGET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    12
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class=" border-r-2 border-r-black">
                        <tbody class="leading-tight">
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OP
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAD
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPREA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    COED
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    6
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    7
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CBM
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    8
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OSAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    9
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    URO
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    10
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CASHIER
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    11
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    BUDGET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    12
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class=" border-r-2 border-r-black">
                        <tbody class="leading-tight">
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OP
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAD
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPREA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    COED
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    6
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    7
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CBM
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    8
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OSAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    9
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    URO
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    10
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CASHIER
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    11
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    BUDGET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    12
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class=" border-r-2 border-r-black">
                        <tbody class="leading-tight">
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OP
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPAD
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    3
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    OVPREA
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    COED
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    6
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CET
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    7
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font ">
                                    CBM
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500 ">
                                    8
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 text-[15px] SemiB-font">
                                    OSAS
                                </td>
                                <td class="py-2 px-4 text-[15px] SemiB-font text-sky-500">
                                    9
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-2 border-2 border-black rounded-lg h-full">
                        <span class="text-[20px] SemiB-font">
                            Total: 100
                        </span>
                    </div>

                </div>

            </div>

            <!-- Third container below the previous two -->
            <!-- Section 3 - Table of Pending Authorizations -->
            <div class="mt-8 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-4xl SemiB-font pb-4 capitalize">Pending Authorizations</h2>
                <div class="my-1"></div> <!-- Separation space -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <!-- Line with gradient -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Photo</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Name</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                    alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                            <td class="py-2 px-4 border-b border-grey-light">Juan Pérez</td>
                            <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                        </tr>
                        <!-- Add more rows here like the one above for each pending authorization -->
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                    alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                            <td class="py-2 px-4 border-b border-grey-light">María Gómez</td>
                            <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                        </tr>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                    alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                            <td class="py-2 px-4 border-b border-grey-light">Carlos López</td>
                            <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                    alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                            <td class="py-2 px-4 border-b border-grey-light">Laura Torres</td>
                            <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                    alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                            <td class="py-2 px-4 border-b border-grey-light">Ana Ramírez</td>
                            <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                        </tr>
                    </tbody>
                </table>
                <!-- "See more" button for the Pending Authorizations table -->
                <div class="text-right mt-4">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                        See more
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@include('partials.footerAdmin')
