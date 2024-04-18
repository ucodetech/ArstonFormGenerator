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


{{-- payment plan --}}
<form wire:submit.prevent="saveDesignOnePaymentPlan">
    <x-grl.modal.modal-dialog wire:model.live="showDesignOnePPModal">
        <x-slot:title>
            {{ $modalTitle }}

        </x-slot:title>
        <x-slot:content>
            <div class="grid grid-cols-1">
                <x-grl.input.input-dark wire:model="payment_id" type="hidden"/>
               
                <div class="w-full">
                    <x-grl.input.group-black  label="Duration" for="duration"  :error="$errors->first('duration')">
                        <x-grl.input.select class="flex w-full"  wire:model.blur='duration'>
                            <option value="" selected disabled>Select Duration</option>
                            @foreach ($list_durations as $key=>$value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-grl.input.select>
                    </x-grl.input.group-black>
                </div>
                <div>
                    <div class="items-center justify-between gap-4 space-y-2 md:space-y-6 mt-2">
                        <div class="w-full">
                            <x-grl.input.group-black  label="Amount" for="amount"  :error="$errors->first('amount')">
                                <x-grl.input.input-dark wire:model="amount" id="amount" placeholder="Eg: 1000000" />
                            </x-grl.input.group-black>
                        </div>
                       
                    </div>
                    <div class="items-center justify-between gap-4 space-y-2 md:space-y-6 mt-2">
                        <div class="w-full">
                            <x-grl.input.group-black  label="SQM" for="payment_sqm"  :error="$errors->first('payment_sqm')">
                                <x-grl.input.select class="flex w-full"  wire:model='payment_sqm'>
                                    <option value="" selected disabled>Select SQM</option>
                                    @foreach ($list_sqms as $key=>$value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </x-grl.input.select>
                            </x-grl.input.group-black>
                        </div>
                       
                    </div>
                    <x-action-message on="payment-saved"> 
                        {{ $msg }}
                    </x-action-message>
                </div>
               
            </div>
        </x-slot:content>
        <x-slot:footer>
            <div class="md:flex w-full">
                <x-grl.button.danger wire:click="$set('showDesignOnePPModal', false)" type="button" class="w-full">
                    Cancel
                </x-grl.button.danger>
                <x-grl.button.primary class="w-full" type="submit">Save</x-grl.button.primary>
            </div>

        </x-slot:footer>

    </x-grl.modal.modal-dialog>
</form>