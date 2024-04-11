
@props(['label' => null, 'for'=>null, 'value'=>null, 'id'=>null, 'is_checked'=>false])
<div x-show="$el.innerText.toLowerCase().includes(filter.toLowerCase())" class="flex items-center">
    <input x-model="options" id="{{ $id }}" type="checkbox" {{ $attributes }}  value="{{ $value }}" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-300 rounded focus:ring-blue-500">
    <label for="{{ $for }}" class="ml-2 text-sm font-medium text-gray-300 flex-grow">{{ $label }}</label>
</div>