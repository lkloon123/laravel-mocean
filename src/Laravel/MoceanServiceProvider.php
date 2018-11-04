<?php

namespace NeoSon\Mocean\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use NeoSon\Mocean\Manager;
use NeoSon\Mocean\MoceanInterface;

class MoceanServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot method.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('mocean.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'mocean');
    }

    public function register()
    {
        // Register manager for usage with the Facade.
        $this->app->singleton('mocean', function () {
            $config = $this->config();

            return new Manager($config['default'], $config['accounts']);
        });

        // Define an alias.
        $this->app->alias('mocean', Manager::class);

        // Register MoceanInterface concretion.
        $this->app->singleton(MoceanInterface::class, function () {
            return $this->app->make('mocean')->defaultConnection();
        });
    }

    /**
     * @return array
     */
    protected function config()
    {
        return $this->app['config']->get('mocean.mocean');
    }
}
