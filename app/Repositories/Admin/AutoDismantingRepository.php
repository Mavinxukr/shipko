<?php


namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoDismantingContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AutoDismantingRepository implements AutoDismantingContract
{
    use FormattedJsonResponse;

    public function index()
    {
        $auto = Auto::latest('id')
            ->with('shipping')
            ->has('shipping')
            ->paginate(10);
        return $this->toJson('Auto Dismanting show successfully',200 ,AutoResource::collection($auto));
    }

    public function show(int $id)
    {
        return $this->toJson('Auto Dismanting show by id successfully',200 ,
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
