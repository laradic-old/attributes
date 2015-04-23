<?php namespace LaradicAdmin\Attributes;

/**
 * Part of the Attributes package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package        Attributes
 * @version        1.0.0
 * @author         Cartalyst LLC
 * @license        Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link           http://cartalyst.com
 */

class Entity
{

    /**
     * Holds all the cached attributes.
     *
     * @var array
     */
    protected static $attributesCache = [ ];

    /**
     * Caches all the available attributes, irrespective of model
     * instance (for speed).
     *
     * @return array
     */
    public static function availableAttributes($class)
    {
        $cacheKey = get_called_class();

        if ( ! isset(static::$attributesCache[ $cacheKey ]) )
        {
            static::$attributesCache[ $cacheKey ] = $class->newAttributeModel()->get();
        }

        return static::$attributesCache[ $cacheKey ];
    }

    /**
     * Clears the cache of the available attributes.
     *
     * @return void
     */
    public static function clearAttributesCache()
    {
        $cacheKey = get_called_class();

        if ( isset(static::$attributesCache[ $cacheKey ]) )
        {
            unset(static::$attributesCache[ $cacheKey ]);
        }
    }
}
