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
use Illuminate\Container\Container;
use Laramore\Traits\Provider\MergesConfig;
use Laramore\Interfaces\{
	IsALaramoreManager, IsALaramoreProvider
};
use Laramore\Facades\Rule;

class RuleProvider extends ServiceProvider implements IsALaramoreProvider
{
    use MergesConfig;

    /**
     * Register our facade and create the manager.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/rule.php', 'rule',
        );

        $this->app->singleton('rule', function() {
            return static::generateManager();
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
            __DIR__.'/../../config/rule.php' => $this->app->make('path.config').DIRECTORY_SEPARATOR.'rule.php',
        ]);
    }

    /**
     * Return the default values for the manager of this provider.
     *
     * @return array
     */
    public static function getDefaults(): array
    {
        return \array_filter(Container::getInstance()->config->get('rule.configurations'));
    }

    /**
     * Generate the corresponded manager.
     *
     * @return IsALaramoreManager
     */
    public static function generateManager(): IsALaramoreManager
    {
        $class = Container::getInstance()->config->get('rule.manager');

        $manager = new $class();
        $manager->set(static::getDefaults());
        $manager->define('adds', []);
        $manager->define('removes', []);

        return $manager;
    }

    /**
     * Lock all managers after booting.
     *
     * @return void
     */
    public function bootedCallback()
    {
        Rule::lock();
    }
}
