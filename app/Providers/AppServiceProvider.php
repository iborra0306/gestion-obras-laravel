<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositorios\ClienteRepository;
use App\Repositorios\JsonClienteRepository;
use App\Repositorios\ArrayClienteRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ClienteRepository::class,
            fn () => new JsonClienteRepository(
                storage_path('app/clientes.json'),
                new ArrayClienteRepository(),
            ),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
