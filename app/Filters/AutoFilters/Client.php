<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class Client extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            $builders->whereHas('client', function (Builder $query){
                $query->where('id', request($this->filterName()));
            });
        return $builders;
    }
}
