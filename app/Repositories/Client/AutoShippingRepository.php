<?php


namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoShippingContract;
use App\Http\Resources\AutoResource;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AutoShippingRepository implements AutoShippingContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        $user = $request->user();
        $auto = $user->autos()
            ->with('shipping')
            ->has('shipping')
            ->paginate(10);
        return $this->toJson('Auto Shipping show successfully',200 ,AutoResource::collection($auto));
    }
}
