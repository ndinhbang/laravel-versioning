<?php

namespace NeonDigital\Versioning;

use Illuminate\Support\Manager;
use NeonDigital\Versioning\Versioners\EloquentVersioner;

class VersionManager extends Manager
{
    /**
     * Get a driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Build a drafter instance
     *
     * @param  string  $provider
     * @param  array  $config
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    public function buildDrafter($className)
    {
        return $this->app->make($className);
    }

    /**
     * Create an eloquent model drafter
     *
     * @return EloquentVersioner
     */
    public function createEloquentDriver()
    {
        return $this->buildDrafter(EloquentVersioner::class);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return 'eloquent';
    }
}