<?php

namespace AppBundle\EventSubscriber;

use HRTime\StopWatch;
use Prometheus\CollectorRegistry;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestDurationSubscriber implements EventSubscriberInterface
{
    private $registry;
    private $timer;

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array('startTimer', 255),
            KernelEvents::TERMINATE => array('stopTimer', 255),
        );
    }

    public function __construct(CollectorRegistry $registry)
    {
        $this->registry = $registry;
        $this->timer = new Stopwatch();
    }

    public function startTimer(GetResponseEvent $event)
    {
        if ($event->isMasterRequest()) {
            $this->timer->start();
        }
    }

    public function stopTimer(PostResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $this->timer->stop();

        $histogram = $this->registry->getOrRegisterHistogram(
            '',
            'http_request_duration_seconds',
            'request duration',
            ['route'],
            [0.05, 0.1, 0.2, 0.5, 1, 2, 5]
        );

        $histogram->observe(
            $this->timer->getElapsedTime(),
            [$event->getRequest()->attributes->get('_route')]
        );
    }
}
