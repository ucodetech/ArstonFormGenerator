<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
         
                <div
                    class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-auto mb-4 mt-10 md:mt-0"
                >
                    <div class="flex-col space-y-2 overflow-x-auto">
    
                        @include('components.grl.tableComponents.designone.design-one-table-components')
    
                        <div class="md:space-x-1 p-2 w-full">
                            @include('components.grl.tableComponents.designone.design-one-table')
                            <div class="mt-2 mb-2 w-full overflow-y-auto">
                                {{ $designones->links() }}
                            </div>
                            @include('components.grl.tableComponents.designone.design-one-table-modal')
                        </div>
    
                    </div>
                    <x-grl.grid-box.grid class="grid grid-cols-1 p-2">
                        <x-grl.grid-box.grid-child class="h-auto p-2 text-gray-200">
                            
                            <div>
                              
                                @foreach($pdfs as $design)
                                    @php
                                        $faqs = App\Models\ArstonDesignOneFAQ::where('design_id', $design->id)->get();
                                        $payment = App\Models\ArstonDesignOnePaymentPlan::where('design_id', $design->id)->get();
                                    @endphp
                                    @if(count($faqs) > 0 && count($payment) > 0)
                                        <div class="flex justify-between space-x-8 text-gray-100 font-bold capitalize px-4 py-4">
                                            <div>{{ $design->estate_name }}</div>
                                            <div>
                                                <a class="inline-flex justify-center items-center text-blue-200 cursor-pointer" 
                                                href="{{ route('arston.form', $design->id) }}" target="_blank" wire:navigate>
                                                    <x-svg.pdf class="w-4 h-4 mr-1" fill="currentColor"/> Generate PDF
                                                 </a>
                                            </div>
                                        </div>
                                    @endif
                                    
                                @endforeach
                            </div>
                        </x-grl.grid-box.grid-child>
                       
                    </x-grl.grid-box.grid>
    
                </div>
    
            </div>
        </div>
    </div>
</div>
