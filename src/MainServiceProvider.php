<?php
namespace RentalManager\Main;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 7:55 AM
 */


/**
 * Class MainServiceProvider
 * @package RentalManager\Main
 */
class MainServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        'MakeContact' => 'command.rentalmanager.contact',
        'MakeLeaseDuration' => 'command.rentalmanager.lease-duration',
        'MakeLocation' => 'command.rentalmanager.location',
        'MakeProperty' => 'command.rentalmanager.property',
        'MakePropertyType' => 'command.rentalmanager.property-type',
        'MakeProvider' => 'command.rentalmanager.provider',
        'MakeRentalRestriction' => 'command.rentalmanager.rental-restriction',
        'MakeRentalType' => 'command.rentalmanager.rental-type',
        'MakeUnit' => 'command.rentalmanager.unit',
        'Seeder' => 'command.rentalmanager.seeder',
        'Setup' => 'command.rentalmanager.setup',
        'SetupModels' => 'command.rentalmanager.setup-models',
    ];




    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Merge config file for the current app
        $this->mergeConfigFrom(__DIR__.'/../config/rentalmanager.php', 'rentalmanager');

        // Publish the config files
        $this->publishes([
            __DIR__.'/../config/rentalmanager.php' => config_path('rentalmanager.php')
        ], 'base');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the app
        $this->registerApp();

        // Register Commands
        $this->registerCommands();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerApp()
    {
        $this->app->bind('rentalmanager', function ($app) {
            return new Main($app);
        });

        $this->app->alias('rentalmanager', 'RentalManager\Main');
    }

    /**
     * Register the given commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        foreach (array_keys($this->commands) as $command) {
            $method = "register{$command}Command";
            call_user_func_array([$this, $method], []);
        }
        $this->commands(array_values($this->commands));
    }

    protected function registerSeederCommand()
    {
        $this->app->singleton('command.rentalmanager.seeder', function () {
            return new \RentalManager\Main\Commands\SeederCommand();
        });
    }

    protected function registerSetupCommand()
    {
        $this->app->singleton('command.rentalmanager.setup', function () {
            return new \RentalManager\Main\Commands\SetupCommand();
        });
    }

    protected function registerSetupModelsCommand()
    {
        $this->app->singleton('command.rentalmanager.setup-models', function () {
            return new \RentalManager\Main\Commands\SetupModelsCommand();
        });
    }

    // Models
    protected function registerMakeLeaseDurationCommand()
    {
        $this->app->singleton('command.rentalmanager.lease-duration', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeLeaseDurationCommand($app['files']);
        });
    }

    protected function registerMakeContactCommand()
    {
        $this->app->singleton('command.rentalmanager.contact', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeContactCommand($app['files']);
        });
    }

    protected function registerMakeLocationCommand()
    {
        $this->app->singleton('command.rentalmanager.location', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeLocationCommand($app['files']);
        });
    }

    protected function registerMakePropertyCommand()
    {
        $this->app->singleton('command.rentalmanager.property', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakePropertyCommand($app['files']);
        });
    }

    protected function registerMakePropertyTypeCommand()
    {
        $this->app->singleton('command.rentalmanager.property-type', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakePropertyTypeCommand($app['files']);
        });
    }

    protected function registerMakeProviderCommand()
    {
        $this->app->singleton('command.rentalmanager.provider', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeProviderCommand($app['files']);
        });
    }

    protected function registerMakeRentalRestrictionCommand()
    {
        $this->app->singleton('command.rentalmanager.rental-restriction', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeRentalRestrictionCommand($app['files']);
        });
    }

    protected function registerMakeRentalTypeCommand()
    {
        $this->app->singleton('command.rentalmanager.rental-type', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeRentalTypeCommand($app['files']);
        });
    }


    protected function registerMakeUnitCommand()
    {
        $this->app->singleton('command.rentalmanager.unit', function ($app) {
            return new \RentalManager\Main\Commands\Generators\MakeUnitCommand($app['files']);
        });
    }


    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return array_values($this->commands);
    }
}
