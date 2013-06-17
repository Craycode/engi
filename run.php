<?php

define('BASE_PATH', realpath(__DIR__));

/**
 * Get bootstrap.
 */
require BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use Engi\Application;
use Engi\Components\World;
use Engi\Events\World\WorldEvents;
use Engi\Events\World\LoadEvent;

$world = new World;
Application::$dispatcher->dispatch(WorldEvents::LOAD, new LoadEvent($world));