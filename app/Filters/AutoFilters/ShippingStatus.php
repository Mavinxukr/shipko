<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class ShippingStatus extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            return $builders->whereHas('shipping',function (Builder $shipInfo){
                return $shipInfo->where('status', request($this->filterName()));
            });
        return  $builders;
    }
}
