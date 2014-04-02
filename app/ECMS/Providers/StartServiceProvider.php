<?php

/**
 * This file is part of ElderingCMS.
 *
 * (c) ElderingCMS, <info@eldering-ict.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ECMS\Providers;

use Illuminate\Support\ServiceProvider;

class StartServiceProvider extends ServiceProvider {

    public function register() {


        $this->app->register('ECMS\Providers\ContextServiceProvider');
        $this->app->register('ECMS\Modules\Articles\Providers\ModuleProvider');


    }

}