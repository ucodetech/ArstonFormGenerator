@props([
    'label' => false,
    'for',
    'class' => false,
    'error' => false,
    'helpText' => false

    ])
<div class="{{ $class }}">
    @if($label)
    <label for="{{ $for }}" class="block text-sm font-medium leading-6 text-gray-200">{{ $label }}</label>
    @endif
    <div class="mt-2">
        {{ $slot }}
        @if($error)
            <span class="text-red-600">{{ $error }} </span>
        @endif
        @if($helpText)
            <p class="mt-3 text-sm leading-6 text-gray-400">{{ $helpText }}</p>
        @endif
    </div>
</div>
