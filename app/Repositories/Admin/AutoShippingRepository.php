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
        $shippings = Shipping::latest('id')->paginate(10);
        return $this->toJson('Auto Shipping show successfully',200 ,AutoShippingResource::collection($shippings));
    }

    public function show(int $id)
    {
        return $this->toJson('Auto Shipping show by id successfully',200 ,
            new AutoShippingResource(Shipping::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $shipping  = Shipping::create($request->only(['auto_id','status']));
        return $this->toJson('Auto Shipping created successfully',201,
                                                        new AutoShippingResource($shipping));

    }

    public function update(Request $request, int $id)
    {
        $shipping = Shipping::whereId($id)->first();
        $shipping->update(array_filter($request->only(['status'])));
        return $this->toJson('Auto Shipping updated successfully',200,
                        new AutoShippingResource($shipping));
    }

    public function destroy(int $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();
       return $this->toJson('Auto Shipping deleted successfully',200, null);

    }
}
