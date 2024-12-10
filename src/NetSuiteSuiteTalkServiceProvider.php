<?php

namespace Wjbecker\NetSuiteSuiteTalk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NetSuiteSuiteTalkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('netsuite_suitetalk')
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(NetSuiteSuiteTalkClient::class, function ($app) {
            return new NetSuiteSuiteTalkClient(config('netsuite_suitetalk'));
        });
    }
}
