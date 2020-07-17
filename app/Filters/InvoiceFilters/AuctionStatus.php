<?php


namespace App\Filters\InvoiceFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class AuctionStatus extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        if(!is_null(request($this->filterName())))
            return $builders->where('client_id', request($this->filterName()));
        return $builders;
    }
}
