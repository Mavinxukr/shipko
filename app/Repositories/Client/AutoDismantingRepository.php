<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoDismantingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoDismantingRepository implements AutoDismantingContract
{
    use FormattedJsonResponse, SortCollection;

    public function index(Request $request)
    {
        $search = \request('search');
        $status = \request('shipping_status');
        $modelName = \request('auto_name');
        $port = \request('port');
        $model = $request->user()
            ->autos()
            ->with('shipping')
            ->has('shipping');

        if(!is_null($modelName)){
            $model->where('model_name', $modelName);
        }

        if(!is_null($search)){
            $model->whereHas('lotInfo', function (Builder $autoQuery) use ($search) {
                $autoQuery->where('vin_code', 'like', "%$search%");
            });
        }

        if(!is_null($port)){
            $model->whereHas('shipInfo', function (Builder $query) use ($port){
                $query->where('point_load_city', $port);
            });
        }

        if(!is_null($status)){
            $model->whereHas('shipping', function (Builder $query) use ($status){
                $query->where('status', $status);
            });
        }

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        $allModels = Auto::select('model_name')->distinct()->get();

        return $this->toJson('Auto Dismanting show successfully',200 ,
            AutoResource::collection($autos)->additional([
                'models'    => $allModels,
            ]), true);
    }
}
