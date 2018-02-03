<?php namespace Vilbur\Portfolio\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class PortfolioServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
		/* ROUTES */
		$this->loadRoutesFrom(	__DIR__.'/../routes/routes.php');

		/* FACTORIES */
		$this->registerEloquentFactoriesFrom(__DIR__.'/../database/factories');

		$this->publishes([
			/* CONFIG */
			__DIR__.'/../../publish/config/Portfolio.php'	=> config_path('Portfolio.php'),

			/* DATABASE */
			__DIR__.'/../../publish/database'	=> $this->app->databasePath(),

			/* ASSETS JS */
			//__DIR__.'/../../publish/resources/assets/js'	=> resource_path("assets/js/portfolio"), // DISABLED PUBLISHING ON PACKAGE DEVELOPMENT

			/* ASSETS SASS */
			//__DIR__.'/../../publish/resources/assets/sass'	=> resource_path("assets/sass/portfolio"), // DISABLED PUBLISHING ON PACKAGE DEVELOPMENT

		], 'config');


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(){

        $this->app->bind('Portfolio', function(){
            return new \vilbur\Portfolio\Portfolio;
        });
        $this->mergeConfigFrom(	__DIR__.'/../../publish/config/Portfolio.php', 'Portfolio');
        $this->loadViewsFrom(	__DIR__.'/../../publish/views', 'Portfolio');

    }
    /**
     * Register factories.
     * Forum: https://github.com/laravel/framework/issues/11881#issuecomment-261688266
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }

}
