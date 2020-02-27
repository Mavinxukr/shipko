<?php

namespace App\Providers;

use App\Contracts\ContractRepositories\Admin\AutoContract as AdminAutoContract;
use App\Contracts\ContractRepositories\Client\AutoContract as ClientAutoContract;
use App\Contracts\ContractRepositories\Admin\AutoDismantingContract;
use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
use App\Contracts\ContractRepositories\Admin\InvoiceContract;
use App\Contracts\ContractRepositories\Admin\PartContract;
use App\Contracts\ContratRepositories\Admin\AuthContract as AdminAuthContract;
use App\Contracts\ContratRepositories\Client\AuthContract as ClientAuthContract;
use App\Contracts\ContratRepositories\Admin\ClientContract;
use App\Contracts\ContratRepositories\Admin\ClientFilterContract;
use App\Contracts\ContratRepositories\Client\OverviewContract;
use App\Repositories\Admin\AuthRepository as AdminAuthRepository;
use App\Repositories\Client\AuthRepository as ClientAuthRepository;
use App\Repositories\Admin\AutoDismantingRepository;
use App\Repositories\Admin\AutoRepository as AdminAutoRepository;
use App\Repositories\Client\AutoRepository as ClientAutoRepository;
use App\Repositories\Admin\AutoShippingRepository;
use App\Repositories\Admin\ClientFilterRepository;
use App\Repositories\Admin\ClientRepository;
use App\Repositories\Admin\InvoiceRepository;
use App\Repositories\Admin\PartRepository;
use App\Repositories\Client\OverviewRepository;
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
        //Admin
        $this->app->bind(AdminAuthContract::class,AdminAuthRepository::class);
        $this->app->bind(ClientContract::class,ClientRepository::class);
        $this->app->bind(ClientFilterContract::class,ClientFilterRepository::class);
        $this->app->bind(PartContract::class,PartRepository::class);
        $this->app->bind(AdminAutoContract::class,AdminAutoRepository::class);
        $this->app->bind(InvoiceContract::class,InvoiceRepository::class);
        $this->app->bind(AutoShippingContract::class,AutoShippingRepository::class);
        $this->app->bind(AutoDismantingContract::class,AutoDismantingRepository::class);


        //Client
        $this->app->bind(ClientAuthContract::class,ClientAuthRepository::class);
        $this->app->bind(OverviewContract::class,OverviewRepository::class);
        $this->app->bind(ClientAutoContract::class,ClientAutoRepository::class);
    }
}
