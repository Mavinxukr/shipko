<?php


namespace App\Traits\Service\AutoService;


use App\Http\Resources\PopularAutoResource;
use App\Models\Auto\Auto;
use Carbon\Carbon;
use http\Client\Request;

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

    public function updateOrCreateInvoice($request, Auto $auto)
    {
        if($request->invoice){
            $data['name_car'] = $auto->year . ' ' . $auto->make_name . ' ' . $auto->model_name;
            if(!is_null($request->invoice_total_price))
                $data['total_price'] = $request->invoice_total_price;
            if(!is_null($request->invoice_paid_price))
                $data['paid_price'] = $request->invoice_paid_price;
            if(!is_null($request->invoice_outstanding_price))
                $data['outstanding_price'] = $request->invoice_outstanding_price;
            if(!is_null($request->invoice_status))
                $data['status'] = $request->invoice_status;

            $data['due_day'] = Carbon::now();
            return $auto->invoice()->updateOrCreate(['auto_id' => $auto->id],$data);
        }
    }
}
