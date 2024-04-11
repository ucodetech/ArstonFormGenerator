@props([
    'error' => false,
    'label' => false,
    'for' => false,
    'styleDiv' => false,
    'required' => false
])
<div class="{{ $styleDiv }}">
    <label for="{{ $for }}" {{ $attributes->merge(['class'=>"mb-2 text-sm font-medium text-gray-800 dark:text-white"]) }}>{{ $label }} <span class="text-red-500">{{ $required ? "*" : "" }}</span></label>
    {{ $slot }}
    @if($error)<span class="text-red-500 ">{{ $error }}</span>@endif
</div>
