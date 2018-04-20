<?php

namespace Eni\UtilisateurBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EniUtilisateurBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
