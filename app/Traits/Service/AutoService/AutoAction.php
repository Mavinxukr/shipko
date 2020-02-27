<?php


namespace App\Traits\Service\AutoService;


use App\Http\Resources\PopularAutoResource;
use App\Models\Auto\Auto;

trait AutoAction
{
    public function updateOrCreateAction(array $data, Auto $auto)
    {
        if (isset($data['ship'])) $auto->shipInfo()->updateOrCreate(['auto_id' => $auto->id],$data);
        if (isset($data['lot'])) $auto->lotInfo()->updateOrCreate(['auto_id' => $auto->id],$data);
        if (isset($data['sale'])) $auto->saleInfo()->updateOrCreate(['auto_id' => $auto->id],$data);
        if (isset($data['feature'])) $auto->featureInfo()->updateOrCreate(['auto_id' => $auto->id],$data);
        if (isset($data['document'])) $this->saveDocuments($auto,$data['document'],'auto');
    }

    public function getPopular(int $count)
    {
        $autos = Auto::latest()->limit($count)->get();
        return PopularAutoResource::collection($autos);
    }
}
