<?php

namespace CrmResult\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \CrmResult\Interfaces\UserRepositoryInterface::class,
            \CrmResult\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \CrmResult\Interfaces\EmployeeRepositoryInterface::class,
            \CrmResult\Repositories\EmployeeRepositoryEloquent::class
        );
    }
}
