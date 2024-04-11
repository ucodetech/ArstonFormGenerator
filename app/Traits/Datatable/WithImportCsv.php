<?php

namespace App\Traits\Datatable;

use App\Helpers\Csv;
use Livewire\WithFileUploads;

trait  WithImportCsv {
    use WithFileUploads;
    public $csv;
    public $csvError = false;
    public $columns;


    public function getGrabColumnsProperty(): void
    {
        $this->columns = Csv::from($this->csv)->columns();

    }

    public function loopGuess($guess): void
    {
        foreach ($this->columns as $column){
            $match = collect($guess)->search(fn($options) => in_array(strtolower($column), $options));
            if($match) $this->fieldColumnMap[$match] = $column;
        }
    }

    public function grabExtractFieldFromRow($row){
      return collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function ($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })->toArray();
    }
}
