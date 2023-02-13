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
                            <i class="text-4xl text-indigo-700 fa-regular fa-clipboard"></i>
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
                            <i class="text-4xl text-red-400 fa-solid fa-lock"></i>
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
                            <i class="text-4xl text-yellow-700 fa-regular fa-pen-to-square "></i>
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
                            <i class="text-4xl text-green-700 fa-solid fa-users"></i>
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
    </div>



</x-admin-layout>
