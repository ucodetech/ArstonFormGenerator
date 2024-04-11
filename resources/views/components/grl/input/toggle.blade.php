@props([
    'status' => null
])
<label class="relative inline-flex items-center mr-5 cursor-pointer">
    <input {{ $attributes }} type="checkbox"  class="sr-only peer">
    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $status }}</span>
</label>
