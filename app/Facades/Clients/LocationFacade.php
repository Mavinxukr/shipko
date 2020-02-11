<?php


namespace App\Facades\Clients;


class LocationFacade
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }
    public static function __callStatic($method,$args)
    {
        return (self::resolveFacade('LocationFacade'))
                                    ->$method(...$args);
    }
}
