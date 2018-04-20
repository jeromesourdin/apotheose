<?php

namespace Eni\UtilisateurBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType;

class InscriptionType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('captcha', 'genemu_captcha', array(
            'mapped' => false,
        ));
    }

    public function getName()
    {
        return 'eni_utilisateur_inscription';
    }
}