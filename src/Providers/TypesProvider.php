<?php
/**
 * Prepare type manager.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Providers;

use Illuminate\Support\ServiceProvider;
use Laramore\Interfaces\IsALaramoreProvider;
use Laramore\Traits\Providers\MergesConfig;

class TypesProvider extends ServiceProvider implements IsALaramoreProvider
{
    use MergesConfig;

    /**
     * Type manager.
     *
     * @var TypeManager
     */
    protected static $manager;

    /**
     * Register our facade and create the manager.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/types.php', 'types',
        );

        $this->app->singleton('Types', function() {
            return static::getManager();
        });

        $this->app->booted([$this, 'bootedCallback']);
    }


    /**
     * Publish the config linked to the manager.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/types.php' => config_path('types.php'),
        ]);
    }
    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        return config('types.configurations');
    }

    /**
     * Generate the corresponded manager.
     *
     * @return void
     */
    protected static function generateManager()
    {
        $class = config('types.manager');

        static::$manager = new $class();
        static::$manager->define('default_rules', ['visible', 'fillable', 'required']);
        static::$manager->set(static::getDefaults());
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
