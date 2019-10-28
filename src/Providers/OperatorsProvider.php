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
use Laramore\Elements\OperatorManager;

class OperatorsProvider extends ServiceProvider implements IsALaramoreProvider
{
    /**
     * Default types to create.
     *
     * @var array
     */
    protected $defaultOperators = [
        'null' => ['null', 'null'],
        'isNull' => ['null', 'null'],
        'notNull' => ['notNull', 'null'],
        'isNotNull' => ['notNull', 'null'],
        'doesntExist' => ['null', 'null'],
        'dontExist' => ['null', 'null'],
        'exist' => ['notNull', 'null'],
        'exists' => ['notNull', 'null'],
        'equal' => '=',
        'inf' => '<',
        'sup' => '>',
        'infOrEq' => '<=',
        'supOrEq' => '>=',
        'safeNotEqual' => '<>',
        'notEqual' => '!=',
        'safeEqual' => '<=>',
        'like' => 'like',
        'likeBinary' => 'like binary',
        'notLike' => 'not like',
        'ilike' => 'ilike',
        'notIlike' => 'not ilike',
        'rlike', 'rlike',
        'regexp' => 'regexp',
        'notRegexp' => 'not regexp',
        'similarTo' => 'similar to',
        'notSimilarTo' => 'not similar to',
        'bitand' => ['&', 'binary'],
        'bitor' => ['|', 'binary'],
        'bitxor' => ['^', 'binary'],
        'bitleft' => ['<<', 'binary'],
        'bitright' => ['>>', 'binary'],
        'match' => '~',
        'imatch' => '~*',
        'notMatch' => '!~',
        'notImatch' => '!~*',
        'same' => '~~',
        'isame' => '~~*',
        'notSame' => '!~~',
        'notIsame' => '!~~*',
        'in' => ['in', 'collection'],
        'notIn' => ['not in', 'collection'],
    ];

    /**
     * Create the OperatorManager and lock it after booting.
     *
     * @return void
     */
    public function register()
    {
        static::getManager();

        $this->app->singleton('Operators', function() {
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
        static::$manager = new OperatorManager(static::$defaultOperators);
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
