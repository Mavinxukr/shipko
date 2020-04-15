<?php

namespace App\Exports;

use App\Models\Group\Group;
use Maatwebsite\Excel\Concerns\FromCollection;

class GroupExport extends TablesExport
{
    public function collection()
    {
        return Group::all($this->select);
    }
}
