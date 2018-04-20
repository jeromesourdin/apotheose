<?php

namespace AppBundle\Controller;

use Prometheus\RenderTextFormat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/metrics", name="metrics")
     */
    public function metricsAction(Request $request)
    {
        $renderer = new RenderTextFormat();
        $registry = $this->get('Prometheus\CollectorRegistry');

        $diskTotal = disk_total_space('/');

        $gauge = $registry->getOrRegisterGauge('', 'disk_used_bytes', 'used disk size', []);
        $gauge->set($diskTotal - disk_free_space('/'), []);

        $gauge = $registry->getOrRegisterGauge('', 'disk_total_bytes', 'total disk size', []);
        $gauge->set($diskTotal, []);

        return new Response(
            $renderer->render($registry->getMetricFamilySamples()),
            200,
            ['Content-Type', RenderTextFormat::MIME_TYPE]
        );
    }
}
