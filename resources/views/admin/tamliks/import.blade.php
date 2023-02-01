<x-admin-layout>

    <x-slot name="searchForm">
        <div class="relative mx-4 text-2xl lg:mx-0">
            <h1>{{ __('ادخال ملف اكسل الى التمليك الجديد') }}</h1>
        </div>
    </x-slot>

    <div class="flex py-2">
        <a href="{{ route('admin.tamliks.index') }}"
            class="px-4 py-2 text-white transition-colors ease-out bg-indigo-600 rounded hover:bg-indigo-500">Back</a>
    </div>
    <div class="p-6 mx-auto bg-gray-100 rounded-lg ">
        <form method="POST" action="{{ route('admin.tamliks.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="file" class="text-lg">Name</label>
                    <input id="file" name="file" type="file"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    @error('file')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="w-full py-3 mt-10 font-medium text-white uppercase transition-colors ease-out bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none hover:shadow-currentw-none">
                {{ __('Store') }}
            </button>
        </form>
    </div>


</x-admin-layout>
