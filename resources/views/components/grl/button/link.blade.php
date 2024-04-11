@props(['href'=>false])
<a {{ $attributes->merge(['href'=>$href,'class'=>'inline-flex items-center md:py-2 cursor-pointer hover:text-gray-400']) }}>
    {{ $slot }}
</a>
