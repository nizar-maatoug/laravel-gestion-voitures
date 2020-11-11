<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentVoitureRepository;
use App\Repositories\interfaces\VoitureRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     public $bindings=[

     ];
     public $singletons=[
        VoitureRepositoryInterface::class => EloquentVoitureRepository::class,

     ];
    public function register()
    {
        /* $this->app->bind(
            VoitureRepositoryInterface::class,
            EloquentVoitureRepository::class
        ); */
        /* $this->app->singleton(VoitureRepositoryInterface::class, function ($app) {
            return new EloquentVoitureRepository();
        }); */
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
