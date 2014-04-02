<?php

namespace ECMS\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider {

    /**
     * Register the service provider
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap the application events
     * @return void
     */
    public function boot()
    {
        \App::before(function($request)
        {

            // Set the application specific settings under elderingcms. prefix (elderingCMS.settingName)
            $settings = \App::make('SettingRepository');
            //$tenant = \App::make('TenantRepository');

            $tenant_id = currentTenantID();
            $settings->setTenant($tenant_id);

            // This one needs a little special attention
            //$dateFormats = \FI\Classes\Date::formats();
            //\Config::set('fi.datepickerFormat', $dateFormats[\Config::get('fi.dateFormat')]['datepicker']);

            // Set the environment timezone to the application specific timezone, if available, otherwise UTC
            //date_default_timezone_set((\Config::get('fi.timezone') ?: \Config::get('app.timezone')));

            //Override the framework mail configuration with the values provided by the application
            \Config::set('mail', array(
                    'driver'     => \Config::get('elderingcms.mailDriver'),
                    'host'       => \Config::get('elderingcms.mailHost'),
                    'port'       => \Config::get('elderingcms.mailPort'),
                    'encryption' => \Config::get('elderingcms.mailEncryption'),
                    'from' => array('address' => 'info@eldering-ict.nl', 'name' => 'Eldering CMS'),
                    'username'   => \Config::get('elderingcms.mailUsername'),
                    'password'   => (\Config::get('elderingcms.mailPassword')) ? \Crypt::decrypt(\Config::get('elderingcms.mailPassword')) : '',
                    'sendmail'   => \Config::get('elderingcms.mailSendmail')
                )
            );
        });

    }

}