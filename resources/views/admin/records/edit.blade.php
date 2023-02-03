<x-admin-layout>
    <x-slot name="searchForm">
        <div class="relative mx-4 text-2xl lg:mx-0">
            <h1>{{ isset($record) ? __('تحديث بيانات سجل') : __('اضافة سجل') }}</h1>
        </div>
    </x-slot>

    <div class="flex py-2">
        <a href="{{ route('admin.records.index') }}"
            class="px-4 py-2 text-white transition-colors ease-out bg-indigo-600 rounded hover:bg-indigo-500">Back</a>
    </div>
    <div class="p-6 mx-auto bg-gray-100 rounded-lg ">
        <form method="POST"
            action="{{ isset($record) ? route('admin.records.update', $record->id) : route('admin.records.store') }}"
            class="space-y-5">
            @csrf
            @if (isset($record))
                @method('PUT')
            @endif
            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="number" class="text-lg">{{ __('العدد:') }}</label>
                    <input id="number" name="number" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->number : old('number') }}" {{ isset($record)?'':'autofocus' }}/>
                    @error('number')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="history" class="text-lg">{{ __('الشهر:') }}</label>
                    <input id="history" name="history" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->history : old('history') }}" />
                    @error('history')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="year" class="text-lg">{{ __('السنة:') }}</label>
                    <input id="year" name="year" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->year : old('year') }}" />
                    @error('year')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="skin" class="text-lg">{{ __('الجلد:') }}</label>
                    <input id="skin" name="skin" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->skin : old('skin') }}" />
                    @error('skin')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="owner_name" class="text-lg">{{ __('اسم المالك:') }}</label>
                    <input id="owner_name" name="owner_name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->owner_name : old('owner_name') }}" />
                    @error('owner_name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-initial w-28">
                    <label for="block_number" class="text-lg">{{ __('رقم القطعة:') }}</label>
                    <input id="block_number" name="block_number" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->block_number : old('block_number') }}" />
                    @error('block_number')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="district_name" class="text-lg">{{ __('اسم المقاطهة:') }}</label>
                    <input id="district_name" name="district_name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->district_name : old('district_name') }}" />
                    @error('district_name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="sex" class="text-lg">{{ __('جنس العقار:') }}</label>
                    <input id="sex" name="sex" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->sex : old('sex') }}" />
                    @error('sex')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-initial w-48">
                    <label for="transaction_type" class="text-lg">{{ __('نوع المعاملة:') }}</label>
                    <input id="transaction_type" name="transaction_type" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->transaction_type : old('transaction_type') }}" />
                    @error('transaction_type')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-4 text-right direction-rtl">
                <div class="flex-1">
                    <label for="meter" class="text-lg">{{ __('متر:') }}</label>
                    <input id="meter" name="meter" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->meter : old('meter') }}" />
                    @error('meter')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="olc" class="text-lg">{{ __('اولك:') }}</label>
                    <input id="olc" name="olc" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->olc : old('olc') }}" />
                    @error('olc')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="dunum" class="text-lg">{{ __('دونم:') }}</label>
                    <input id="dunum" name="dunum" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($record) ? $record->dunum : old('dunum') }}" />
                    @error('dunum')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <button type="submit"
                class="w-full py-3 mt-10 font-medium text-white uppercase transition-colors ease-out bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none hover:shadow-currentw-none">
                {{ isset($record) ? __('Update') : __('Store') }}
            </button>
        </form>
    </div>


</x-admin-layout>
