<?php

namespace App\Exports;

use App\Models\Group\Group;
use App\Models\Invoice\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoiceExport extends TablesExport
{
    public function collection()
    {
        return Invoice::all($this->select);
    }
}
