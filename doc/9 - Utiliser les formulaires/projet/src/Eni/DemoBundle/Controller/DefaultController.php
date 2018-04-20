<?php

namespace Eni\DemoBundle\Controller;

use Eni\DemoBundle\Model\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder(new Client)
            ->add('nom', TextType::class)
            ->add('date_de_naissance', BirthdayType::class)
            ->add('valider', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            // traitement de l'objet client
            // ...
        }

        return array(
            'form' => $form->createView(),
            'client' => isset($client) ? $client : null,
        );
    }
}
