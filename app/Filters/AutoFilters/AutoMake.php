<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class AutoMake extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(is_null(request($this->filterName())))
            return $builders->where('make_name', request($this->filterName()));
        return $builders;
    }
}
