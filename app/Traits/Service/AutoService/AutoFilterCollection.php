<?php

namespace App\Traits\Service\AutoService;

use App\Models\Auto\Auto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait AutoFilterCollection
{
    public function getAutoWithFilter($model)
    {
        $search = \request('search');

        $filters = [
            'auto_year'         => 'year',
            'auto_make'         => 'make_name',
            'auto_name'         => 'model_name',
            'shipping_status'   => [
                'relationship'  => 'shipping',
                'field'         => 'status'
            ],
            'port'              => [
                'relationship'  => 'shipInfo',
                'field'         => 'point_load_city'
            ],
        ];

        $data = array_filter(\request()->only(array_keys($filters)));

        foreach ($data as $k => $item){
            if(!is_null($item)){
                if(is_array($filters[$k])){
                    $model->whereHas($filters[$k]['relationship'],
                        function (Builder $query) use ($filters, $k, $item){
                            $query->where($filters[$k]['field'], $item);
                        });
                }else{
                    $model->where($filters[$k], $item);
                }
            }
        }

        $data = \request('date');
        if($data){
            $model->whereHas('shipping', function (Builder $query) use ($data){
                $query->whereDate('created_at',
                    Carbon::make($data)->format('Y-m-d'));
            });
        }

        if(!is_null($search)){
            $model->whereHas('lotInfo', function (Builder $autoQuery) use ($search) {
                $autoQuery->where('vin_code', 'like', "%$search%");
            });
        }

        return $model;
    }

    public function getFilters()
    {
        $data['years'] = Auto::select('year')->distinct()->get();
        $data['makes'] = Auto::select('make_name')->distinct()->get();
        $data['models'] = Auto::select('model_name')->distinct()->get();

        return $data;
    }
}

