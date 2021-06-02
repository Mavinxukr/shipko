<?php


namespace App\Filters\InvoiceFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class ClientId extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            return $builders->whereHas('auto', function (Builder $q){
                $q->where('client_id', request($this->filterName()));
            });
        return $builders;
    }
}
