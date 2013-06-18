<?php

define('BASE_PATH', realpath(__DIR__));

/**
 * Get bootstrap.
 */
$container = require BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

/**
 * Run application.
 */
$container
    ->get('application')
    ->run();