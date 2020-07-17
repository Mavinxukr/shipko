<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;


class ClientName extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            $builders->whereHas('client', function (Builder $query){
                $query->where('name', request($this->filterName()));
            });
        return $builders;
    }
}
