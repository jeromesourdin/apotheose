<?php

namespace Eni\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        if ($this->has('my_pdo')) {
            try {
                $pdo = $this->get('my_pdo');
                $connected = true;
            } catch (\Exception $e) {
                $connected = false;
                $message = $e->getMessage();
            }
        } else {
            $connected = false;
        }

        return array(
            'connected' => $connected,
            'message' => isset($message) ? $message : null,
        );
    }
}
