<x-admin-layout>

    <x-slot name="searchForm">
        <div class="relative mx-4 lg:mx-0 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <form action="{{ route('admin.records.index') }}" method="get">
                <input
                    class="w-32 pl-10 pr-4 text-right rounded-md form-input sm:w-64 focus:border-indigo-600 direction-rtl"
                    type="text" name="search" value="{{ old('search') }}" placeholder="Search">
            </form>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-12">
        <div class="flex flex-row-reverse justify-between py-2 my-2">
            <a href="{{ route('admin.records.import') }} "
                class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-500">Import from Excel</a>


            <a href="{{ route('admin.records.create') }}"
                class="px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-500">{{ __('add') }}</a>

        </div>

        <div class="relative overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400 direction-rtl">
                <thead
                    class="sticky top-0 text-xs text-gray-100 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-4">
                            اسم المالك
                        </th>
                        <th scope="col" class="px-4 py-4">
                            رقم العقار
                        </th>
                        <th scope="col" class="px-6 py-4">
                            <span class="sr-only">
                                Edit
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($records as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{-- {{ substr($item->owner_name, 1,10).'..' }} --}}
                                {{ $item->owner_name }}
                            </th>
                            <th scope="row"
                                class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{-- {{ substr($item->owner_name, 1,10).'..' }} --}}
                                {{ $item->block_number }}
                            </th>

                            <td class="px-6 py-4 text-left">
                                <div class="flex float-left space-x-3">
                                    <a href="{{ route('admin.records.edit', $item->id) }}"
                                        class="ml-5 font-medium text-yellow-600 dark:text-blue-500 hover:underline">
                                        <svg class="w-6 h-6" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.records.destroy', $item->id) }}" method="post"
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
            {{ $records->onEachSide(1)->links() }}
        </div>
    </div>
</x-admin-layout>
