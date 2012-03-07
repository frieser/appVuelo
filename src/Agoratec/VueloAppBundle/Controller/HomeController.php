<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Agoratec\VueloAppBundle\Lib\Geo\Point;


class HomeController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AgoratecVueloAppBundle:Home:index.html.twig');
    }
}
