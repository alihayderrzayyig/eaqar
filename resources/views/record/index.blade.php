<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row-reverse justify-between">
            <h2 class="text-xl font-semibold leading-tight text-right text-gray-800">
                {{ __('سجـــــلات الـتـــــــمليك') }}
            </h2>
            <div>
                {{-- <a href="#" class="items-center px-10 py-2 text-lg font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">add</a> --}}

                {{-- <x-primary-button-link herf ='#'>{{ __('jh') }}</x-primary-button-link> --}}
            </div>
        </div>
    </x-slot>

    <div class="py-12 text-right direction-rtl">
        <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <form method="get" action="{{ route('record.index') }}" class="px-20 py-10">
                    <div class="block gap-5 sm:flex">
                        <div class="flex-1">
                            <x-input-label for="name" :value="__('الاسم')" />
                            <x-text-input id="name" name="name" type="text" :value="old('name')"
                                class="block w-full mt-1" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="flex-2">
                            <x-input-label for="piece_number" :value="__('رقم القطعة')" />
                            <x-text-input id="piece_number" name="piece_number" type="text" :value="old('piece_number')"
                                class="block w-full mt-1 " />
                            <x-input-error class="mt-2" :messages="$errors->get('piece_number')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('بحث') }}</x-primary-button>
                    </div>
                </form>



                @if (isset($records) && !$records->isEmpty())
                    <div class="px-20 pb-10">
                        <div class="relative overflow-x-auto border shadow-md sm:rounded-lg">
                            <table class="w-full text-lg text-left text-gray-700 dark:text-gray-400">
                                <thead
                                    class="text-xs text-right text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            اسم المالك
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            رقم العقار
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            المقاطعة
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            نوع المعاملة
                                        </th>
                                         <th scope="col" class="px-6 py-3">
                                            التفاصيل
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $item)
                                        <tr class="text-right bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->owner_name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('record.index') }}" method="get">
                                                    <input type="hidden" name="details"
                                                        value="{{ $item->block_number }}">
                                                    <button type="submit">
                                                        {{ $item->block_number }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->district_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->transaction_type }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div>
                                                    <!-- Modal toggle -->
                                                    <button
                                                        class="ml-4 font-medium text-green-700 dark:text-blue-500 hover:underline"
                                                        id="open-btn" onclick="openModel('{{ $item->id }}')">
                                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>

                                                    <!-- Main modal -->
                                                    <div class="fixed top-0 left-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-gray-900/80 direction-ltr"
                                                        id="{{ $item->id }}">
                                                        <div class="relative w-full max-w-2xl md:h-auto left-1/2"
                                                            style="transform: translate(-50%,10%); height: fit-content !important">
                                                            <!-- Modal content -->
                                                            <div
                                                                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                                    <h3
                                                                        class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                        {{ $item->owner_name }}
                                                                    </h3>
                                                                    <button type="button"
                                                                        onclick="closeModel('{{ $item->id }}')"
                                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                        data-modal-hide="defaultModal">
                                                                        <svg aria-hidden="true" class="w-5 h-5"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="p-6 space-y-3 text-right direction-rtl">
                                                                    <div class="flex">
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('المالك:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">{{ $item->owner_name }}
                                                                            </h3>
                                                                        </div>
                                                                        <div class="flex items-center mr-5">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('رقم العقار:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->block_number }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex">
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('المقاطعة:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->district_name }}</h3>
                                                                        </div>
                                                                        <div class="flex items-center mr-5">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('نوع المعاملة:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->transaction_type }}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="flex items-center ml-2">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('الجنس:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->sex }}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <h3>
                                                                        {{ __("قيد التسجيل") }}
                                                                    </h3>
                                                                    <div class="flex">
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('العدد:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->number }}</h3>
                                                                        </div>
                                                                        <div class="flex items-center mr-5">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('التاريخ:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->history." ".$item->year }}</h3>
                                                                        </div>
                                                                        <div class="flex items-center mr-5">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                                {{ __('السجل:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->skin }}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                     <h3>
                                                                        {{ __("المساحة") }}
                                                                    </h3>
                                                                    <div class="flex justify-between">
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                               {{ __('متر:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->meter }}
                                                                            </h3>
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                               {{ __('اولك:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->olc }}
                                                                            </h3>
                                                                        </div>
                                                                        <div class="flex items-center">
                                                                            <h2 class="ml-2 text-lg font-bold">
                                                                               {{ __('دونم:') }}
                                                                            </h2>
                                                                            <h3 class="text-lg">
                                                                                {{ $item->dunum }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($records->links()->paginator->hasPages())
                            <div class="flex justify-center mt-5 direction-ltr">
                                {{ $records->links() }}
                            </div>
                        @endif



                    </div>
                @else
                    @if (isset($details) && !$details->isEmpty())
                        <div class="px-20 pb-10">
                            <div class="relative overflow-x-auto border shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-right text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                العدد
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                التاريخ
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                الجلد
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                اسم المالك
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                رقم العقار
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                نوع المعاملة
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                جنس العقار
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $item)
                                            <tr
                                                class="text-right bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->number }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->history . ' ' . $item->year }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->skin }}
                                                </td>
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->owner_name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <form action="{{ route('record.index') }}" method="get">
                                                        <input type="hidden" name="details"
                                                            value="{{ $item->block_number }}">
                                                        <button type="submit">
                                                            {{ $item->block_number }}
                                                        </button>
                                                    </form>
                                                </td>

                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->transaction_type }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->sex }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <h3 class="mb-5 text-2xl font-bold text-center text-gray-400">
                            لم يتم العثور على شيئ
                        </h3>
                    @endif
                @endif

            </div>
        </div>


    </div>
    <script>
        let modalPopup;

        function openModel(x) {
            modalPopup = document.getElementById(x);
            modalPopup.style.display = 'block';
        }

        function closeModel(y) {
            modalPopup = document.getElementById(y);
            modalPopup.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modalPopup) {
                modalPopup.style.display = "none";
            }
        }
    </script>
</x-app-layout>
