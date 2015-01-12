<?php
/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/12
 * Time: 21:43
 */

namespace KamedonQiitaBundle\EventListener;


use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class BeforeFilterControllerListener
{
    public function  onKernelController(FilterControllerEvent $event)
    {
        $c = $event->getController();
        if(!is_array($c)){
            return;
        }
        $controller = $c[0];
        if(method_exists($controller,'before')){
            $controller->before($event->getRequest());
        }
    }
}