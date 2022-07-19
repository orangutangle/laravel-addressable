<?php

declare(strict_types=1);

namespace CustomD\Addressable;

use CustomD\Addressable\Models\Address;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AddressesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('addressable')
            ->hasConfigFile()
            ->hasMigration('create_addresses_table');
    }

    public function packageRegistered()
    {

        $this->app->singleton('addressable.addresss', config('addressable.models.address'));

        if (config('addressable.models.address') !== Address::class) {
            $this->app->alias('addressable.models.address', Address::class);
        }
    }
}
