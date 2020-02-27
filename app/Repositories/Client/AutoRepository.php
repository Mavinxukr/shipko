<?php


namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\UploadDocuments;
use Illuminate\Http\Request;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, AutoAction;

    public function index(Request $request)
    {
        $autos = Auto::latest('id')->paginate(10);
        return $this->toJson('Auto show successfully',200 ,AutoResource::collection($autos));
    }

    public function show(int $id)
    {
        $autos = $this->getPopular(4);
        return $this->toJson('Auto show by id successfully',200 ,
             new AutoResource(Auto::findOrFail($id), $autos));
    }
}
