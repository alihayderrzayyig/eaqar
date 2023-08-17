<x-admin-layout>

    <x-slot name="searchForm">
        <div class="relative mx-4 text-2xl lg:mx-0">
            <h1>{{ isset($user) ? __('تحديث مستخدم') : __('اضافة مستخدم') }}</h1>
        </div>
    </x-slot>

    <div class="flex py-2">
        <a href="{{ route('admin.users.index') }}"
            class="px-4 py-2 text-white transition-colors ease-out bg-indigo-600 rounded hover:bg-indigo-500">Back</a>
    </div>
    <div class="p-6 mx-auto bg-gray-100 rounded-lg ">
        <form method="POST"
            action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
            class="space-y-5">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="name" class="text-lg">Name</label>
                    <input id="name" name="name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($user) ? $user->name : old('name') }}" />
                    @error('name')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="name" class="text-lg">Email</label>
                    <input id="name" name="email" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($user) ? $user->email : old('email') }}" />
                    @error('email')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="role" class="text-lg">Role</label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Role</option>
                        <option value="1" @if (old('role') == '1') selected @endif
                            @if (isset($user) && $user->is_admin == 1) selected @endif>Admin</option>
                        <option value="0" @if (old('role') == '0') selected @endif
                            @if (isset($user) && $user->is_admin == 0) selected @endif>User</option>
                    </select>
                    @error('role')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="password" class="text-lg">Password</label>
                    <input id="password" name="password" type="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ isset($user) ? '' : '' }}" />
                    @error('password')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <button type="submit"
                class="w-full py-3 mt-10 font-medium text-white uppercase transition-colors ease-out bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none hover:shadow-currentw-none">
                {{ isset($user) ? __('Update') : __('Create') }}
            </button>
        </form>
    </div>


</x-admin-layout>
