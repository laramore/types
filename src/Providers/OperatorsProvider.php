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
use Laramore\Interfaces\{
	IsALaramoreManager, IsALaramoreProvider
};
use Laramore\Traits\Provider\MergesConfig;

class OperatorsProvider extends ServiceProvider implements IsALaramoreProvider
{
    use MergesConfig;

    /**
     * Type manager.
     *
     * @var array
     */
    protected static $managers;

    /**
     * Create the OperatorManager and lock it after booting.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/operators.php', 'operators',
        );

        $this->app->singleton('Operators', function() {
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
            __DIR__.'/../../config/operators.php' => config_path('operators.php'),
        ]);
    }

    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        return config('operators.configurations');
    }

    /**
     * Generate the corresponded manager.
     *
     * @param  string $key
     * @return IsALaramoreManager
     */
    public static function generateManager(string $key): IsALaramoreManager
    {
        $class = config('operators.manager');

        static::$managers[$key] = $manager = new $class();
        $manager->set(static::getDefaults());
        $manager->define('needs', 'value');

		return $manager;
    }

    /**
     * Return the generated manager for this provider.
     *
     * @return IsALaramoreManager
     */
    public static function getManager(): IsALaramoreManager
    {
        $appHash = \spl_object_hash(app());

        if (!isset(static::$managers[$appHash])) {
            return static::generateManager($appHash);
        }

        return static::$managers[$appHash];
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
