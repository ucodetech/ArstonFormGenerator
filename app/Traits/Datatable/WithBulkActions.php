<?php

namespace App\Traits\Datatable;

trait WithBulkActions {
    public bool $selectPage = false;
    public bool $selectAll = false;
    public  $selected = [];

    public function updatedSelected() : void
    {
        $this->selectAll = false;
        $this->selectPage = false;

    }
    public function updatedSelectPage($value) : void
    {
        $this->selected = $value ?  $this->selectPageRow()
            : [];

    }
    public function selectPageRow()
    {
       return $this->selected = $this->rows->pluck('id')->map(fn($id) => (string) $id);

    }
    public function selectAllPage():void { $this->selectAll = true; }

    public function getSelectedRowsQueryProperty(){
        return  (clone  $this->rowsQuery )
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected));
    }
}
