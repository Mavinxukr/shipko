<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class PointLoadCity extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->whereHas('shipInfo',function (Builder $shipInfo){
            return $shipInfo->where('point_load_city', request($this->filterName()));
        });
    }
}
