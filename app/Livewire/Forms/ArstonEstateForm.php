<?php

namespace App\Livewire\Forms;

use App\Models\ArstonDesignOne;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("layouts.pdflayout")]
class ArstonEstateForm extends Component
{

    public int $id;
    public $estate_name;
    protected $queryString = ['id'];

    public function mount(){
        $arston = ArstonDesignOne::find($this->id);
        $this->estate_name = $arston->estate_name;
        $pdf = Pdf::loadView('livewire.forms.arston-estate-form');
        $filename = $arston->estate_name.'.pdf';
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, $filename);
    }
    
    public function render()
    {
        return view('livewire.forms.arston-estate-form');
    }
}
