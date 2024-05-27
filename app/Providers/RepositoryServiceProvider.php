<?php

namespace App\Providers;

use App\Contracts\Repositories\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class, function () {
            return new CustomerRepository(new Customer());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
