<?php

namespace App\Exports;

use App\Models\Part\Part;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartExport extends TablesExport
{
    public function collection()
    {
        return Part::all($this->select);
    }
}
