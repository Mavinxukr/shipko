<?php


namespace App\Traits;

use App\Models\Client\City;
use App\Models\Client\Client;
use App\Models\Group\Group;

trait GetAdditional
{
    public static function get(array $params)
    {
        $data = [
            'clients'   => Client::orderByDesc('id')->get(['id', 'name']),
            'groups'    => Group::orderByDesc('id')->get(['id', 'name']),
            'cities'    => City::orderByDesc('id')->get(['id', 'name', 'state', 'price']),
            'states'    => City::orderByDesc('id')->get(['state'])->unique('state'),
        ];

        $response = [];
        foreach ($params as $param){
            $response[$param] = $data[$param];
        }

        return $response;
    }
}

