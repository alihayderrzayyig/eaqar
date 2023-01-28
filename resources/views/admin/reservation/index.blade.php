<x-admin-layout>

    <x-slot name="searchForm">
        <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <form action="{{ route('admin.reservation.search') }}" method="get">
                @csrf
                <input
                    class="w-32 pl-10 pr-4 text-right rounded-md form-input sm:w-64 focus:border-indigo-600 direction-rtl"
                    type="text" name="name" value="{{ old('name') }}" placeholder="Search">
            </form>
        </div>

    </x-slot>

    <div class="relative max-w-6xl mx-auto mt-12">
        <div class="flex flex-row-reverse justify-between py-2 my-2">
            <a href="{{ route('admin.reservation.create') }} "
                class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-500">Import from Excel</a>

            <a href="#" class="px-4 py-2 text-white bg-green-800 rounded hover:bg-green-700">{{ __('add') }}</a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400 direction-rtl">
                <thead
                    class="sticky top-0 text-xs text-gray-100 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-4 px-4">
                            {{ __('الاسم') }}
                        </th>
                        <th scope="col" class="py-4 px-4">
                            {{ __('اسم الام') }}
                        </th>

                        <th scope="col" class="py-4 px-4">
                            {{ __('النوع') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">
                                Edit
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reservations as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ Str::limit($item->name, $limit = 30, $end = '...') }}
                            </th>
                            <th scope="row"
                                class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $item->mother_name }}
                            </th>
                            <th scope="row"
                                class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $item->book_type }}
                            </th>
                            <td class="px-6 py-4 text-left">
                                <div class="flex float-left space-x-3">
                                    <div>
                                        <!-- Modal toggle -->
                                        <button
                                            class="ml-4 font-medium text-green-700 dark:text-blue-500 hover:underline"
                                            id="open-btn" onclick="openModel('{{ $item->id }}')">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>

                                        <!-- Main modal -->
                                        <div class="fixed top-0 left-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-gray-900/80 direction-ltr"
                                            id="{{ $item->id }}">
                                            <div class="relative w-full max-w-2xl md:h-auto left-1/2"
                                                style="transform: translate(-50%,30%); height: fit-content !important">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            {{ $item->book_type }}
                                                        </h3>
                                                        <button type="button"
                                                            onclick="closeModel('{{ $item->id }}')"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="defaultModal">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                                                <h2 class="ml-2 text-lg font-bold">الاسم:</h2>
                                                                <h3 class="text-lg">{{ $item->name }}</h3>
                                                            </div>
                                                            <div class="flex items-center mr-5">
                                                                <h2 class="ml-2 text-lg font-bold">تاريخ الميلاد:</h2>
                                                                <h3 class="text-lg">{{ $item->birth }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="flex items-center">
                                                                <h2 class="ml-2 text-lg font-bold">اسم الام:</h2>
                                                                <h3 class="text-lg">{{ $item->mother_name }}</h3>
                                                            </div>
                                                            <div class="flex items-center mr-5">
                                                                <h2 class="ml-2 text-lg font-bold">العنوان:</h2>
                                                                <h3 class="text-lg">{{ $item->address }}</h3>
                                                            </div>
                                                        </div>

                                                        <div class="flex">
                                                            <div class="flex items-center">
                                                                <h2 class="ml-2 text-lg font-bold">رقم الكتاب:</h2>
                                                                <h3 class="text-lg">{{ $item->book_num }}</h3>
                                                            </div>
                                                            <div class="flex items-center mr-5">
                                                                <h2 class="ml-2 text-lg font-bold">تاريخ الكتاب:</h2>
                                                                <h3 class="text-lg">{{ $item->history }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="flex items-center">
                                                                <h2 class="ml-2 text-lg font-bold">المهنة:</h2>
                                                                <h3 class="text-lg">{{ $item->job }}</h3>
                                                            </div>
                                                            <div class="flex items-center mr-5">
                                                                <h2 class="ml-2 text-lg font-bold">الملاحظات:</h2>
                                                                <h3 class="text-lg">{{ $item->note }}</h3>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <!-- Modal footer -->
                                                    {{-- <div
                                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-hide="defaultModal" type="button"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                            accept</button>
                                                        <button data-modal-hide="defaultModal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href=""
                                        class="ml-5 font-medium text-yellow-600 dark:text-blue-500 hover:underline">
                                        <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.reservation.destroy', $item->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure?')"
                                        class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit">
                                            <svg class="w-6 h-6 text-red-500" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-5">
            {{ $reservations->onEachSide(1)->links() }}
        </div>
    </div>

    <script>
        let modalPopup;

        function openModel(x) {
            modalPopup = document.getElementById(x);
            modalPopup.style.display = 'grid';
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
</x-admin-layout>
