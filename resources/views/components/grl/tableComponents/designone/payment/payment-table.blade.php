<x-grl.table.table>
    <x-slot:head>
        <x-grl.table.heading>
            <x-grl.table.table-checkbox wire:model.live="selectPage" id="selected"  type="checkbox"  class="w-4 h-4"/>
        </x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('duration')" :direction="$sorts['duration'] ?? null">Duration</x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('amount')" :direction="$sorts['amount'] ?? null">Amount</x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('sqm')" :direction="$sorts['sqm'] ?? null">SQM</x-grl.table.heading>
        <x-grl.table.heading multi_column sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">Date Created</x-grl.table.heading>
        <x-grl.table.heading>Action</x-grl.table.heading>
    </x-slot:head>
    <x-slot:body>
        @if($selectPage)
            <x-grl.table.table-row wire:key="row-message">
                <x-grl.table.table-cell colspan="6"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-yellow-700">
                    @unless($selectAll)
                        <span>
                            You have selected
                            <strong>{{ $payments->count() }}</strong> payments, do you want to select all <strong> {{ $payments->total() }}</strong>?
                            <x-grl.button.link wire:click="selectAllPage" type="button" class="ml-2 text-blue-600">Select All</x-grl.button.link>
                        </span>

                    @else
                        <span>
                            You have selected all <strong>{{ $payments->total() }}</strong> payments.
                            <x-grl.button.link wire:click="$set('selectAll', false)" type="button" class="ml-2 text-blue-600">Deselect All</x-grl.button.link>
                        </span>
                    @endif
                </x-grl.table.table-cell>
            </x-grl.table.table-row>
        @endif
        @forelse($payments as $payment)
            <x-grl.table.table-row wire:key="{{ $payment->id }}">
                <x-grl.table.table-cell class="pr-0 p-0">
                    <x-grl.table.table-checkbox wire:model.live="selected" value="{{ $payment->id }}" type="checkbox" for="selected" id="selected"/>
                </x-grl.table.table-cell>
                <x-grl.table.table-cell  class="cursor-pointer text-gray-300">{{ $payment->duration }}</x-grl.table.table-cell>
                <x-grl.table.table-cell class="text-gray-300">{{ Naira($payment->amount) }}</x-grl.table.table-cell>
                <x-grl.table.table-cell  class="cursor-pointer text-gray-300">{{ $payment->sqm }}</x-grl.table.table-cell>
                <x-grl.table.table-cell class="text-gray-300">
                    {{ pretty_dates($payment->created_at) }}
                </x-grl.table.table-cell>
                <x-grl.table.table-cell>
                    <div class="inline-flex gap-1 rounded-md shadow-sm" role="group">
                        <x-grl.button.primary-gradient wire:click="Update('{{ $payment->id }}')"  class="px-3 py-2">
                            Edit
                        </x-grl.button.primary-gradient>
                    </div>
                </x-grl.table.table-cell>

            </x-grl.table.table-row>
        @empty
            <x-grl.table.table-row>
                <x-grl.table.table-cell colspan="6">
                    <div class="flex items-center justify-center gap-2 text-lg p-2">
                        <x-svg.pdf class="w-5 h-5"/>
                        <span class="text-red-300">No payment Record Found!</span>
                    </div>
                </x-grl.table.table-cell>
            </x-grl.table.table-row>
        @endforelse
    </x-slot:body>
</x-grl.table.table>
