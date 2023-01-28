<a
    {{ $attributes->merge([
        'class' =>
            'items-center px-10 py-2 text-lg font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
            
    ]) }}>
    {{ $slot }}
</a>
