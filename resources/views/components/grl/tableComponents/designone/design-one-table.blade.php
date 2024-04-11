<x-grl.table.table>
    <x-slot:head>
        <x-grl.table.heading>
            <x-grl.table.table-checkbox wire:model.live="selectPage" id="selected"  type="checkbox"  class="w-4 h-4"/>
        </x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('estate_name')" :direction="$sorts['estate_name'] ?? null">Estate Name</x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('estate_address')" :direction="$sorts['estate_address'] ?? null">Estate Address</x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">Date Applied</x-grl.table.heading>
        <x-grl.table.heading>Action</x-grl.table.heading>
    </x-slot:head>
    <x-slot:body>
        @if($selectPage)
            <x-grl.table.table-row wire:key="row-message">
                <x-grl.table.table-cell colspan="5"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-yellow-700">
                    @unless($selectAll)
                        <span>
                            You have selected
                            <strong>{{ $designones->count() }}</strong> designs, do you want to select all <strong> {{ $designones->total() }}</strong>?
                            <x-grl.button.link wire:click="selectAllPage" type="button" class="ml-2 text-blue-600">Select All</x-grl.button.link>
                        </span>

                    @else
                        <span>
                            You have selected all <strong>{{ $designones->total() }}</strong> designones.
                            <x-grl.button.link wire:click="$set('selectAll', false)" type="button" class="ml-2 text-blue-600">Deselect All</x-grl.button.link>
                        </span>
                    @endif
                </x-grl.table.table-cell>
            </x-grl.table.table-row>
        @endif
        @forelse($designones as $design)
            <x-grl.table.table-row wire:key="{{ $design->id }}">
                <x-grl.table.table-cell class="pr-0 p-0">
                    <x-grl.table.table-checkbox wire:model.live="selected" value="{{ $design->id }}" type="checkbox" for="selected" id="selected"/>
                </x-grl.table.table-cell>
                <x-grl.table.table-cell wire:click="preview('{{ $design->id }}')" class="cursor-pointer text-gray-300">{{ $design->estate_name }}</x-grl.table.table-cell>
                <x-grl.table.table-cell class="text-gray-300">{!! wrap500($design->estate_address, 20) !!}</x-grl.table.table-cell>
                <x-grl.table.table-cell class="text-gray-300">
                    {{ pretty_dates($design->created_at) }}
                </x-grl.table.table-cell>
                <x-grl.table.table-cell>
                    <div class="inline-flex gap-1 rounded-md shadow-sm" role="group">
                        <x-grl.button.primary-gradient class="px-2 py-2" wire:click="addFaqs('{{ $design->id }}')" type="button" >
                            <x-svg.faq  class="w-6 h-6" fill="currentColor"/>
                        </x-grl.button.primary-gradient>
                        <x-grl.button.primary-gradient class="px-2 py-2" wire:click="addPaymentPlan('{{ $design->id }}')" type="button" >
                            <x-svg.icon-money  class="w-6 h-6" fill="currentColor"/>
                        </x-grl.button.primary-gradient>
                          
                        <x-grl.button.primary-gradient wire:click="Edit('{{ $design->id }}')"  class="px-3 py-2">
                            Edit
                        </x-grl.button.primary-gradient>
                           
                       
                    </div>
                </x-grl.table.table-cell>

            </x-grl.table.table-row>
        @empty
            <x-grl.table.table-row>
                <x-grl.table.table-cell colspan="5">
                    <div class="flex items-center justify-center gap-2 text-lg p-2">
                        <x-svg.pdf class="w-5 h-5"/>
                        <span class="text-red-300">No design Record Found!</span>
                    </div>
                </x-grl.table.table-cell>
            </x-grl.table.table-row>
        @endforelse
    </x-slot:body>
</x-grl.table.table>
