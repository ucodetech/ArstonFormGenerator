<button {{ $attributes->merge(['class'=>"inline-flex items-center justify-center rounded-md border-2 border-transparent bg-indigo-900 bg-none px-2 py-2 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-indigo-800 w-full"])}}>
    {{ $slot }}
</button>
