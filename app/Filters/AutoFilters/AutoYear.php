<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class AutoYear extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->where('year', request($this->filterName()));
    }
}
