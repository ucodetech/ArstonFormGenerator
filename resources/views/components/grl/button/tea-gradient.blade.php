<button {{ $attributes->merge(['class'=>"text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm  text-center mr-2 mb-2"]) }} >
    {{ $slot }}
</button>
