<?php


namespace App\Filters\ClientFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;

class Address extends  AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        return $builders->whereHas($this->filterName(),function (Builder $address){
           return $address->where('name','LIKE','%'.request($this->filterName()).'%');
        });
    }
}
