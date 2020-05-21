<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\PaymentContract;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\PriceResource;
use App\Models\Client\City;
use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Payment\Payment;
use App\Models\Price\Price;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Http\Request;

class PaymentRepository implements PaymentContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $model = Payment::query();

        $payment = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all Payments successfully', 200, PaymentResource::collection($payment)->additional($this->getAdditional()), true);
    }

    public function show(int $id)
    {
        $payment = Payment::findOrFail($id);
        return $this->toJson('Get Payment by id successfully', 200,
            (new PaymentResource($payment))->additional($this->getAdditional()));
    }

    public function store(Request $request)
    {
        $data = $request->except('applicable_type');

        try {
            $data['applicable_type'] = Payment::morphMap(
                'model', $request->applicable_type);
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $payment = Payment::create($data);

        return $this->index();
        /*return $this->toJson('Store Price successfully', 201,
            new PriceResource($price));*/
    }

    public function update(Request $request, int $id)
    {
        $data = array_filter($request->only('name', 'due_day'));
        try {
            if(!is_null($request->applicable_type) && !is_null($request->applicable_id)){
                $data['applicable_id'] = $request->applicable_id;
                $data['applicable_type']= Price::morphMap(
                    'model', $request->applicable_type);
            }
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $payment = Payment::findOrFail($id);
        $payment->update($data);

        return $this->toJson('Update Payment successfully', 200,
            new PaymentResource($payment));
    }

    public function destroy(int $id)
    {
        $group = Payment::findOrFail($id);
        $group->delete();

        return $this->index();
        /*return $this->toJson('Delete Price successfully',200,null);*/
    }

    public function getAdditional()
    {
        $data['clients'] = Client::orderByDesc('id')->get(['id', 'name']);
        $data['groups'] = Group::orderByDesc('id')->get(['id', 'name']);
        return $data;
    }
}
