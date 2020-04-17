<?php


namespace App\Filters\AutoFilters;

use App\Filters\AbstractFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class Date extends AbstractFilters
{
    protected function applyFilter(Builder $builders)
    {
        try {
            $date = request($this->filterName());
            $builders->whereHas('shipping',function (Builder $shipping) use ($date){
                return $shipping->whereDate('created_at',
                    Carbon::make($date)->format('Y-m-d'));
            });
        }catch (\Exception $e){}
        return $builders;
    }
}
