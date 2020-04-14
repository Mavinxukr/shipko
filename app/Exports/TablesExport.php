<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class TablesExport implements FromCollection
{
    private $model;
    private $select;

    public function __construct($model, array $select)
    {
        $this->model = $model;
        $this->select = $select;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->model::all($this->select);
    }
    public function headings(): array
    {
        return $this->select;
    }
}
