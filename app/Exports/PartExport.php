<?php

namespace App\Exports;

use App\Models\Part\Part;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartExport extends TablesExport
{

    public function __construct(array $select)
    {
        parent::__construct($select);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Part::all($this->select);
    }
}
