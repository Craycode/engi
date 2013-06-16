<?php

namespace Engi\Components;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Application configuration.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class Config
{
    /**
     * Configuration definition processor.
     * 
     * @var \Symfony\Component\Config\Definition\Processor 
     */
    protected $_processor;

    /**
     * Configuration definition.
     * 
     * @var \Symfony\Component\Config\Definition\ConfigurationInterface
     */
    protected $_definition;

    /**
     * Configuration array.
     * 
     * @var array
     */
    protected $_configuration;

    /**
     * Constructor
     * 
     * @param \Symfony\Component\Config\Definition\Processor $processor
     * @param \Symfony\Component\Config\Definition\ConfigurationInterface $definition
     * @param array $configuration Configuration array.
     */
    public function __construct(Processor $processor, ConfigurationInterface $definition, array $configuration)
    {
        $this->_definition = $definition;
        $this->_processor = $processor;
        $this->_configuration = $configuration;
    }

    /**
     * Returns configuration array.
     * 
     * @return array
     */
    public function get()
    {
        return $this->_processor->processConfiguration($this->_definition, $this->_configuration);
    }

}