<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\PriceContract;
use App\Http\Resources\PriceResource;
use App\Models\Client\City;
use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Group\GroupAttach;
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
        $price = Price::create($request->except('priceable_type', 'cities') + [
                'priceable_type' => Price::morphMap($request->priceable_type),
            ]);
        $cities_id = explode(',', $request->cities);
        $cities = City::whereIn('id', $cities_id)->get();
        $price->cities()->sync($cities);
        return $this->toJson('Store Price successfully', 201,
            new PriceResource($price));
    }

    public function update(Request $request, int $id)
    {
        $price = Price::findOrFail($id);
        $price->update(array_filter($request->only('name', 'price')));

        if(!is_null($request->priceable_type) && !is_null($request->priceable_id)){
            $price->update([
                'priceable_id'  => $request->priceable_id,
                'priceable_type'=> Price::morphMap($request->priceable_type),
            ]);
        }

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
