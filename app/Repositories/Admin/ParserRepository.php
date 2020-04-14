<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\ParserContract;
use App\Exports\AutoExport;
use App\Exports\ClientExport;
use App\Exports\GroupExport;
use App\Exports\PartExport;
use App\Exports\TablesExport;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParserRepository implements ParserContract
{
    use FormattedJsonResponse;

    /*
     * Client +
     * Base client +
     * Parts +
     * Groups +
     * Auto +
     * Invoices +
     * Shipping +
     * Dismantling +
     */

    public function index(Request $request, string $table)
    {
        $date = Carbon::now()->format('Y_m_d');
        $fields = explode(',', $request->fields);
        switch ($table){
            case 'client':
                return Excel::download(
                    new AutoExport($fields, $request->client_id),
                    $table . "_" . $date . ".xlsx"
                );
            case 'base_clients':
                return Excel::download(
                    new ClientExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'groups':
                return Excel::download(
                    new GroupExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'parts':
                return Excel::download(
                    new PartExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'autos':
                return Excel::download(
                    new AutoExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'invoices':
                return Excel::download(
                    new AutoExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'shippings':
                return Excel::download(
                    new AutoExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            case 'dismantings':
                return Excel::download(
                    new AutoExport($fields),
                    $table . "_" . $date . ".xlsx"
                );
            default:
                return $this->toJson('Model not Exists', 400, null);
        }
    }
}
