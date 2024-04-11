@props(['disabled'=>false])
<button {{ $attributes->merge(['disabled'=>$disabled,'class'=> "hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm  text-center mr-2 mb-2 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" ]) }}>
    {{ $slot }}</button>
