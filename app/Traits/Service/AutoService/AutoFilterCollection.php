<?php

namespace App\Traits\Service\AutoService;

use App\Filters\AutoFilters\AutoMake;
use App\Filters\AutoFilters\AutoName;
use App\Filters\AutoFilters\AutoYear;
use App\Filters\AutoFilters\Date;
use App\Filters\AutoFilters\Port;
use App\Filters\AutoFilters\ShippingStatus;
use App\Models\Auto\Auto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

trait AutoFilterCollection
{
    public function getAutoWithFilter($model)
    {
        $search = \request('search');

        $model =  app(Pipeline::class)
            ->send($model)
            ->through([
                AutoName::class,
                AutoMake::class,
                AutoYear::class,
                ShippingStatus::class,
                Port::class,
                Date::class,
            ])->thenReturn()
            ->select('autos.*');

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

