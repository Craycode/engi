<?php
define('BASE_PATH', realpath(__DIR__));

/**
 * Get bootstrap.
 */
require BASE_PATH.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'bootstrap.php';

use Engi\Components\World;

$world = new World;