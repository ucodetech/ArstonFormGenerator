<div
    x-data="{ value: @entangle($attributes->wire('model')).live }"
    x-init="new Pikaday({ field: $refs.input, format: 'YYYY-MM-DD', yearRange: [1900, {{ date('Y') }}]});"
    x-on:change="value = $event.target.value"
    class="flex">
  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-800 dark:text-gray-800 dark:border-gray-600">
   {{ $slot }}
  </span>
    <input
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="input"
        x-bind:value="value"
        class="rounded-none cursor-pointer bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-r-md" />

</div>
