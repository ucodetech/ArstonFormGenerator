<?php

namespace App\Traits\Datatable;

use Livewire\WithPagination;


trait WithPerPagePagination {
    use WithPagination;
    public $perPage = 5;

    public $pageNums = [
            5 => 5,
            10 => 10,
            25 => 25,
            50 => 50,
            100 => 100
    ];
    public function initializeWithPerPagePagination() : void
    {
        $this->perPage = session('perPage', $this->perPage);
    }
    public function updatedPerPage($value): void
    {
            session()->put('perPage', $value);
        
    }
    public function applyPagination($query){
        return $query->paginate($this->perPage);
    }
}
