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
use Laramore\Grammars\GrammarTypeManager;

class GrammarTypesProvider extends ServiceProvider implements IsALaramoreProvider
{
    /**
     * Type manager.
     *
     * @var TypeManager
     */
    protected static $manager;

    /**
     * Default grammar namespace.
     *
     * @var string
     */
    protected $grammarNamespace = 'Illuminate\\Database\\Schema\\Grammars';

    /**
     * Register our facade and create the manager.
     *
     * @return void
     */
    public function register()
    {
        static::getManager();

        $this->app->singleton('GrammarTypes', function() {
            return static::getManager();
        });

        $this->app->booting([$this, 'bootingCallback']);
        $this->app->booted([$this, 'bootedCallback']);
    }

    /**
     * Generate the corresponded manager.
     *
     * @return void
     */
    protected static function generateManager()
    {
        static::$manager = new GrammarTypeManager();
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
     * Prepare grammar observable handlers before booting.
     * Create grammar observable handlers for each possible grammars and add them to the GrammarTypeManager.
     *
     * @return void
     */
    public function bootingCallback()
    {
        $manager = static::getManager();

        foreach ((new ReflectionNamespace($this->grammarNamespace))->getClassNames() as $class) {
            if ($manager->doesManage($class)) {
                $manager->createHandler($class);
            }
        }
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
