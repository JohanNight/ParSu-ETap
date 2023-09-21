<div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
    <nav>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white Reg-font text-[15px]"
            href="#">
            {{-- {{ route('adminIndex') }} --}}
            <i class="fas fa-home mr-2"></i>Home
        </a>
        <div class="relative" x-data="{ open: false }"> <a
                class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white Reg-font text-[15px] "
                href="#">
                <i class="fas fa-file-alt mr-2"></i>
                <button type="button" id="buttonService" class="Reg-font text-[15px]" @click="open = !open"
                    data-dropdown-toggle="generate_service">Generate Service</button>

            </a>
            {{-- Dropdown column container  --}}
            <div class="block min-w-[200px] absolute top-[0px] left-[250px] bg-gray-300 pointer shadow-lg  z-10 rounded-lg "
                x-show="open" @click.away="open = false" id="generate_service" x-cloak>
                <div class="py-[10px] px-0 flex flex-col items-center">
                    <div class="generate_code_body ">
                        <header class="border-b-2 border-b-gray-600 text-center">
                            <h2 class="text-[20px] Reg-font text-gray-700">
                                Service
                            </h2>
                        </header>
                        <div class="mt-5 ">
                            {{--  --}}
                            <a href="{{ route('AddService') }}"
                                class="text-gray-600 Reg-font text-[15px] hover:text-blue-700">Add
                                New
                                Service</a>
                        </div>
                        <div class="mt-5 ">
                            {{-- {{ route('ServiceStorage') }} --}}
                            <a href="#" class="text-gray-600 Reg-font text-[15px] hover:text-blue-700">
                                Service Storage</a>
                        </div>
                        <div class="mt-5 ">
                            {{-- {{ route('ServiceDraft') }} --}}
                            <a href="#" class="text-gray-600 Reg-font text-[15px] hover:text-blue-700">Drafted
                                Service</a>
                        </div>
                        <div class="mt-5 ">
                            <a href="#" class="text-gray-600 Reg-font text-[15px] hover:text-red-700">Delete
                                Service</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white  pointer "
            href="#">
            {{-- {{ route('GenerateCode') }} --}}
            <div class=" mr-0 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                    <path
                        d="M200-400v-80h80v80h-80Zm-80-80v-80h80v80h-80Zm360-280v-80h80v80h-80ZM180-660h120v-120H180v120Zm-60 60v-240h240v240H120Zm60 420h120v-120H180v120Zm-60 60v-240h240v240H120Zm540-540h120v-120H660v120Zm-60 60v-240h240v240H600ZM360-400v-80h-80v-80h160v160h-80Zm40-200v-160h80v80h80v80H400Zm-190-90v-60h60v60h-60Zm0 480v-60h60v60h-60Zm480-480v-60h60v60h-60Zm-50 570v-120H520v-80h120v-120h80v120h120v80H720v120h-80Z" />
                </svg>
                <span class="Reg-font text-[15px]">Generate Code</span>
            </div>
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white Reg-font text-[15px]"
            href="#">
            <i class="fas fa-users mr-2"></i>Users

        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white "
            href="#">
            {{-- {{ route('Report') }} --}}
            <div class=" mr-0 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                    <path
                        d="M280-280h80v-200h-80v200Zm320 0h80v-400h-80v400Zm-160 0h80v-120h-80v120Zm0-200h80v-80h-80v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
                </svg>
                <span class="Reg-font text-[15px]">Report</span>
            </div>
        </a>
    </nav>

    <!-- Logout Item-->
    <form action="/logout" method="POST"
        class="block py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500  mt-auto">
        @csrf
        <button class="text-gray-500 hover:text-white  Reg-font text-[15px]" type="submit">
            <i class="fas fa-sign-out-alt mr-2"></i>Log Out
        </button>
    </form>

</div>
