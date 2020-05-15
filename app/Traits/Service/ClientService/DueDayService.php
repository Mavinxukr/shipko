<?php


namespace App\Traits\Service\ClientService;


use App\Models\Client\ClientImage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Str;

trait DueDayService
{
    public static function dueDay($price)
    {
        $data['price_id'] = $price->id;
        $data['pastDays'] = Carbon::now()->diffInDays($price->created_at);
        $data['allDays'] = $price->due_day->diffInDays($price->created_at);

        if($data['allDays'] <= $data['pastDays']){
            $data['finish'] = true;
        }else{
            $data['finish'] = false;
        }

        return $data;
    }

    public static function getFirst($client)
    {
        $price = null;
        if(!is_null($client->price) && !is_null($client->group) && !is_null($client->group->group->priceable)){
            $dueDay_client = $client->price;
            $dueDay_group = $client->group->group->priceable;

            if($dueDay_client->created_at < $dueDay_group->created_at){
                $price = $dueDay_client;
            }else{
                $price = $dueDay_group;
            }
        }elseif(!is_null($client->price)){
            $price = $client->price;
        }elseif (!is_null($client->group) && !is_null($client->group->priceable)){
            $price = $client->group->priceable;
        }

        return !is_null($price) ? self::dueDay($price) : null;
    }
}
