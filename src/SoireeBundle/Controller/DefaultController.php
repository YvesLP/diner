<?php

namespace SoireeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoireeBundle:Default:index.html.twig');
    }
}
