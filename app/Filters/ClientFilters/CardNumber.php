<?php


namespace App\Filters\ClientFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class CardNumber extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->where($this->filterName(),request($this->filterName()));
    }
}
