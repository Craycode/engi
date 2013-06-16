<?php

namespace Engi\Components\ConfigLoader;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * YAML config file loader.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class YamlSettingsLoader extends FileLoader
{
    /**
     * {@inheritdoc}
     */
    public function load($resource, $type = null)
    {
        $config = Yaml::parse($this->locator->locate($resource));

        // Remove imports section.
        unset($config['imports']);

        return $config;
    }
    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return
            is_string($resource) &&
            'yml' === pathinfo($resource, PATHINFO_EXTENSION) &&
            FALSE === strpos(pathinfo($resource, PATHINFO_DIRNAME), 'services');
    }
}