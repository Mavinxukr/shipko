<?php


namespace App\Filters\InvoiceFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class ShippingStatus extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            return $builders->where('status_shipping', request($this->filterName()));
        return $builders;
    }
}
