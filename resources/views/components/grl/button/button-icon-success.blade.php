<button {{ $attributes->merge(['class'=>"px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" ]) }}>
    {{ $slot }}
</button>
