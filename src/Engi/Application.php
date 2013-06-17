<?php

namespace Engi;

/**
 * Application helper.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class Application
{
    /**
     * Configuration array.
     * 
     * @var array
     */
    public static $config = null;

    /**
     * Event Dispatcher.
     * 
     * @var \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher
     */
    public static $dispatcher = null;

}
