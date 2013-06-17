<?php

namespace Engi\Events\World;

use Engi\Components\Event\Event;
use Engi\Components\World;

/**
 * World load event.
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
    public function __construct(World $world, array $arguments = array())
    {
        parent::__construct($world, $arguments);
    }

}