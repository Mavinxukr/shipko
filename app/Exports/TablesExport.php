<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

abstract class TablesExport implements FromCollection, WithHeadings
{
    protected $select;

    public function __construct(array $select)
    {
        $this->select = $select;
    }

    abstract public function collection();

    public function headings(): array
    {
        return $this->select;
    }
}
