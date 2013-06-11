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
define('PATH_APPLICATION', realpath(__DIR__.DIRECTORY_SEPARATOR.'../'));
define('PATH_SRC', PATH_APPLICATION.DIRECTORY_SEPARATOR.'src');
define('PATH_CLASSES', PATH_SRC.DIRECTORY_SEPARATOR.'classes/');

/**
 * Require autoloader.
 */
require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Config;
use Symfony\Component\DependencyInjection;
use Symfony\Component\EventDispatcher;

/**
 * Class loading.
 */
$loader = new UniversalClassLoader();
$loader->useIncludePath(true);

// Namespaces.
$loader->registerNamespace('Engi', PATH_SRC);

$loader->register(true);
unset($loader);



