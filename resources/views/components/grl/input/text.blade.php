@props([
    "leadingAddOn"=>false
])
<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 {{ $leadingAddOn ? " focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600": ""  }} sm:max-w-md">
    @if("leadingAddOn")
     <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">{{ $leadingAddOn }}</span>
    @endif
    <input
        {{ $attributes }}
        class="block flex-1 bg-transparent py-1.5 pl-1 text-gray-200 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 border-0">

</div>
