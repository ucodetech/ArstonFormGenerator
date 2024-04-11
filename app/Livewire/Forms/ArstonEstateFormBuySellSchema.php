<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("layouts.pdflayout")]
class ArstonEstateFormBuySellSchema extends Component
{
    public function render()
    {
        return view('livewire.forms.arston-estate-form-buy-sell-schema');
    }
}
