<?php

namespace ExpertCoder\BeforeAfterBundle\Other;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

interface ExecuteBeforeInterface
{
    public function executeBefore(FilterControllerEvent $event);
}