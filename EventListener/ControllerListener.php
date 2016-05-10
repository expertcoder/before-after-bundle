<?php

namespace ExpertCoder\BeforeAfterBundle\EventListener;

use ExpertCoder\BeforeAfterBundle\Other\ExecuteBeforeInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/*
 * Relevant web articles:
 * http://symfony.com/doc/current/cookbook/event_dispatcher/before_after_filters.html
 * https://github.com/symfony/symfony/issues/1975
 */

class ControllerListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        /*
         * $controller passed can be either a class or a Closure.
         * This is not usual in Symfony but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof ExecuteBeforeInterface )
        {
            $controller[0]->executeBefore($event);
        }
    }

}