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
use Laramore\Exceptions\ConfigException;
use Laramore\Traits\Providers\MergesConfig;
use ReflectionNamespace;

class GrammarTypesProvider extends ServiceProvider implements IsALaramoreProvider
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
                return (new ReflectionNamespace(config('grammars.namespace')))->getClassNames();

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
            'grammars.classes', ["'automatic'", "'base'", "'disabled'", 'array of class names'], $classes
        );
    }

    /**
     * Generate the corresponded manager.
     *
     * @return void
     */
    protected static function generateManager()
    {
        $class = config('grammars.manager');

        static::$manager = new $class();

        foreach (static::getDefaults() as $class) {
            if (static::$manager->doesManage($class)) {
                static::$manager->createHandler($class);
            }
        }
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
