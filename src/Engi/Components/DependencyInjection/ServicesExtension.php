<?php

namespace Engi\Components\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Main dependency injection extension.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class ServicesExtension implements ExtensionInterface
{
    /**
     * Name of the services file.
     */
    const FILENAME_SERVICES = 'services.yml';

    /**
     * Configuration paths.
     * 
     * @var array
     */
    protected $_configPaths;

    /**
     * Constructor.
     * 
     * @param array $configPaths Configuration paths.
     */
    public function __construct(array $configPaths)
    {
        $this->_configPaths = $configPaths;
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $config, \Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        $fileLoader = new YamlFileLoader(
            $container, new FileLocator($this->_configPaths)
        );

        $fileLoader->load(self::FILENAME_SERVICES);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'main';
    }

    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getXsdValidationBasePath()
    {
        return false;
    }

}