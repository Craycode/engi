<?php

namespace Engi\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Engi\Events\Config\LoadEvent;
use Engi\Events\Config\ConfigEvents;

/**
 * Config event subscriber.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class ConfigSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            ConfigEvents::LOAD => array(
                array('onConfigLoad', 1),
            ),
        );
    }

    /**
     * Config load event handler.
     * 
     * @param \Engi\Events\Config\LoadEvent $event
     */
    public function onConfigLoad(LoadEvent $event)
    {
        $subject = $event->getSubject();
        print_r('Reacting to config load event..' . "\n");
        print_r($subject);
    }

}