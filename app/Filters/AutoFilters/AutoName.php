<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class AutoName extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->where('model_name', request($this->filterName()));
    }
}
