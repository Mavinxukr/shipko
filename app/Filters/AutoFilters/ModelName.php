<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class ModelName extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->where($this->filterName(), request($this->filterName()));
    }
}
