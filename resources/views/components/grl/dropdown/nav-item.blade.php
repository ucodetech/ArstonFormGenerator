@props([
    'label' ,
    'href' => null,
    'pill' => false,
    'pill_count' => 0
])
<a
    href="{{ $href }}"
    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
>
    {{ $slot }}
    <span class="flex-1 ml-3 whitespace-nowrap">{{ $label }}</span>
    @if($pill)
        <span
            class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-red-800 bg-red-100 dark:bg-red-200 dark:text-red-800">
            {{ $pill_count }}
        </span>
    @endif
</a>
