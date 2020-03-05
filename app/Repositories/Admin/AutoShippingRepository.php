<?php


namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
use App\Http\Resources\AutoResource;
use App\Http\Resources\AutoShippingResource;
use App\Models\Auto\Auto;
use App\Models\Auto\Shipping;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\UploadDocuments;
use Illuminate\Http\Request;

class AutoShippingRepository implements AutoShippingContract
{
    use FormattedJsonResponse;

    public function index()
    {
        $auto = Auto::latest('id')
            ->with('shipping')
            ->has('shipping')
            ->paginate(10);
        return $this->toJson('Auto Shipping show successfully',200 ,AutoResource::collection($auto));
    }

    public function show(int $id)
    {
        return $this->toJson('Auto Shipping show by id successfully',200 ,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $auto = Auto::findOrFail($request->auto_id);
        if(!is_null($auto->shipping))
            return $this->toJson('Auto Shipping already create',400,
                new AutoResource($auto));

        $auto->shipping()->create($request->only(['auto_id','status']));

        $auto = $auto->fresh();
        return $this->toJson('Auto Shipping created successfully',201,
            new AutoResource($auto));
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
       return $this->toJson('Auto Shipping deleted successfully',200,
           new AutoResource($auto));

    }
}