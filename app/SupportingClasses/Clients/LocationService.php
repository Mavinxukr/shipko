<?php


namespace App\SupportingClasses\Clients;

use App\SupportingClasses\LocationTemplater;

class LocationService extends LocationTemplater
{
    protected function locationCreator(string $modelName, string $name, string $needle): string
    {
        $namespace = 'App\Models\Client\\';
        $model = $namespace .ucfirst($modelName);
        $model::updateOrCreate([
            'name' => $name
        ]);
        return $model::whereName($name)->value($needle);
    }
}
