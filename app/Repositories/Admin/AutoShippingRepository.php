<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
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

    public function index()
    {
        $model = Auto::latest('id')
            ->with('shipping')
            ->has('shipping');

        $model = $this->getAutoWithFilter($model);

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Auto Shipping get all successfully',200,                   AutoResource::collection($autos)
            ->additional($this->getFilters()), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto Shipping get by id successfully',200 ,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $auto_id = json_decode($request->auto_id, 1);
        $autos = Auto::whereIn('id', $auto_id)->get();

        foreach ($autos as $auto){
            if(is_null($auto->shipping)){
                $auto->shipping()->create(['status' => 'in_warehouse']);
            }
        }

        return $this->index();
        /*return $this->toJson('Auto Shipping created successfully',201,
            AutoResource::collection($autos));*/
    }

    public function update(Request $request, int $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->shipping()->update(array_filter($request->only(['status'])));
        $auto = $auto->fresh();

        return $this->toJson('Auto Shipping updated successfully',200,
            new AutoResource($auto));
    }

    public function destroy(int $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->shipping()->delete();
        $auto = $auto->fresh();

        return $this->index();
        /*return $this->toJson('Auto Shipping deleted successfully',200,
           new AutoResource($auto));*/
    }
}
