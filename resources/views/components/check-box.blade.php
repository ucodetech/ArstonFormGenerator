@props([
    'label' => false,
    'label_class' => false,
    'padding' => false,
    'for' =>false,
    'checked' => false,
    'href' => null,

])
<div class="flex items-center {{ $padding }}">
    <input  {{ $attributes->merge(['checked'=>$checked,'class' => "text-blue-600" ]) }} />
    <label for="{{ $for }}" class="{{ $label_class ? : "sr-only" }}">
         {{ $label }}
    </label>
</div>
