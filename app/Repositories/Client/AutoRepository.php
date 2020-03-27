<?php


namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoContract;
use App\Filters\AutoFilters\Container;
use App\Filters\AutoFilters\LotNumber;
use App\Filters\AutoFilters\ModelName;
use App\Filters\AutoFilters\PointLoadCity;
use App\Filters\AutoFilters\Status;
use App\Filters\AutoFilters\Vin;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, AutoAction;

    public function index(Request $request)
    {
        $pipeline =  app(Pipeline::class)
            ->send(Auto::query())
            ->through([
                ModelName::class,
                PointLoadCity::class,
                Container::class,
                LotNumber::class,
                Vin::class,
                Status::class,
            ])->thenReturn()
            ->select('autos.*')
            ->paginate(10);

        return $this->toJson('All Auto by filters',200, AutoResource::collection($pipeline), true);
    }

    public function show(int $id)
    {
        $autos = $this->getPopular(4);
        return $this->toJson('Auto show by id successfully',200 ,
             new AutoResource(Auto::findOrFail($id), $autos));
    }
}
