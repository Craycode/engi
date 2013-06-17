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

/**
 * Require autoloader.
 */
require 'vendor/autoload.php';

use Engi\Components\DependencyInjection\ServicesExtension;
use Engi\Components\DependencyInjection\ServiceContainer;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher;

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

// Compile container.
$container->compile();
ServiceContainer::set($container);

/**
 * Set application configuration.
 */
$config = ServiceContainer::get()->get('configuration');
Application::$config = $config->get();

/**
 * Event Dispatcher.
 */
$dispatcher = new ContainerAwareEventDispatcher($container);

// Add subscribers.
$dispatcher->addSubscriberService('subscriber_config', 'Engi\Subscribers\ConfigSubscriber');
$dispatcher->addSubscriberService('subscriber_world', 'Engi\Subscribers\WorldSubscriber');

Application::$dispatcher = $dispatcher;
