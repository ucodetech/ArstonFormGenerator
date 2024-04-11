@props([
    'label' => false,
    'label_class' => false,
    'padding' => false,
    'for' =>false,
    'checked' => false,
    'href' => null,
    'link' => false

])
<div class="flex items-center {{ $padding }}">
    <input  {{ $attributes->merge(['checked'=>$checked,'class' => "text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" ]) }} />
    <label for="{{ $for }}" class="{{ $label_class ? : "sr-only" }}">
       @if($link)
            <x-grl.button.link class="text-blue-500" :href="$href ? $href: '#'" >
                {{ $label }}
            </x-grl.button.link>
        @else
           {{ $label }}
       @endif


    </label>
</div>
