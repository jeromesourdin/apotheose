<?php

namespace Eni\DemoBundle\Controller;

use Eni\DemoBundle\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $livres = $this->getDoctrine()
            ->getRepository('EniDemoBundle:Livre')
            ->findAll()
        ;
        
        return array('livres' => $livres);
    }

    /**
     * @Route("/voir/{slug}", name="eni_demo_voir_auteur")
     * @Template()
     */
    public function voirAuteurAction(Auteur $auteur)
    {
        return array('auteur' => $auteur);
    }
}
