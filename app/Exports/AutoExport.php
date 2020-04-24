<?php

namespace App\Exports;

use App\Models\Auto\Auto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AutoExport extends TablesExport
{
    protected $client;

    public function __construct(array $select, $client=null)
    {
        $this->client = $client;
        parent::__construct($select);
    }

    public function collection()
    {
        if(!is_null($this->client)){
            $model = Auto::where('client_id', $this->client)
                ->select($this->selectFormatter());
        }else{
            $model = Auto::select($this->selectFormatter());
        }

        $this->join($model);
        return $model->get();
    }

    private function join($model)
    {
        $joined = [];
        foreach ($this->select as $item){
            $object = explode('.', $item);
            if(count($object) > 1 && $object[0] != 'autos'){
                if(array_search($object[0], $joined) === false){
                    $model->leftJoin($object[0], 'autos.id', $object[0] . '.auto_id');
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
