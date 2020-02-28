<?php


namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoDismantingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AutoDismantingRepository implements AutoDismantingContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        $user = $request->user();
        $auto = $user->autos()
            ->with('shipping')
            ->has('shipping')
            ->paginate(10);
        return $this->toJson('Auto Dismanting show successfully',200 ,AutoResource::collection($auto));
    }
}
