@props([
    'sortable' => null,
    'direction' => null,
    'multi_column' => null

])
<th {{ $attributes->merge(['class' => 'cursor-pointer px-6 py-3'])->class('only') }}>
    @unless($sortable)
        <span class="text-left text-xs leading-4 font-medium text-cool-gray-100 uppercase tracking-wider">
            {{ $slot  }}
        </span>
    @else
        <div class="flex items-center">
            {{ $slot }}
                @if($direction == 'asc')
                    <x-svg.icon-asc fill="yellow" />
                @elseif($direction == 'desc')
                    <x-svg.icon-desc fill="green" />
                @elseif($multi_column)
                    <x-svg.pause-sort class="w-3 h-3 ml-1.5 cursor-pointer" fill="red"/>
                @else
                    <x-svg.icon-default fill="currentColor"/>
                @endif

        </div>
    @endif


</th>
