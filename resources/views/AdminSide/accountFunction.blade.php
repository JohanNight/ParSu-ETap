@include('partials.headerAdmin')
<div class="flex flex-col min-h-screen bg-gray-100">

    <!-- Top navigation bar -->
    <x-NavigationTop />

    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class=" flex-1 w-full md:w-1/2 bg-gray-200 min-h-screen px-2 pt-3">
            <!-- component -->
            <form action="/indexAdmin/account" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class=" md:grid grid-cols-4 grid-rows-2  bg-white gap-2 p-4 rounded-xl">
                    <div class="md:col-span-1 h-60 shadow-xl ">
                        <div class="flex w-full h-full relative">
                            <img src="{{ $user->getImageURL() }}" class="w-44 h-44 m-auto rounded-lg" alt="">

                        </div>
                    </div>
                    <div class="md:col-span-3 shadow-xl p-4 space-y-2 p-3 w-full">
                        <div class="flex ">
                            <label name="name"
                                class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Name:</label>
                            <input name="name"
                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                type="text" value="{{ $user->name }}" autocomplete="off" />
                        </div>
                        <div class="flex ">
                            <label name="email"
                                class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Email:</label>
                            <input name="email"
                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                type="text" value="{{ $user->email }}" autocomplete="off" />
                        </div>
                        <div class="flex ">
                            <span
                                class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Role:</span>
                            {{-- <input name="position"
                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                type="text" value="Admin" readonly /> --}}
                            <p
                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6">
                                Admin
                            </p>
                        </div>
                        <div class="flex ">
                            <label name="user_image"
                                class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Image:</label>
                            <input type="file" name="user_image"
                                class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                                value="{{ $user->user_image }}" />
                        </div>
                    </div>
                    <div class="md:col-span-3 h-48 shadow-xl p-4 space-y-2 hidden md:block border-2 ">
                        <label name="bio"class="font-bold uppercase"> Office Description</label>
                        <textarea name="bio" rows="5"
                            class=" px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-md -ml-1 w-full h-46 text-justify text-sm Reg-font tracking-tight align-baseline leading-6">{{ $user->bio }}
                            
                        </textarea>
                    </div>
                    <div class="h-48 shadow-xl w-full p-4 space-y-2 md:block">
                        <div class="mt-2 ">
                            <button type="submit"
                                class="SemiB-font text-[20px] bg-green-500 p-2 rounded-lg w-full active:bg-green-600 capitalize">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@include('partials.footerAdmin')
