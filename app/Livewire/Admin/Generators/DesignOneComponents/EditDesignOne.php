<?php

namespace App\Livewire\Admin\Generators\DesignOneComponents;

use Livewire\Component;
use App\Models\ArstonDesignOne;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class EditDesignOne extends Component
{
    public string $estate_name;
    public string $estate_address;
    public string $agreement_and_undertaking;
    public  $design;
    public $design_id; 
   
    public $queryString = ['design_id'];


    public function mount(){
        $this->design = ArstonDesignOne::find($this->design_id);
        $this->estate_name = $this->design->estate_name;
        $this->estate_address = $this->design->estate_address;
        $this->agreement_and_undertaking = $this->design->agreement_and_undertaking;
    }


    public function updateForm(){
          // Update Mode
          $this->validate([
            'estate_name' => ['required', 'string', 'unique:arston_design_ones,estate_name, '.$this->design_id,],
            'estate_address' => ['required', 'string'],
            'agreement_and_undertaking' => ['required', 'string']
        ]);
    
        $this->design->update([
            'estate_name'=> $this->estate_name,
            'estate_address' =>  $this->estate_address,
            'agreement_and_undertaking' =>  $this->agreement_and_undertaking
        ]);

        return redirect()->route('design.one')->with('success', 'Design updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.generators.design-one-components.edit-design-one');
    }
}
