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
use Laramore\Exceptions\ConfigException;
use ReflectionNamespace;

class GrammarTypesProvider extends ServiceProvider implements IsALaramoreProvider
{
    /**
     * Type manager.
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
            __DIR__.'/../../config/grammars.php', 'grammars',
        );

        $this->app->singleton('GrammarTypes', function() {
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
            __DIR__.'/../../config/grammars.php' => config_path('grammars.php'),
        ]);
    }

    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        $classes = config('grammars.configurations');

        switch ($classes) {
            case 'automatic':
                $classes = (new ReflectionNamespace(config('grammars.namespace')))->getClassNames();
                app('config')->set('grammars.configurations', $classes);

                return $classes;

            case 'disabled':
                return [];

            case 'base':
                return config('grammars.namespace');

            default:
                if (\is_array($classes)) {
                    return $classes;
                }
        }

        throw new ConfigException(
            'grammars.configurations', ["'automatic'", "'base'", "'disabled'", 'array of class names'], $classes
        );
    }

    /**
     * Generate the corresponded manager.
     *
     * @param  string $key
     * @return IsALaramoreManager
     */
    public static function generateManager(string $key): IsALaramoreManager
    {
        $class = config('grammars.manager');

        static::$managers[$key] = $manager = new $class();

        foreach (static::getDefaults() as $class) {
            if ($manager->doesManage($class)) {
                $manager->createHandler($class);
            }
        }

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
