<div class="bg-blue-700 text-white shadow w-full p-2 flex items-center justify-between ">
    <div class="flex items-center">
        <div class="flex items-center"> <!-- Shown on all devices -->
            <h2 class="Bold-font text-xl text-yellow-400">ParSU E-Tap</h2>
        </div>
        <div class="md:hidden flex items-center sm:ml-[20px]"> <!-- Shows only on small devices -->
            <button id="menuBtn">
                <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Menu icon -->
            </button>
        </div>
    </div>

    <!-- Notification and Profile Icon -->
    <div class="space-x-5">
        {{-- <button>
            <i class="fas fa-bell text-gray-500 text-lg"></i>
        </button> --}}

        <div class="account-wrap relative mr-[50px]" x-data="{ open: false }">
            <div class="account_items" type="button" @click="open = !open" data-dropdown-toggle="account_dropdown">
                {{-- image below --}}
                <div class="image  w-[50px] h-[50px] float-left overflow-hidden rounded-[3px]"><img
                        src="https://res.cloudinary.com/dboafhu31/image/upload/v1625318266/imagen_2021-07-03_091743_vtbkf8.png"
                        alt="Your Image" class="w-full h-auto">
                </div>
                {{-- name of User or User name below --}}
                <div class="content ml-[45px] py-[9px] pl-[12px]"><a href="#"
                        class="text-yellow-500 uppercase SemiB-font text-[15px] inline-block ">Admin</a>
                </div>
                {{-- Dropdown column contains acc. management, settings, and logout --}}
                <div class=" drop-down min-w-[305px] absolute top-[58px] right-0 bg-gray-300 pointer shadow-lg origin-[right top] z-10 rounded-lg"
                    x-show="open" @click.away="open = false" id="account_dropdown" x-cloak>
                    <div class="account-dropodown_head info p-[25px] border-b-2 border-solid border-gray-400">
                        <div class="image  float-left h-[65px] w-[65px] overflow-hidden rounded-[3px]">
                            <img src="https://res.cloudinary.com/dboafhu31/image/upload/v1625318266/imagen_2021-07-03_091743_vtbkf8.png"
                                alt="Your Image" class="w-full h-auto">
                        </div>
                        <div class="content ml-[65px] py-[11] pl-[12px]">
                            <h5 class="name text-gray-700 font-bold m-2" style="line-height: calc(20/16)">
                                <a href="#" class="text-gray-700 text-[18px] capitalize inline-block SemiB-font ">
                                    Admin</a>
                            </h5>
                            <span
                                class="email text-[14px] text-gray-500 leading-[calc(20/13)] Reg-font">admin@gmail.com</span>
                        </div>

                    </div>
                    <div class="account-dropdown_body py-[12px] px-0 border-b-2 border-solid border-gray-400">
                        <div class="account-dropdown_item">
                            {{-- Account Route  --}}
                            <a href="{{ route('Account') }}"
                                class="block text-gray-600 py-[15px] px-[25px] text-[16px] hover:bg-blue-600 hover:text-gray-800 Reg-font">Account</a>
                        </div>
                        <div class="account-dropdown_item"><a href="#"
                                class="block text-gray-600 py-[15px] px-[25px] text-[16px] hover:bg-blue-600 hover:text-gray-800 Reg-font">Settings</a>
                        </div>

                    </div>
                    {{-- <div class="account-dropdown_footer border-t-[1px] border-solid border-t-gray-200">
                        <a href="#"
                            class="block text-gray-700 py-[15px] px-[25px] text-[16px] capitalize hover:bg-red-500 hover:text-gray-800 Reg-font">Log
                            Out</a>{{-- make this a form to end the session 
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
