@props([
    'label' => false,
    'terms' => false,
    'termsLink' =>  false,
    'for' => false,
    'error' => false
])
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input {{ $attributes }}  type="checkbox" class="w-10 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
    </div>
    <div class="ml-3 text-sm">
        <label for="{{ $for }}" class="font-light text-gray-500 cursor-pointer dark:text-gray-300">{{ $label }}
            @if($terms)
                <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="{{ $termsLink ? $termsLink : "#" }}">
                    {{ $terms }}
                </a>
            @endif

        </label> <br>
        @if($error) <span class="text-red-600">{{ $error  }} Terms is required</span> @endif
    </div>

</div>
