@include('partials.headerClient')

<div class="min-h-screen w-full bg-white">
    <div class="min-h-screen w-full bg-white flex items-center justify-center">
        <div class="p-10 flex flex-col items-center" id="thankYouSection">
            <div class="mb-2 flex flex-col items-center animate-[fade-in_1s_ease-in-out]">
                <h1 class="SemiB-font text-[50px] capitalize">
                    Thank you for your time!
                </h1>
                <span class="SemiB-font text-[50px] uppercase text-blue-700">{{ $names }}</span>
            </div>
            <div class="mt-2">
                <p class="text-center Med-font">Return to
                    <a href="{{ route('welcome') }}"
                        class="text-indigo-600 font-medium inline-flex space-x-1 items-center">
                        <span class="Reg-font">Home</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var thankYouSection = document.getElementById('thankYouSection');
        thankYouSection.classList.add('animate__animated', 'animate__fadeIn');
    });
</script>

@include('partials.footerClient')
