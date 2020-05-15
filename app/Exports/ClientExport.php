<?php

namespace App\Exports;

use App\Models\Client\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport extends TablesExport
{
    public function collection()
    {
        $model = Client::select($this->selectFormatter());

        $this->join($model);
        return $model->get();
    }

    private function join($model)
    {
        $keys = [
            'cities'    => 'clients.city_id',
            'countries' => 'clients.country_id',
            'addresses' => 'clients.address_id',
            'zips'      => 'clients.zip_id',
        ];

        $joined = [];
        foreach ($this->select as $item){
            $object = explode('.', $item);
            if(count($object) > 1 && $object[0] != 'clients'){
                if(array_search($object[0], $joined) === false){
                    $model->leftJoin($object[0], $keys[$object[0]], $object[0] . '.id');
                    $joined[] = $object[0];
                }
            }
        }
        return $model;
    }

    private function selectFormatter() : array
    {
        $select = [];
        foreach ($this->select as $item){
            $object = explode('.', $item);
            if(count($object) > 1){
                $select[] = $item . ' as ' . $object[0] . '.' . ucfirst($object[1]);
            }else{
                $select[] = $object[0];
            }
        }

        return $select;
    }
}
