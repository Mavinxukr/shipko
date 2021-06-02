<?php


namespace App\Filters\InvoiceFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class DateTo extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        try {
            if(!is_null(request($this->filterName()))) {
                $date = request($this->filterName());
                $builders->whereHas('auto', function (Builder $q) use ($date){
                    $q->whereDate('purchased_date', '<=',
                        Carbon::make($date)->format('Y-m-d'));
                });
            }
        }catch (\Exception $e){}

        return $builders;
    }
}
