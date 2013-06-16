<?php

namespace Engi\Components\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Service container.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class ServiceContainer
{
    /**
     * Service Container Instance.
     *
     * @var ContainerBuilder
     */
    private static $_container = null;

    /**
     * Returns a service container instance.
     *
     * @return ContainerBuilder
     */
    public static function get()
    {
        if (self::$_container == null)
        {
            throw new \ErrorException('Container not set.');
        }

        return self::$_container;
    }

    /**
     * Sets service container.
     *
     * @param ContainerBuilder $container Service container.
     *
     * @return void
     */
    public static function set(ContainerBuilder $container)
    {
        if (self::$_container !== null)
        {
            return;
        }

        self::$_container = $container;
    }

}