<?php


namespace App\Traits\Service\AutoService;


use App\Models\Auto\Auto;

trait AutoAction
{
    public function updateOrCreateAction(array $data, Auto $auto)
    {
        if (isset($data['ship'])) $auto->shipInfo()->create($data);
        if (isset($data['lot'])) $auto->lotInfo()->create($data);
        if (isset($data['sale'])) $auto->saleInfo()->create($data);
        if (isset($data['feature'])) $auto->featureInfo()->create($data);
        if (isset($data['document'])) $this->saveDocuments($auto,$data['document']);
    }
}
