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
use Laramore\Interfaces\{
	IsALaramoreManager, IsALaramoreProvider
};
use Laramore\Traits\Provider\MergesConfig;

class RulesProvider extends ServiceProvider implements IsALaramoreProvider
{
    use MergesConfig;

    /**
     * Rule manager.
     *
     * @var array
     */
    protected static $managers;

    /**
     * Register our facade and create the manager.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/rules.php', 'rules',
        );

        $this->app->singleton('Rules', function() {
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
            __DIR__.'/../../config/rules.php' => config_path('rules.php'),
        ]);
    }

    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        return config('rules.configurations');
    }

    /**
     * Generate the corresponded manager.
     *
     * @param  string $key
     * @return IsALaramoreManager
     */
    public static function generateManager(string $key): IsALaramoreManager
    {
        $class = config('rules.manager');

        static::$managers[$key] = $manager = new $class();

        $manager->define('adds', []);
        $manager->define('removes', []);
        $manager->set(static::getDefaults());

        return $manager;
    }

    /**
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
