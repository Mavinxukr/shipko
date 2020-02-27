<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class Lot extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->whereHas('lotInfo', function (Builder $shipInfo) {
            return $shipInfo->where('id', request($this->filterName()));
        });
    }
}
