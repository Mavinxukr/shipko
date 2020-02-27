<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class Vin extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->whereHas('lotInfo', function (Builder $shipInfo) {
            return $shipInfo->where('vin_code', request($this->filterName()));
        });
    }
}
