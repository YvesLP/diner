<?php
// src/UserBundle/UserBundle.php
namespace UtilBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UtilBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

