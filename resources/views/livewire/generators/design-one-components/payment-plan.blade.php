<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment') }}
        </h2>
        <x-grl.messages/>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
         
                <div
                    class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-auto mb-4 mt-10 md:mt-0"
                >
                    <div class="flex-col space-y-2 overflow-x-auto">
    
                        @include('components.grl.tableComponents.designone.payment.payment-table-components')
    
                        <div class="md:space-x-1 p-2 w-full">
                            @include('components.grl.tableComponents.designone.payment.payment-table')
                            <div class="mt-2 mb-2 w-full overflow-y-auto">
                                {{ $payments->links() }}
                            </div>
                            @include('components.grl.tableComponents.designone.payment.payment-table-modal')
                        </div>
    
                    </div>
                    <x-grl.grid-box.grid class="grid grid-cols-1 md:grid-cols-2 p-2">
                        <x-grl.grid-box.grid-child class="h-auto p-2">
    
                        </x-grl.grid-box.grid-child>
                        <x-grl.grid-box.grid-child class="h-auto p-2">
    
                        </x-grl.grid-box.grid-child>
                    </x-grl.grid-box.grid>
    
                </div>
    
            </div>
        </div>
    </div>
</div>
