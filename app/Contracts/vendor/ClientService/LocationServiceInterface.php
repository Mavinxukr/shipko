<?php


namespace App\Contracts\vendor\ClientService;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface LocationServiceInterface
{
    public function countryCreator(string $country);
    public function cityCreator(string $city);
    public function zipCreator(string $zip);
    public function addressCreator(string $address);
    public function locationCreator(Model $model, array $params);
}
