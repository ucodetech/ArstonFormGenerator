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


{{-- question and answer --}}
<form wire:submit.prevent="saveDesignOneFAQ">
    <x-grl.modal.modal-dialog wire:model.live="showDesignOneFAQModal">
        <x-slot:title>
            {{ $modalTitle }}
           
        </x-slot:title>
        <x-slot:content>
            <div class="grid grid-cols-1">
                <x-grl.input.input-dark wire:model="fqa_id" type="hidden"/>
                    <div class="space-y-4">
                        <x-grl.input.group-black label="Question" for="question" :error="$errors->first('question')">
                            <x-grl.input.input-dark wire:model="question" id="question"/>
                        </x-grl.input.group-black>
                        <x-grl.input.group-black label="Answer" for="answer" :error="$errors->first('answer')">
                            <x-grl.input.input-dark wire:model="answer" id="answer"/>
                        </x-grl.input.group-black>
                    </div>               
                    <x-action-message on="question-saved">
                        {{ $msg }} 
                    </x-action-message>
                </div>
        </x-slot:content>
        <x-slot:footer>
            <div class="md:flex w-full">
                <x-grl.button.danger wire:click="$set('showDesignOneFAQModal', false)" type="button" class="w-full">
                    Cancel
                </x-grl.button.danger>
                <x-grl.button.primary class="w-full" type="submit">Save</x-grl.button.primary>
            </div>

        </x-slot:footer>

    </x-grl.modal.modal-dialog>
</form>

