@include('partials.headerAdmin')
<!-- Table of Survey Service External-->
<div class="flex justify-end mt-5">
    <a href="{{ route('generatePDF') }}" class="text-lg font-semibold px-4 py-2 bg-green-500 rounded-md mr-10">PDF</a>
</div>
<div class="md:w-full bg-white p-3 mt-2 mb-3 shadow-md rounded-lg ">
    <div class="w-full p-2">
        <h2 class="text-gray-500 text-lg font-semibold pb-1 capitalize"> Table 1.1: Overall Services Surveyed
            by the
            University</h2>
        <div class="my-1"></div> <!-- Separation space -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
    </div>
    <table class="w-full table-auto text-sm" id="serviceTable">
        <thead>
            <tr class="text-sm leading-normal">
                <th
                    class="py-2 px-4 bg-grey-lightest font-bold uppercase text-lg text-black border-b border-grey-light">
                    Overall Services
                </th>
                <th
                    class="py-2 px-4 bg-grey-lightest  font-bold uppercase text-lg text-black border-b border-grey-light">
                    Responses</th>
                <th
                    class="py-2 px-4 bg-grey-lightest  font-bold uppercase text-lg text-black border-b border-grey-light">
                    Total of Transaction
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getTotalServiceAvail as $serviceTitle => $count)
                <tr class="hover:bg-grey-lighter text-center">
                    <td class="py-2 px-4 border-b border-grey-light text-[13px] font-semibold">
                        {{ $serviceTitle }}</td>
                    <td class="py-2 px-4 border-b border-grey-light text-[15px] font-regular">
                        {{ $count }}</td>
                    <td class="py-2 px-4 border-b border-grey-light font-regular">{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@include('partials.footerAdmin')
