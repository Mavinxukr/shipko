<?php


namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AutoContract;
use App\Filters\AutoFilters\Container;
use App\Filters\AutoFilters\Lot;
use App\Filters\AutoFilters\Model_name;
use App\Filters\AutoFilters\Point_load_city;
use App\Filters\AutoFilters\Vin;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        $pipeline =  app(Pipeline::class)
            ->send(Auto::query())
            ->through([
                Model_name::class,
                Point_load_city::class,
                Container::class,
                Lot::class,
                Vin::class,
            ])->thenReturn()
            ->select('autos.*')
            ->paginate(10);

        return $this->toJson('All Auto by filters',200, AutoResource::collection($pipeline));
    }
}
