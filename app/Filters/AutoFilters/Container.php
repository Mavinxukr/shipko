<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class Container extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->whereHas('shipInfo', function (Builder $shipInfo) {
            return $shipInfo->where('container_id', request($this->filterName()));
        });
    }
}
