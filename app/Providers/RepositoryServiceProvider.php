<?php

namespace App\Providers;

use App\Contracts\ContractRepositories\Admin\PartContract;
use App\Contracts\ContratRepositories\Admin\AuthContract;
use App\Contracts\ContratRepositories\Admin\ClientContract;
use App\Contracts\ContratRepositories\Admin\ClientFilterContract;
use App\Contracts\vendor\ClientService\FileCreatorContract;
use App\Contracts\vendor\ClientService\LocationServiceContract;
use App\Repositories\Admin\AuthRepository;
use App\Repositories\Admin\ClientFilterRepository;
use App\Repositories\Admin\ClientRepository;
use App\Repositories\Admin\PartRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(AuthContract::class,AuthRepository::class);
        app()->bind(ClientContract::class,ClientRepository::class);
        app()->bind(ClientFilterContract::class,ClientFilterRepository::class);
        app()->bind(PartContract::class,PartRepository::class);
    }
}
