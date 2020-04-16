<?php

namespace App\Traits\Service\AutoService;

use App\Models\Auto\Auto;
use Illuminate\Database\Eloquent\Builder;

trait AutoFilterCollection
{
    public function getAutoWithFilter($model)
    {
        $filters = [
            'auto_year'         => 'year',
            'auto_make'         => 'make_name',
            'auto_model'        => 'model_name',
            'shipping_status'   => [
                'relationship'  => 'shipping',
                'field'         => 'status'
            ],
            'port'              => [
                'relationship'  => 'shipInfo',
                'field'         => 'point_load_city'
            ],
        ];

        $data = array_filter(\request()->all());
        foreach ($data as $k => $item){
            if(!is_null($item)){
                if(is_array($filters[$k])){
                    $model->whereHas($filters[$k]['relationship'],
                        function (Builder $query) use ($filters, $k, $item){
                            $query->where($filters[$k]['relationship'], $item);
                        });
                }else{
                    $model->where($filters[$k], $item);
                }

            }
        }

        $search = \request('search');
        /*$status = \request('shipping_status');
        $year = \request('auto_year');
        $makeName = \request('auto_make');
        $modelName = \request('auto_name');
        $port = \request('port');


        if(!is_null($year)){
            $model->where('year', $year);
        }

        if(!is_null($makeName)){
            $model->where('make_name', $makeName);
        }

        if(!is_null($modelName)){
            $model->where('model_name', $modelName);
        }

        if(!is_null($status)){
            $model->whereHas('shipping', function (Builder $query) use ($status){
                $query->where('status', $status);
            });
        }

        if(!is_null($port)){
            $model->whereHas('shipInfo', function (Builder $query) use ($port){
                $query->where('point_load_city', $port);
            });
        }*/

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

    public function filter()
    {
        $filters = [
            'auto_year'         => 'year',
            'auto_make'         => 'make_name',
            'auto_model'        => 'model_name',
            'shipping_status'   => [
                'relationship'  => 'shipping',
                'field'         => 'status'
            ],
            'port'              => [
                'relationship'  => 'shipInfo',
                'field'         => 'point_load_city'
            ],
        ];

        $data = \request()->all();
        foreach ($data as $k => $item){
            if(is_array($filters[$k])){
                $model->whereHas($filters[$k]['relationship'],
                    function (Builder $query) use ($filters, $k, $item){
                        $query->where($filters[$k]['relationship'], $item);
                });
            }else{
                $model->where($filters[$k], $item);
            }
        }

    }
}

