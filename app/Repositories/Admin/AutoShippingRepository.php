<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoShippingRepository implements AutoShippingContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $search = \request('search');
        $port = \request('port');
        $model = Auto::latest('id')
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

        return $this->toJson('Auto Shipping get all successfully',200,                   AutoResource::collection($autos), true);
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
                $auto->shipping()->create(['status' => 'at_loading']);
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
