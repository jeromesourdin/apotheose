<?php

namespace Eni\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/admin", name="admin")
     * @Template
     */
    public function adminAction()
    {
        return array();
    }

    /**
     * @Route("/login", name="login")
     * @Template
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        return [
            'last_username' => $authUtils->getLastUsername(),
            'error'         => $authUtils->getLastAuthenticationError(),
        ];
    }
}
