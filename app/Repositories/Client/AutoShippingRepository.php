<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoShippingContract;
use App\Http\Resources\AutoResource;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoShippingRepository implements AutoShippingContract
{
    use FormattedJsonResponse, SortCollection;

    public function index(Request $request)
    {
        $search = \request('search');
        $port = \request('port');
        $model = $request->user()
            ->autos()
            ->with('shipping')
            ->has('shipping');

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

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Auto Shipping show successfully',200 ,
            AutoResource::collection($autos), true);
    }
}
