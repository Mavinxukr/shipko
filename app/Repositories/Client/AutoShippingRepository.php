<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoShippingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoFilterCollection;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoShippingRepository implements AutoShippingContract
{
    use FormattedJsonResponse, SortCollection, AutoFilterCollection;

    public function index(Request $request)
    {
        $model = $request->user()
            ->autos()
            ->with('shipping')
            ->has('shipping');

        $model = $this->getAutoWithFilter($model);

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Auto Shipping show successfully',200 ,
            AutoResource::collection($autos)
                ->additional($this->getFilters()), true);
    }
}
