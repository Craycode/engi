<?php

namespace Engi;

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
define('PATH_MODELS', PATH_SRC . DIRECTORY_SEPARATOR . 'Engi' . DIRECTORY_SEPARATOR . 'Models');
define('PATH_DB', PATH_APPLICATION . DIRECTORY_SEPARATOR . 'db');

/**
 * Require autoloader.
 */
require 'vendor/autoload.php';

use Engi\Components\DependencyInjection\ServicesExtension;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

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
 * Paths to configuration files.
 */
$configPaths = array(
    PATH_CONFIG,
    PATH_CONFIG . DIRECTORY_SEPARATOR . 'services',
);

/**
 * Dependency injection container.
 */
$container = new ContainerBuilder(new ParameterBag($_SERVER));

// Register extensions.
$extension = new ServicesExtension($configPaths);
$container->registerExtension($extension);

// Load extensions.
$container->loadFromExtension($extension->getAlias());

// Doctrine.
$entityManager = EntityManager::create(
        array(
        'driver' => 'pdo_mysql',
        'user' => 'application',
        'password' => 'application',
        'dbname' => 'engi',
        ), Setup::createAnnotationMetadataConfiguration(array(PATH_MODELS), true)
);

$container->set('em', $entityManager);

// Compile container.
$container->compile();

return $container;
