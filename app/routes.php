<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/test', function()
{
    $client = ECMS\Modules\Tenants\Models\Tenant::find(2);
    //return $client;
    $context = App::make('ECMS\Contexts\Context');
    $context->set($client);
    //var_dump($context);
    $repository = App::make('ECMS\Modules\Articles\Repositories\ArticleRepository');

    $articles = $repository->all();

    foreach($articles as $article)
    {
        var_dump($article->title);
    }
});