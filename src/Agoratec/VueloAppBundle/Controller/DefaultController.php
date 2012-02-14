<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AgoratecVueloAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
