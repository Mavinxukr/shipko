<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class Status extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->where($this->filterName(), request($this->filterName()));
    }
}
