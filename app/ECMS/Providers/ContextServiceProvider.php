<?php namespace ECMS\Providers;

use Illuminate\Support\ServiceProvider;

class ContextServiceProvider extends ServiceProvider {

    /**
     * Register
     */
    public function register()
    {
        $this->app['context'] = $this->app->share(function($app)
        {
            return new \ECMS\Contexts\TenantContext;
        });

        $this->app->bind('ECMS\Contexts\Context', function($app)
        {
            return $app['context'];
        });
    }

}