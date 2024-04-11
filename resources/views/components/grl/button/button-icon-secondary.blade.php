@props(['disabled'=>false])
<button {{ $attributes->merge(['disabled'=>$disabled,'class'=> "px-5 py-2.5 text-sm font-medium  inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-1 focus:outline-none focus:ring-gray-300 rounded-lg text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 disabled:cursor-not-allowed" ]) }}>
    {{ $slot }}
</button>
