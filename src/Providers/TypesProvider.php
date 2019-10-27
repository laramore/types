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
use Laramore\Elements\TypeManager;

class TypesProvider extends ServiceProvider implements IsALaramoreProvider
{
    /**
     * Type manager.
     *
     * @var TypeManager
     */
    protected static $manager;

    /**
     * Default manager to create.
     *
     * @var array
     */
    protected static $defaultTypes = [
        'boolean' => 'bool',
        'integer' => 'integer',
        'unsignedInteger' => 'integer',
        'increment' => 'integer',
        'string' => 'string',
        'text' => 'string',
        'char' => 'string',
        'timestamp' => 'string',
        'datetime' => 'string',
        'enum' => 'enum',
    ];

    /**
     * Create the TypeManager and lock it after booting.
     *
     * @return void
     */
    public function register()
    {
        static::getManager();

        $this->app->singleton('Types', function() {
            return static::getManager();
        });

        $this->app->booted([$this, 'bootedCallback']);
    }

    /**
     * Generate the corresponded manager.
     *
     * @return void
     */
    protected static function generateManager()
    {
        static::$manager = new TypeManager(static::$defaultTypes);
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
