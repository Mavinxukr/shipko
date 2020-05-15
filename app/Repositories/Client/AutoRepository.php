<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoContract;
use App\Filters\AutoFilters\AutoName;
use App\Filters\AutoFilters\Container;
use App\Filters\AutoFilters\LotNumber;
use App\Filters\AutoFilters\ModelName;
use App\Filters\AutoFilters\PointLoadCity;
use App\Filters\AutoFilters\Port;
use App\Filters\AutoFilters\Status;
use App\Filters\AutoFilters\Vin;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\SortCollection;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, AutoAction, SortCollection;

    public function index(Request $request)
    {
        $model =  app(Pipeline::class)
            ->send(Auto::where('client_id', $request->user()->id))
            ->through([
                AutoName::class,
                Port::class,
                Container::class,
                LotNumber::class,
                Vin::class,
                Status::class,
            ])->thenReturn()
            ->select('autos.*');

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        $modelName = Auto::select('model_name')->distinct()->get();

        return $this->toJson('All Auto by filters',200,
            AutoResource::collection($autos)
                ->additional(['model_name' => $modelName]), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto show by id successfully',200 ,
             new AutoResource(Auto::findOrFail($id), $this->getPopular(4)));
    }
}
