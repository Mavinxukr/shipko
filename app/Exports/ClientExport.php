<?php

namespace App\Exports;

use App\Models\Client\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport extends TablesExport
{
    public function collection()
    {
        return Client::all($this->select);
    }
}