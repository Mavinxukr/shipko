<?php


namespace App\Filters\InvoiceFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class PastDue extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        try {
            if(!is_null(request($this->filterName()))) {
                $builders->whereDate('due_day', '<=',
                        Carbon::now()->subDays(request($this->filterName())));
            }
        }catch (\Exception $e){}

        return $builders;




        /*try {
            if(!is_null(request($this->filterName()))) {
                $date = request($this->filterName());
                $builders->whereDate('due_day', '<=',
                        Carbon::make($date)->format('Y-m-d'));
            }
        }catch (\Exception $e){}

        return $builders;*/
    }
}
