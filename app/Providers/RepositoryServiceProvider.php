<?php

namespace App\Providers;



use App\Contracts\ContractRepositories\Admin\GroupContract;
use App\Contracts\ContractRepositories\Admin\ParserContract;
use App\Contracts\ContractRepositories\Admin\PaymentContract;
use App\Contracts\ContractRepositories\Admin\PriceContract;
use App\Repositories\Admin\GroupRepository;
use App\Repositories\Admin\ParserRepository;
use App\Repositories\Admin\PaymentRepository;
use App\Repositories\Admin\PriceRepository;
use Illuminate\Support\ServiceProvider;

//Admin
use App\Contracts\ContractRepositories\Admin\AutoContract as AdminAutoContract;
use App\Contracts\ContractRepositories\Admin\AutoDismantingContract;
use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
use App\Contracts\ContractRepositories\Admin\InvoiceContract;
use App\Contracts\ContractRepositories\Admin\PartContract as AdminPartContract;
use App\Contracts\ContratRepositories\Admin\AuthContract as AdminAuthContract;
use App\Contracts\ContratRepositories\Admin\ClientContract;
use App\Contracts\ContratRepositories\Admin\ClientFilterContract;
use App\Repositories\Admin\AuthRepository as AdminAuthRepository;
use App\Repositories\Admin\AutoDismantingRepository;
use App\Repositories\Admin\AutoRepository as AdminAutoRepository;
use App\Repositories\Admin\AutoShippingRepository;
use App\Repositories\Admin\ClientFilterRepository;
use App\Repositories\Admin\ClientRepository;
use App\Repositories\Admin\InvoiceRepository;
use App\Repositories\Admin\PartRepository as AdminPartRepository;
use App\Contracts\ContratRepositories\Admin\AutoNoteContract as AdminAutoNoteContract;
use App\Repositories\Admin\AutoNoteRepository as AdminAutoNoteRepository;
use App\Contracts\ContractRepositories\Admin\ContainerContract;
use App\Repositories\Admin\ContainerRepository;


//Client
use App\Contracts\ContratRepositories\Client\AuthContract as ClientAuthContract;
use App\Repositories\Client\AuthRepository as ClientAuthRepository;
use App\Contracts\ContratRepositories\Client\OverviewContract;
use App\Repositories\Client\OverviewRepository;
use App\Contracts\ContractRepositories\Client\AutoContract as ClientAutoContract;
use App\Repositories\Client\AutoRepository as ClientAutoRepository;
use App\Contracts\ContractRepositories\Client\AutoDismantingContract as ClientAutoDismantingContract;
use App\Repositories\Client\AutoDismantingRepository as ClientAutoDismantingRepository;
use App\Contracts\ContractRepositories\Client\AutoShippingContract as ClientAutoShippingContract;
use App\Repositories\Client\AutoShippingRepository as ClientAutoShippingRepository;
use App\Contracts\ContractRepositories\Client\InvoiceContract as ClientInvoiceContract;
use App\Repositories\Client\InvoiceRepository as ClientInvoiceRepository;
use App\Contracts\ContratRepositories\Client\ProfileContract;
use App\Repositories\Client\ProfileRepository;
use App\Contracts\ContractRepositories\Client\PartContract as ClientPartContract;
use App\Repositories\Client\PartRepository as ClientPartRepository;
use App\Contracts\ContratRepositories\Client\AutoNoteContract;
use App\Contracts\ContratRepositories\Client\NotificationContract;
use App\Repositories\Client\AutoNoteRepository;
use App\Repositories\Client\NotificationRepository;


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
        $this->app->bind(AdminPartContract::class, AdminPartRepository::class);
        $this->app->bind(AdminAutoContract::class,AdminAutoRepository::class);
        $this->app->bind(InvoiceContract::class,InvoiceRepository::class);
        $this->app->bind(AutoShippingContract::class,AutoShippingRepository::class);
        $this->app->bind(AutoDismantingContract::class,AutoDismantingRepository::class);
        $this->app->bind(AdminAutoNoteContract::class, AdminAutoNoteRepository::class);
        $this->app->bind(GroupContract::class, GroupRepository::class);
        $this->app->bind(PriceContract::class, PriceRepository::class);
        $this->app->bind(PaymentContract::class, PaymentRepository::class);
        $this->app->bind(ParserContract::class, ParserRepository::class);
        $this->app->bind(ContainerContract::class, ContainerRepository::class);


        //Client
        $this->app->bind(ClientAuthContract::class,ClientAuthRepository::class);
        $this->app->bind(ClientAutoDismantingContract::class, ClientAutoDismantingRepository::class);
        $this->app->bind(ClientAutoShippingContract::class, ClientAutoShippingRepository::class);
        $this->app->bind(OverviewContract::class,OverviewRepository::class);
        $this->app->bind(ClientAutoContract::class,ClientAutoRepository::class);
        $this->app->bind(ClientInvoiceContract::class, ClientInvoiceRepository::class);
        $this->app->bind(ProfileContract::class,ProfileRepository::class);
        $this->app->bind(ClientPartContract::class, ClientPartRepository::class);
        $this->app->bind(NotificationContract::class, NotificationRepository::class);
        $this->app->bind(AutoNoteContract::class, AutoNoteRepository::class);
    }
}
