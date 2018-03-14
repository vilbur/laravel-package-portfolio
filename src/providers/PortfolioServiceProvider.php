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
		$this->loadRoutesFrom( __DIR__.'/../routes/routes.php', 'portfolio');

		/* FACTORIES */
		$this->registerEloquentFactoriesFrom(__DIR__.'/../database/factories', 'portfolio');

		/* FACTORIES */
		$this->publishes([

			/* DATABASE */
			__DIR__.'/../../publish/database'	=> $this->app->databasePath(),

			/* ASSETS JS */
			__DIR__.'/../../publish/resources/assets/js'	=> resource_path("assets/js/portfolio"),

			/* ASSETS SASS */
			__DIR__.'/../../publish/resources/assets/sass'	=> resource_path("assets/sass/portfolio"),

		], 'vilbur/portfolio');


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
