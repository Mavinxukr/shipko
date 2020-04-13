<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\PriceContract;
use App\Http\Resources\PriceResource;
use App\Models\Client\City;
use App\Models\Price\Price;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Http\Request;

class PriceRepository implements PriceContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $search = \request('search');
        $model = Price::query();

        $prices = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all Prices successfully', 200, PriceResource::collection($prices), true);
    }

    public function show(int $id)
    {
        $price = Price::findOrFail($id);
        return $this->toJson('Get Price by id successfully', 200,
            new PriceResource($price));
    }

    public function store(Request $request)
    {
        $data = $request->except('priceable_type', 'cities');

        try {
            $data['priceable_type'] = Price::morphMap($request->priceable_type);
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $price = Price::create($data);
        $cities_id = explode(',', $request->cities);
        $cities = City::whereIn('id', $cities_id)->get();
        $price->cities()->sync($cities);
        return $this->toJson('Store Price successfully', 201,
            new PriceResource($price));
    }

    public function update(Request $request, int $id)
    {
        $data = array_filter($request->only('name', 'price'));
        try {
            if(!is_null($request->priceable_type) && !is_null($request->priceable_id)){
                $data['priceable_id'] = $request->priceable_id;
                $data['priceable_type']= Price::morphMap($request->priceable_type);
            }
        }catch (\Exception $e){
            return $this->toJson($e->getMessage(), 400, null);
        }

        $price = Price::findOrFail($id);
        $price->update($data);
        $cities_id = explode(',', $request->cities);
        $cities = City::whereIn('id', $cities_id)->get();
        $price->cities()->sync($cities);

        return $this->toJson('Update Price successfully', 200,
            new PriceResource($price));
    }

    public function destroy(int $id)
    {
        $group = Price::findOrFail($id);
        $group->delete();
        return $this->toJson('Delete Price successfully',200,null);
    }
}
