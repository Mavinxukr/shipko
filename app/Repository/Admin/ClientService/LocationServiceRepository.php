<?php


namespace App\Repository\Admin\ClientService;

use App\Contracts\vendor\ClientService\LocationServiceInterface;
use App\Models\Client\Address;
use App\Models\Client\City;
use App\Models\Client\Country;
use App\Models\Client\Zip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LocationServiceRepository implements LocationServiceInterface
{

    public function countryCreator(string $country)
    {
         Country::updateOrCreate([
            'name' => $country
        ]);

        return Country::whereName($country)->value('id');
    }

    public function cityCreator(string $city)
    {
         City::updateOrCreate([
            'name' => $city
        ]);
        return City::whereName($city)->value('id');
    }

    public function zipCreator(string $zip)
    {
         Zip::updateOrCreate([
            'name' => $zip
        ]);
        return Zip::whereName($zip)->value('id');
    }

    public function addressCreator(string $address)
    {
         Address::updateOrCreate([
            'name' => $address
        ]);
        return Address::whereName($address)->value('id');
    }


    public function locationCreator(Model $model, array $params)
    {
        $model->country_id =   isset($params['country']) ?  $this->countryCreator($params['country']) :
                                                            $model->country_id;
        $model->city_id    =   isset($params['city'])    ?  $this->cityCreator( $params['city']) :
                                                            $model->city_id;
        $model->zip_id     =   isset($params['zip'])     ?  $this->zipCreator($params['zip']) :
                                                            $model->zip_id;
        $model->address_id =   isset($params['address']) ?  $this->addressCreator($params['address']) :
                                                            $model->address_id;
    }
}
