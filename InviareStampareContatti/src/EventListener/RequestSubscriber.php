<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestSubscriber implements EventSubscriberInterface 

{
    private $logger;

    public function __construct(LoggerInterface $logger){

        $this -> logger= $logger;

    }
    public static function getSubscribedEvents()
    {
        return [RequestEvent::class => "onKernelRequest"];
    }
    public function onKernelRequest(RequestEvent $event )
    {
        $this -> logger-> info(json_encode([
            
            "myCustomPath" => $event -> getRequest() -> getPathInfo(),
            "myCustomDate" => date("Y/m/d")
        ]));
       

    }
}

