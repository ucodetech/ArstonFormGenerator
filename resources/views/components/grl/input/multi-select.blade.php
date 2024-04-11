@props(['error'=>false, 'label'=>null, 'required'=>false])
<div class="">
    <label class="mb-3">{{ $label }} @if ($required)<span class="text-red-500">*</span>@endif</label>
     <div x-data="{
            options: [],
            open: false,
            filter: ''
        }" class="w-full relative" {{ $attributes->except('wire:model') }}>
        <div x-on:click="open = !open" class="p-3 rounded-lg flex gap-2 w-full border border-neutral-500 cursor-pointer truncate h-12 bg-white dark:bg-gray-700" x-text="options.length + ' items selected'">
        </div>
        <div class="p-3 rounded-lg flex gap-3 w-full shadow-lg x-50 absolute z-10 flex-col bg-white dark:bg-gray-700 mt-3 text-gray-800" x-show="open" x-trap="open" x-on:click.outside="open = false" @keydown.escape.window="open = false" x-transition:enter=" ease-[cubic-bezier(.3,2.3,.6,1)] duration-200" x-transition:enter-start="!opacity-0 !mt-0" x-transition:enter-end="!opacity-1 !mt-3" x-transition:leave=" ease-out duration-200" x-transition:leave-start="!opacity-1 !mt-3" x-transition:leave-end="!opacity-0 !mt-0">
            <input x-model="filter" placeholder="filter" class="border-b outline-none p-2 -mx-3 pt-0 bg-gray-800 rounded-md text-gray-300" type="text">
            <p x-show="! $el.parentNode.innerText.toLowerCase().includes(filter.toLowerCase())" class="text-neutral-400 text-center font-bolc text-2xl">
                –
            </p>
            {{ $slot }}

        </div>
    </div>
    <span class="text-red-500">@if ($error){{ $error }}@endif</span>
</div>
