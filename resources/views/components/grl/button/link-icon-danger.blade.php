<a {{ $attributes->merge(['href'=>$href,'class'=>'px-3 py-2.5 text-sm font-medium text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800' ]) }}>
    {{ $slot }}
</a>
