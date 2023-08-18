<x-admin-layout>
    {{-- <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" /> --}}
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin') }}
        </h2>
    </x-slot> --}}

    <div class="flex-1 p-6 bg-gray-100 rounded md:mt-0">
        <!-- General Report -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="flex flex-col card-body">
                        <!-- top -->
                        <div class="flex flex-row items-center justify-between">
                            <i class="text-4xl text-indigo-700 fa fa-city fa-flip" style="animation-duration: 3s"></i>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-2xl font-bold text-gray-700">{{ $records }}</h1>
                            <p class="text-xs text-white bg-indigo-400 rounded-full badge">RECORDS</p>
                        </div>
                    </div>
                </div>
                <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="flex flex-col card-body">
                        <div class="flex flex-row items-center justify-between">
                            <i class="text-4xl text-red-400 fa-solid fa-house-lock fa-flip" style="animation-duration: 3s"></i>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-2xl font-bold text-gray-700">{{ $reservation }}</h1>
                            <p class="text-xs text-white bg-red-400 rounded-full badge">RESERVATIONS</p>
                        </div>
                    </div>
                </div>
                <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="flex flex-col card-body">
                        <div class="flex flex-row items-center justify-between">
                            <i class="text-4xl text-yellow-700 fa fa-house fa-flip" style="animation-duration: 3s"></i>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-2xl font-bold text-gray-700">{{ $tamlik }}</h1>
                            <p class="text-xs text-white bg-yellow-700 rounded-full badge">TAMLIK</p>
                        </div>
                    </div>
                </div>
                <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="report-card">
                <div class="card">
                    <div class="flex flex-col card-body">
                        <div class="flex flex-row items-center justify-between">
                            <i class="text-4xl text-green-700 fa-solid fa-users fa-flip" style="animation-duration: 3s"></i>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-2xl font-bold text-gray-700">{{ $users }}</h1>
                            <p class="text-xs text-white bg-green-700 rounded-full badge">USERS</p>
                        </div>
                    </div>
                </div>
                <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
            </div>
            <!-- end card -->
        </div>
        <!-- End General Report -->

        <!-- Start Recent Sales -->
        <div class="col-span-2 mt-5 card xl:col-span-1">
            <div class="card-header">
                Files to prosses
            </div>

            <table class="w-full text-left table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-r"></th>
                        <th class="px-4 py-2 border-r">product</th>
                        <th class="px-4 py-2 text-right border-r">count</th>
                        <th class="px-4 py-2 text-right border-r">complete proceses</th>
                        <th class="px-4 py-2 text-right">delete all files</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    <tr>
                        <td class="px-4 py-2 text-center text-red-500 border border-l-0">
                            <i class="fa-solid fa-circle fa-beat-fade"></i>
                        </td>
                        <td class="px-4 py-2 border border-l-0">
                            Records
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            {{ $records_files }}
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            <form action="{{route('admin.add-records-files')}}" method="post" target="_blank">
                                @csrf
                                <button type="submit">
                                    <i class="text-xl text-green-700 fa-solid fa-sync fa-spin"></i>
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0 border-r-0">
                            <form action="{{ route('admin.remove-records-files') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="text-xl text-red-700 fa-solid fa-trash fa-bounce"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-center text-yellow-500 border border-l-0">
                            <i class="fa-solid fa-circle fa-beat-fade"></i>
                        </td>
                        <td class="px-4 py-2 border border-l-0">
                            Reservations
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            {{ $reservation_files }}
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            <form action="{{route('admin.add-reservation-files')}}" method="post" target="_blank">
                                @csrf
                                <button type="submit">
                                    <i class="text-xl text-green-700 fa-solid fa-sync fa-spin"></i>
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0 border-r-0">
                            <form action="{{ route('admin.remove-reservation-files') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="text-xl text-red-700 fa-solid fa-trash fa-bounce"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-center text-green-500 border border-l-0">
                            <i class="fa-solid fa-circle fa-beat-fade"></i>
                        </td>
                        <td class="px-4 py-2 border border-l-0">
                            New Hit Titling
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            {{ $tamlik_files }}
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0">
                            <form action="{{route('admin.add-tamlik-files')}}" method="post" target="_blank">
                                @csrf
                                <button type="submit">
                                    <i class="text-xl text-green-700 fa-solid fa-sync fa-spin"></i>
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-2 text-right border border-l-0 border-r-0">
                            <form action="{{ route('admin.remove-tamlik-files') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="text-xl text-red-700 fa-solid fa-trash fa-bounce"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- End Recent Sales -->
    </div>



</x-admin-layout>
