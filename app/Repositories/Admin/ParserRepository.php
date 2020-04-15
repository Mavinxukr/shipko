<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\ParserContract;
use App\Traits\FormattedJsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParserRepository implements ParserContract
{
    use FormattedJsonResponse;

    public function index(Request $request, string $table)
    {
        $parse = [
            'client'        => 'App\Exports\AutoExport',
            'base_clients'  => 'App\Exports\ClientExport',
            'groups'        => 'App\Exports\GroupExport',
            'parts'         => 'App\Exports\PartExport',
            'autos'         => 'App\Exports\AutoExport',
            'shippings'     => 'App\Exports\AutoExport',
            'dismantings'   => 'App\Exports\AutoExport',
        ];

        $date = Carbon::now()->format('Y_m_d');
        $fields = explode(',', $request->fields);

        if(!isset($parse[$table]))
            return $this->toJson('Model not Exists', 400, null);

        return Excel::download(
            new $parse[$table]($fields, $request->client_id),
            $table . "_" . $date . ".xlsx");
    }
}
