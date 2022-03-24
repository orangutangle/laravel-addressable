<?php

declare(strict_types=1);

namespace CustomD\Addressable;

use CustomD\Addressable\Models\Address;
use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/config.php'), 'addressable');

        $this->app->singleton('addressable.addresss', config('addressable.models.address'));

        if(config('addressable.models.address') !== Address::class) {
            $this->app->alias('addressable.models.address', Address::class);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('addressable.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
