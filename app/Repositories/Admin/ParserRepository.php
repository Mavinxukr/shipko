<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\ParserContract;
use App\Exports\TablesExport;
use App\Traits\FormattedJsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParserRepository implements ParserContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        try {
            $date = Carbon::now()->format('Y_m_d');
            $fields = explode(',', $request->fields);

            return Excel::download(
                new TablesExport(
                    $this->getClass($request->model), $fields
                ), $request->model ."_" . $date . ".xlsx"
            );

        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), $e->getCode(), null);
        }
    }

    private function getClass($model)
    {
        $models = [
            'auto'      => "App\Models\Auto\Auto",
            'client'    => "App\Models\Client\Client"
        ];
        if(isset($models[$model])){
            return new $models[$model];
        }else{
            throw new \Exception('Model not Exists', 400);
        }

    }
}
