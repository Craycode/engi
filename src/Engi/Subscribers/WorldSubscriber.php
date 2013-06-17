<?php

namespace Engi\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Engi\Events\World;

/**
 * World event subscriber.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class WorldSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            World\WorldEvents::LOAD => array(
                array('onWorldLoad', 1),
            ),
        );
    }

    /**
     * World load event handler.
     * 
     * @param \Engi\Events\World\LoadEvent $event
     */
    public function onWorldLoad(World\LoadEvent $event)
    {
        $subject = $event->getSubject();
        print_r('Reacting to world load event..' . "\n");
        print_r($subject);
    }

}