<?php

define('BASE_PATH', realpath(__DIR__));

/**
 * Get bootstrap.
 */

/* @var $container Symfony\Component\DependencyInjection\ContainerBuilder */
$container = require BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

/**
 * Run application.
 */

/* @var $application Engi\Application */
$application = $container->get('application');
$application->run();