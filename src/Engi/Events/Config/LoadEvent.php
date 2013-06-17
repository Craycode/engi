<?php

namespace Engi\Events\Config;

use Engi\Components\Event\Event;
use Engi\Components\Config;

/**
 * Config load event.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class LoadEvent extends Event
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Config $config, array $arguments = array())
    {
        parent::__construct($config, $arguments);
    }
}