<a {{ $attributes->merge(['href'=>$href,'class'=>'px-2 py-2 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' ]) }}>
    {{ $slot }}
</a>
