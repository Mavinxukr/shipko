<?php


namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

trait SortCollection
{
    public function getWithSort(Builder $model, $countpage, $orderType, $oderBy)
    {
        $parPage = $countpage ? $countpage : 10;
        $orderType  = !is_null($orderType) ? strtolower($orderType) : 'desc';
        $oderBy     = !is_null($oderBy) ? $oderBy : 'id';

        $model->orderBy($oderBy, $orderType);

        /*if($orderType == 'asc'){
            $model->orderBy($oderBy);
        }else{
            $model->orderByDesc($oderBy);
        }*/

        return $model->paginate($parPage);
    }
}

