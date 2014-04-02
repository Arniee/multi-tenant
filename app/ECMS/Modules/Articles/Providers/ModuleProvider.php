<?php namespace ECMS\Modules\Articles\Providers;

use ECMS\Modules\Articles\Models\Article;
use ECMS\Contexts\TenantContext;
use ECMS\Modules\Tenants\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

use ECMS\Modules\Articles\Repositories\EloquentArticleRepository;

class ModuleProvider extends ServiceProvider {

    /**
     * Register
     */
    public function register()
    {
        $this->registerArticleRepository();
    }

    /**
     * Register Post Repository
     */
    public function registerArticleRepository()
    {
        $this->app->bind('ECMS\Modules\Articles\Repositories\ArticleRepository', function($app)
        {
            return new EloquentArticleRepository( new Article, $app['context'] );
        });

    }


}