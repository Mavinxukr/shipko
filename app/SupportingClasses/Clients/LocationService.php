<?php


namespace App\SupportingClasses\Clients;

class LocationService extends LocationTemplateAbstract
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
