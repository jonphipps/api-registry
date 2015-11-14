<?php

namespace App\Providers;

    use Barryvdh\Debugbar\Facade;
    use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
    use Bestmomo\Scafold\ScafoldServiceProvider;
    use Illuminate\Support\ServiceProvider;
    use Casa\Generator\GeneratorServiceProvider;
    use Way\Generators\GeneratorsServiceProvider;
    use Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider;

    class LocalServiceProvider extends ServiceProvider
{

    protected $providers = [
        GeneratorsServiceProvider::class,
        MigrationsGeneratorServiceProvider::class,
        \Barryvdh\Debugbar\ServiceProvider::class,
        IdeHelperServiceProvider::class,
        GeneratorServiceProvider::class,
        ScafoldServiceProvider::class,
    ];
    protected $aliases = [
        'Debugbar'  => Facade::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //register the service providers for local environment
        if ('local' == $this->app->environment() && !empty($this->providers)) {
            foreach ($this->providers as $provider) {
                $this->app->register($provider);
            }
            //register the alias
            if (!empty($this->aliases)) {
                foreach ($this->aliases as $alias => $facade) {
                    $this->app->alias($alias, $facade);
                }
            }
        }

    }
}
