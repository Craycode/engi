<?php

namespace Engi;

use Engi\Events\World\WorldEvents;
use Engi\Events\World\LoadEvent;

/**
 * Application class.
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
     * Service container.
     * 
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    public $container;

    /**
     * Constructor.
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function __construct(\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        $this->container = $container;
    }

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

    /**
     * Run the application.
     * 
     * @return void
     */
    public function run()
    {
        print_r('Running..'."\n");
        $world = new Components\World();
        $this->container->get('event_dispatcher')->dispatch(WorldEvents::LOAD, new LoadEvent($world));
    }

}
