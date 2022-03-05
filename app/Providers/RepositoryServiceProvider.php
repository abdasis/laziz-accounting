<?php

namespace App\Providers;

use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\SupplierRepository;
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
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, SupplierRepository::class);
    }
}
