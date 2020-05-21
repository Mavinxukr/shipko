<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\PriceContract;
use App\Http\Resources\PriceResource;
use App\Models\Client\City;
use App\Models\Client\Client;
use App\Models\Client\Country;
use App\Models\Group\Group;
use App\Models\Price\Price;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Http\Request;

class PriceRepository implements PriceContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $model = Price::query();

        $prices = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all Prices successfully', 200, PriceResource::collection($prices)->additional($this->getAdditional()), true);
    }

    public function show(int $id)
    {
        $price = Price::findOrFail($id);
        return $this->toJson('Get Price by id successfully', 200,
            (new PriceResource($price))->additional($this->getAdditional()));
    }

    public function store(Request $request)
    {
        $data = $request->except('priceable_type', 'dependency');

        try {
            $data['priceable_type'] = Price::morphMap('model', $request->priceable_type);
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $price = Price::create($data);

        $dependency = explode(';', $request->dependency);
        $price->cities()->delete();
        foreach ($dependency as $k => $item) {
            $values = explode(',', $item);
            foreach ($values as $value) {
                $temp = explode('=', $value);
                $params[$temp[0]] = $temp[1];
            }
            $price->cities()->attach($params['c'], [
                'price_value' => $params['p'],
            ]);
        }

        return $this->index();
        /*return $this->toJson('Store Price successfully', 201,
            new PriceResource($price));*/
    }

    public function update(Request $request, int $id)
    {
        $data = array_filter($request->only('name'));
        try {
            if(!is_null($request->priceable_type) && !is_null($request->priceable_id)){
                $data['priceable_id'] = $request->priceable_id;
                $data['priceable_type']= Price::morphMap('model', $request->priceable_type);
            }
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $price = Price::findOrFail($id);
        $price->update($data);
        $dependency = explode(';', $request->dependency);
        $price->cities()->delete();
        foreach ($dependency as $k => $item) {
            $values = explode(',', $item);
            foreach ($values as $value) {
                $temp = explode('=', $value);
                $params[$temp[0]] = $temp[1];
            }
            $price->cities()->attach($params['c'], [
                'price_value' => $params['p'],
            ]);
        }


        return $this->toJson('Update Price successfully', 200,
            new PriceResource($price));
    }

    public function destroy(int $id)
    {
        $group = Price::findOrFail($id);
        $group->delete();

        return $this->index();
        /*return $this->toJson('Delete Price successfully',200,null);*/
    }

    public function getAdditional()
    {
        $data['clients'] = Client::orderByDesc('id')->get(['id', 'name']);
        $data['groups'] = Group::orderByDesc('id')->get(['id', 'name']);
        $data['cities'] = City::orderByDesc('id')->get(['id', 'name', 'state', 'price']);
        return $data;
    }
}
