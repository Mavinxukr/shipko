<?php


namespace App\Contracts\vendor\ClientService;


use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function byId (Builder $builder, int $id);
    public function byName (Builder $builder,string  $name);
    public function byEmail (Builder $builder,string  $name);
    public function byPhone (Builder $builder,string  $name);
    public function byAddress (Builder $builder,string  $name);
    public function byCreditCard (Builder $builder,string  $name);

}
