@props([
    'label' => false,
    'for' => false
])
<input {{ $attributes }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="{{ $for }}" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
    {{ $label }}
</label>
