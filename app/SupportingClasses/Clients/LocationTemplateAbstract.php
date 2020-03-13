<?php


namespace App\SupportingClasses\Clients;


 abstract class LocationTemplateAbstract
{
     abstract protected function locationCreator(string $modelName, string $name, string $needle) :string;

     //Rules: key - name of models
     //Rules: val - name which will be add to model
     //Rules: needle - which value returns model
     //Result ['country_id' => 1]

     public function resultCreator(array $params) : array
     {
         $data = [];
         foreach ($params as $key => $val) {
             if(!is_null($val))
                $data[$key.'_id'] = $this->locationCreator($key,$val,'id');
         }
         return $data;
     }

}
