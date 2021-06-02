<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Contracts\ContractRepositories\Admin\ContainerContract;
use App\Http\Resources\AutoByTrackingIdResource;
use App\Http\Resources\AutoResource;
use App\Http\Resources\ContainerResource;
use App\Models\Auto\Auto;
use App\Models\Auto\Container;
use App\Models\Auto\ShipInfo;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use App\Traits\GetAdditional;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\AutoFilterCollection;
use App\Traits\Service\AutoService\UploadDocuments;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ContainerRepository implements ContainerContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $model = Container::query();

        $containsers = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Autos get all successfully',200 ,
            ContainerResource::collection($containsers), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto get by id successfully',200 ,
            new ContainerResource(Container::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $container = Container::create($request->all());
        try {
            $this->addAutosToContainer($request, $container);
        }catch(\Exception $e){
            return $this->toJson($e->getMessage(),404);
        }

        return $this->index();
    }

    public function update(Request $request, int $id)
    {
        $data = array_filter($request->all(), function ($item){
            return !is_null($item);
        });

        $container = Container::findOrFail($id);
        $container->update($data);

        try {
            $this->addAutosToContainer($request, $container);
        }catch(\Exception $e){
            return $this->toJson($e->getMessage(),404);
        }

        return $this->toJson('Container updated successfully',200,
                new ContainerResource($container));
    }

    public function delete(Request $request)
    {
        $containers =  Container::whereIn('id', $request->container_id)->get();
        foreach ($containers as $container){
            $container->delete();
        }

        return $this->index();
    }

    public function destroy(int $id)
    {
        $container = Container::findOrFail($id);
        $container->delete();

       return $this->index();
    }

    protected function addAutosToContainer(Request $request, Container $container)
    {

        if(!is_null($request->vins)){
            $vins = explode(',', $request->vins);

            $autos = [];
            $errors = null;
            foreach ($vins as $vin){
                $auto = Auto::whereHas('lotInfo', function (Builder $lotInfo) use ($vin) {
                    return $lotInfo->where('vin_code', trim($vin));
                })->first();

                if(is_null($auto))
                    $errors[] = $vin;

                $autos[] = $auto;
            }

            if(!is_null($errors))
                throw  new \Exception("Vin`s:" . implode(',', $errors) . " - Not Found", 404);

            foreach ($autos as $auto){
                $auto->update([
                    'container_id' => $container->id
                ]);
            }
        }
    }
}
