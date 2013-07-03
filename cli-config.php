<?php
define('BASE_PATH', realpath(__DIR__));

use Doctrine\ORM\Tools\Console\ConsoleRunner;

/**
 * Get bootstrap.
 */
require_once BASE_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

$helperSet = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));

ConsoleRunner::run($helperSet);