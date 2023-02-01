<x-admin-layout>

    <x-slot name="searchForm">
        <div class="relative mx-4 text-2xl lg:mx-0">
            <h1>{{ isset($tamlik) ? __('تحديث بيانات تمليك') : __('اضافة تمليك جديد') }}</h1>
        </div>
    </x-slot>


    <div class="flex py-2">
        <a href="{{ route('admin.tamliks.index') }}"
            class="px-4 py-2 text-white transition-colors ease-out bg-indigo-600 rounded hover:bg-indigo-500">Back</a>
    </div>
    <div class="p-6 mx-auto bg-gray-100 rounded-lg ">
        <form method="POST"
            action="{{ isset($tamlik) ? route('admin.tamliks.update', $tamlik->id) : route('admin.tamliks.store') }}"
            class="space-y-5">
            @csrf
            @if (isset($tamlik))
                @method('PUT')
            @endif
            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="name" class="text-lg">{{ __('رقم الكتاب:') }}</label>
                    <input id="name" name="book_number" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($tamlik) ? $tamlik->book_number : old('book_number') }}" />
                    @error('book_number')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-initial w-80">
                    <label for="name" class="text-lg">{{ __('الاسم:') }}</label>
                    <input id="name" name="name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($tamlik) ? $tamlik->name : old('name') }}" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex-1">
                    <label for="book_number" class="text-lg">{{ __('رقم العقار:') }}</label>
                    <input id="book_number" name="piece_number" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($tamlik) ? $tamlik->piece_number : old('piece_number') }}" />
                    @error('piece_number')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

            </div>





            <button type="submit"
                class="w-full py-3 mt-10 font-medium text-white uppercase transition-colors ease-out bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none hover:shadow-currentw-none">
                {{ isset($tamlik) ? __('Update') : __('Store') }}
            </button>
        </form>
    </div>


</x-admin-layout>
