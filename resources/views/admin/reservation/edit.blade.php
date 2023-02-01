<x-admin-layout>



    <x-slot name="searchForm">
        <div class="relative mx-4 text-2xl lg:mx-0">
            <h1>{{  isset($reservation)?__('تحديث بيانات حجز'):__('اضافة حجز') }}</h1>
        </div>
    </x-slot>


    <div class="flex py-2">
        <a href="{{ route('admin.reservations.index') }}"
            class="px-4 py-2 text-white transition-colors ease-out bg-indigo-600 rounded hover:bg-indigo-500">Back</a>
    </div>
    <div class="p-6 mx-auto bg-gray-100 rounded-lg ">
        <form method="POST"
            action="{{ isset($reservation) ? route('admin.reservations.update', $reservation->id) : route('admin.reservations.store') }}"
            class="space-y-5">
            @csrf
            @if (isset($reservation))
                @method('PUT')
            @endif
            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="name" class="text-lg">{{ __('الاسم:') }}</label>
                    <input id="name" name="name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->name : old('name') }}" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-initial w-70">
                    <label for="mother_name" class="text-lg">{{ __('اسم الام:') }}</label>
                    <input id="mother_name" name="mother_name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->mother_name : old('mother_name') }}" />
                    @error('mother_name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-initial w-70">
                    <label for="birth" class="text-lg">{{ __('تاريخ الميلاد:') }}</label>
                    <input id="birth" name="birth" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->birth : old('piece_number') }}" />
                    @error('birth')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="address" class="text-lg">{{ __('العنوان:') }}</label>
                    <input id="address" name="address" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->address : old('address') }}" />
                    @error('address')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="job" class="text-lg">{{ __('المهنة:') }}</label>
                    <input id="job" name="job" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->job : old('job') }}" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="book_num" class="text-lg">{{ __('رقم الكتاب:') }}</label>
                    <input id="book_num" name="book_num" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->book_num : old('book_num') }}" />
                    @error('book_num')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="history" class="text-lg">{{ __('تاريخ الكتاب:') }}</label>
                    <input id="history" name="history" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->history : old('history') }}" />
                    @error('history')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="book_type" class="text-lg">{{ __('نوع الكتاب:') }}</label>
                    <input id="book_type" name="book_type" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->book_type : old('book_type') }}" />
                    @error('book_type')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="disc_num" class="text-lg">{{ __('القرص:') }}</label>
                    <input id="disc_num" name="disc_num" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->disc_num : old('disc_num') }}" />
                    @error('disc_num')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="note" class="text-lg">{{ __('الملاحظات:') }}</label>
                    <input id="note" name="note" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($reservation) ? $reservation->note : old('note') }}" />
                    @error('note')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <button type="submit"
                class="w-full py-3 mt-10 font-medium text-white uppercase transition-colors ease-out bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none hover:shadow-currentw-none">
                {{ isset($reservation) ? __('Update') : __('Store') }}
            </button>
        </form>
    </div>


</x-admin-layout>
