<?php

namespace ToxicLemurs\DomainHelper;

use Illuminate\Support\ServiceProvider;

/**
 * Class DomainHelperServiceProvider
 * @package ToxicLemurs
 */
class DomainHelperServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDomainHelper();
    }

    /**
     * Register the menu builder service
     *
     * @return void
     */
    private function registerDomainHelper()
    {
        $this->app->bind('domainHelper', function ($app) {
            return new DomainHelper($app);
        });
    }
}
