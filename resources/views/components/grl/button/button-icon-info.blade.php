<button {{ $attributes->merge(['class'=>"px-5 py-2.5 text-sm font-medium  inline-flex items-center bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" ]) }}>
    {{ $slot }}
</button>
