@props([
    'num' => null,
    'label',
    'description' => null,
    'active' => null,
    'extra_class' => null,
    'text_class' => null
])
<li {{ $attributes->merge(['class'=>"flex items-center text-gray-300 dark:text-gray-200 space-x-2.5 rtl:space-x-reverse  border-b border-b-slate-700 md:border-none cursor-pointer"]) }}>
    <span class="flex items-center justify-center w-8 h-8 border {{ $extra_class }} rounded-full shrink-0 ">
        {{  $num }}
    </span>
    <span>
        <h3 class="font-medium leading-tight {{ $text_class }}">{{ $label }}</h3>
        <p class="text-sm {{ $text_class }}">{{$description}}</p>
    </span>
</li>
