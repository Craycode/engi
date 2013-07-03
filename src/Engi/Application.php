<?php

namespace Engi;

use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * Application class.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class Application extends SymfonyApplication
{
	/**
     * Configuration array.
     * 
     * @var array
     */
    public static $config = null;

    /**
     * Service container.
     * 
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected $_container;

    /**
     * Constructor.
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function __construct(\Symfony\Component\DependencyInjection\ContainerBuilder $container, $name = "Unknown", $version = "Unknown")
    {
		parent::__construct($name, $version);
        $this->_container = $container;
    }
	
	/**
	 * Get the service container.
	 * 
	 * @return \Symfony\Component\DependencyInjection\ContainerBuilder
	 */
	public function getContainer()
	{
		return $this->_container;
	}
}
