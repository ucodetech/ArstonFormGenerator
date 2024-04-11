<button {{ $attributes->merge(['class'=>"text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium  text-sm px-2 py-5 text-center mr-2 mb-2"]) }}>
    {{ $slot }}
</button>
