<?php
/**
 * Load and prepare Models.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Providers;

use Illuminate\Support\ServiceProvider;
use Laramore\Interfaces\IsALaramoreProvider;

class OperatorsProvider extends ServiceProvider implements IsALaramoreProvider
{
    /**
     * Type manager.
     *
     * @var OperatorManager
     */
    protected static $manager;

    /**
     * Publish the config linked to the manager.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/operators.php' => config_path('operators.php'),
        ]);
    }

    /**
     * Create the OperatorManager and lock it after booting.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/operators.php', 'operators',
        );

        static::getManager();

        $this->app->singleton('Operators', function() {
            return static::getManager();
        });

        $this->app->booted([$this, 'bootedCallback']);
    }

    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        return config('operators.defaults');
    }

    /**
     * Generate the corresponded manager.
     *
     * @return void
     */
    protected static function generateManager()
    {
        $class = config('operators.manager');

        static::$manager = new $class(static::getDefaults());
    }

    /**
     * Return the generated manager for this provider.
     *
     * @return object
     */
    public static function getManager(): object
    {
        if (\is_null(static::$manager)) {
            static::generateManager();
        }

        return static::$manager;
    }

    /**
     * Lock all managers after booting.
     *
     * @return void
     */
    public function bootedCallback()
    {
        static::getManager()->lock();
    }
}
