<?php

namespace App\Providers;


use App\Contracts\Admin\AuthInterface;
use App\Contracts\Admin\ClientFilterInterface;
use App\Contracts\Admin\ClientInterface;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\ClientFilterRepository;
use App\Repository\Admin\ClientRepository;
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
        app()->bind(AuthInterface::class,AuthRepository::class);
        app()->bind(ClientInterface::class,ClientRepository::class);
        app()->bind(ClientFilterInterface::class,ClientFilterRepository::class);
    }
}
