<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoDismantingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoFilterCollection;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoDismantingRepository implements AutoDismantingContract
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

        return $this->toJson('Auto Dismantings get all successfully',200 ,
            AutoResource::collection($autos)
                ->additional($this->getFilters()), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto Dismanting show successfully', 200,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        //TODO: nothing
    }

    public function update(Request $request, int $id)
    {
        $auto = Auto::findOrFail($id);
        $auto->shipInfo()->update(array_filter($request->only(['disassembly']), function ($value){
            return !is_null($value);
        }));
        $auto = $auto->fresh();

        return $this->toJson('Auto Dismanting updated successfully',200,
            new AutoResource($auto));
    }

    public function destroy(int $id)
    {
        //TODO: nothing
    }
}
