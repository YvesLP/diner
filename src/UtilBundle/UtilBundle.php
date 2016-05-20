<?php

// src/Acme/UserBundle/AcmeUserBundle.php

namespace UtilBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UtilBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
