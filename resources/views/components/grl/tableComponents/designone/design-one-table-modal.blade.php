{{-- delete modal--}}
<form wire:submit.prevent="deleteSelected">
    <x-grl.modal.modal-comfirmation wire:model="showDeleteModal">
        <x-slot:title>
            {{ $modalTitle }}

        </x-slot:title>
        <x-slot:content>
            <h1 class="text-xl"><strong>Are you sure?</strong></h1>
            <p class="text-xl">
                <strong>
                    This action can not be reverted!
                </strong>
            </p>
        </x-slot:content>
        <x-slot:footer>
            <div class="md:flex md:w-2/4 w-full">
                <x-grl.button.danger wire:click="$set('showDeleteModal', false)" type="button"
                                     class="w-2/4">Cancel
                </x-grl.button.danger>
                <x-grl.button.primary class="w-2/4" type="submit">Delete it!</x-grl.button.primary>
            </div>

        </x-slot:footer>

    </x-grl.modal.modal-comfirmation>
</form>
{{-- end of delete modal--}}

{{--  edit transaction modal--}}
<form wire:submit.prevent="saveDesignOne">
    <x-grl.modal.modal-dialog wire:model.live="showDesignOneModal">
        <x-slot:title>
            {{ $modalTitle }}

        </x-slot:title>
        <x-slot:content>
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
        </x-slot:content>
        <x-slot:footer>
            <div class="md:flex w-full">
                <x-grl.button.danger wire:click="$set('showDesignOneModal', false)" type="button" class="w-full">
                    Cancel
                </x-grl.button.danger>
                <x-grl.button.primary class="w-full" type="submit">Save</x-grl.button.primary>
            </div>

        </x-slot:footer>

    </x-grl.modal.modal-dialog>
</form>
