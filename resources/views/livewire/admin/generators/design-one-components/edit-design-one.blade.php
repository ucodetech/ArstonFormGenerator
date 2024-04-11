    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
    
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4">
                <form wire:submit.prevent="updateForm">
                    <div class="grid grid-cols-1">
                        <x-grl.input.input-dark wire:model="design_id" type="hidden"/>
                        <x-grl.input.group-black label="Estate Name" for="estate_name" :error="$errors->first('estate_name')">
                            <x-grl.input.input-dark wire:model="estate_name" id="estate_name"/>
                        </x-grl.input.group-black>
                        <div>
                            <div class="items-center justify-between gap-4 space-y-2 md:space-y-6 mt-2">
                                <div class="w-full">
                                    <x-grl.input.group-black  label="Estate Address" for="estate_address"  :error="$errors->first('estate_address')">
                                        <x-grl.input.rich-text wire:model.blur="estate_address" set-name="estate_address" textarea-name="#estate_address" id="estate_address"/>
                                    </x-grl.input.group-black>
                                </div>
                            
                            </div>
                            <div class="items-center justify-between gap-4 space-y-2 md:space-y-6 mt-2">
                                <div class="w-full">
                                    <x-grl.input.group-black  label="Agreement and Undertaking" for="agreement_and_undertaking"  :error="$errors->first('agreement_and_undertaking')">
                                        <x-grl.input.rich-text wire:model.blur="agreement_and_undertaking" set-name="agreement_and_undertaking" textarea-name="#agreement_and_undertaking" id="agreement_and_undertaking" />
                                    </x-grl.input.group-black>
                                </div>
                            
                            </div>
                        </div>
                    
                    </div>
                    <div class="md:flex w-full mt-5">
                        <x-grl.button.danger wire:click="$set('showDesignOneModal', false)" type="button" class="w-full">
                            Cancel
                        </x-grl.button.danger>
                        <x-grl.button.primary class="w-full" type="submit">Save</x-grl.button.primary>
                    </div>
                </form>
             </div>
            </div>
        </div>
</div>
