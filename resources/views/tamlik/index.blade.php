<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row-reverse justify-between">
            <h2 class="text-xl font-semibold leading-tight text-right text-gray-800">
                {{ __('تمليك هيت الجديد') }}
            </h2>
            <div>
                {{-- <a href="#" class="items-center px-10 py-2 text-lg font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">add</a> --}}

                {{-- <x-primary-button-link herf ='#'>{{ __('jh') }}</x-primary-button-link> --}}
            </div>
        </div>
    </x-slot>

    <div class="py-12 text-right direction-rtl">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-center text-gray-900 direction-rtl">
                    {{ __('التمليك الجديد') }}
                </div> --}}

                {{-- <form method="get" action="{{ route('tamliks.search') }}" class="px-20 py-10">
                    @csrf
                    <div class="flex gap-5">
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
                        <div class="flex-2">
                            <x-input-label for="serial_number" :value="__('التسلسل')" />
                            <x-text-input id="serial_number" name="serial_number" type="text" :value="old('serial_number')"
                                class="block w-full mt-1 " />
                            <x-input-error class="mt-2" :messages="$errors->get('serial_number')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('بحث') }}</x-primary-button>
                    </div>
                </form> --}}


                <form method="get" action="{{ route('tamliks.index') }}" class="px-20 py-10">
                    <div class="flex gap-5">
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
                        <div class="flex-2">
                            <x-input-label for="serial_number" :value="__('التسلسل')" />
                            <x-text-input id="serial_number" name="serial_number" type="text" :value="old('serial_number')"
                                class="block w-full mt-1 " />
                            <x-input-error class="mt-2" :messages="$errors->get('serial_number')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-5">
                        <x-primary-button>{{ __('بحث') }}</x-primary-button>
                    </div>
                </form>



                @if (isset($tamliks) && !$tamliks->isEmpty())
                    <div class="px-20 pb-10">
                        <div class="relative overflow-x-auto border shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-right text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            التسلسل
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            الاسم
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            رقم القطعة
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tamliks as $item)
                                        <tr class="text-right bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->serial_number }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->piece_number }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($tamliks->links()->paginator->hasPages())
                            <div class="flex justify-center mt-5 direction-ltr">
                                {{ $tamliks->links() }}
                            </div>
                        @endif



                    </div>
                @else
                    <h3 class="mb-5 text-2xl font-bold text-center text-gray-400">
                        لم يتم العثور على شيئ
                    </h3>
                @endif

            </div>
        </div>


    </div>
</x-app-layout>
