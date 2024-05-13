<?php
declare(strict_types=1);

namespace TheBasement\Libvirt;

use Illuminate\Support\ServiceProvider;
use TheBasement\Common\Services\ServerServiceFactory;

class LibvirtBasementServiceProvider extends ServiceProvider
{
    public function register()
    {
        // The User should be setting up the factory in their app service provider, so we'll just register the service.
        $this->app->make(ServerServiceFactory::class)
            ->register('libvirt', LibvirtService::class);
    }

    public function boot()
    {
        //
    }
}