@include('partials.headerAdmin')
<div class="flex flex-col h-screen bg-gray-100">

    <!-- Top navigation bar -->
    <x-NavigationTop />

    <!-- Main content-->
    <div class="flex-1 flex flex-wrap">
        <!-- Navigation sidebar (hidden on small devices) -->
        <x-NavigationLeft />
        <!--Main Content Area-->
        <div class="flex-1 w-full md:w-1/2 bg-gray-200 min-h-screen ">
            <!-- component -->
            <div class="heading text-center Bold-font text-2xl m-5 text-gray-800">New Service</div>
            <form action="">
                <div
                    class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-xl max-w-2xl">

                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none Reg-font"
                        spellcheck="false" placeholder="Title" type="text">
                    <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none Reg-font" spellcheck="false"
                        placeholder="Describe everything here"></textarea>

                    <!-- icons -->
                    <div class="icons flex text-gray-500 m-2">
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <div class="count ml-auto text-gray-400 text-xs SemiB-font">0/300</div>
                    </div>
                    <!-- buttons -->
                    <div class="buttons flex">
                        {{-- <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                        Cancel</div> --}}
                        <div
                            class="btn border border-indigo-500 p-1 px-4 SemiB-font cursor-pointer text-gray-200 ml-2 bg-indigo-500 rounded">
                            <button type="submit">Upload</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('partials.footerAdmin')
