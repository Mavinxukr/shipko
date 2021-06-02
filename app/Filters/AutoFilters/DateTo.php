<?php


namespace App\Filters\AutoFilters;

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
                return $builders->whereDate('purchased_date', '<=',
                    Carbon::make($date)->format('Y-m-d'));
            }
        }catch (\Exception $e){}

        return $builders;
    }
}
