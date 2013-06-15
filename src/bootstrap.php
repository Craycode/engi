<?php

/**
 * Set the default time zone.
 */
if (!ini_get('date.timezone'))
{
    date_default_timezone_set('Europe/London');
}

/**
 * Definitions.
 */
define('PATH_APPLICATION', realpath(__DIR__ . DIRECTORY_SEPARATOR . '../'));
define('PATH_SRC', PATH_APPLICATION . DIRECTORY_SEPARATOR . 'src');
define('PATH_CLASSES', PATH_SRC . DIRECTORY_SEPARATOR . 'classes');
define('PATH_CONFIG', PATH_SRC . DIRECTORY_SEPARATOR . 'config');

/**
 * Require autoloader.
 */
require 'vendor/autoload.php';

use Engi\Components\ConfigLoader\YamlConfigLoader;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Config;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\DependencyInjection;
use Symfony\Component\EventDispatcher;

/**
 * Class loading.
 */
$loader = new UniversalClassLoader;
$loader->useIncludePath(true);

// Namespaces.
$loader->registerNamespace('Engi', PATH_SRC);
$loader->register(true);

unset($loader);

/**
 * Config component.
 */
$configPaths = array(
    PATH_CONFIG,
);

$configLocator = new Config\FileLocator($configPaths);
$yamlConfigLoader = new YamlConfigLoader($configLocator);

// Use list of defined config loaders.
$configLoaders = array(
    $yamlConfigLoader,
);

$configLoaderResolver = new LoaderResolver($configLoaders);
$delegatingConfigLoader = new DelegatingLoader($configLoaderResolver);
