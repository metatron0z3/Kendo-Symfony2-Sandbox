<?php

namespace Kendo\KendoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = 'Maurice';
        return $this->render('KendoBundle:Default:index.html.twig', array('name' => $name));
    }
}
