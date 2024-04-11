
<div
    x-data="{ value: @entangle($attributes->wire('model')).live }"
    x-init="new Pikaday({ field: $refs.input, format: 'YYYY-MM-DD', yearRange: [1900, {{ date('Y') }}]});"
    x-on:change="value = $event.target.value"
    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">
        <x-svg.calendar fill="currentColor"/>
    </span>
    <input
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="input"
        x-bind:value="value"
        class="block flex-1 bg-transparent py-1.5 pl-1 text-gray-200 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 border-0">

</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

@endpush


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.js" integrity="sha512-CTSrPIDxxtTdaIYlTKHEyvHa+70TOhC1pY3PLDgrUqCFifFtV7KrucZCvPy2K7hB0HtKgt0r4INTGBISqnaLNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

@endpush
