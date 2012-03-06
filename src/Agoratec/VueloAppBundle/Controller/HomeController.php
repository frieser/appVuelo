<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    
    public function indexAction()
    {
		$em = $this->getDoctrine()->getEntityManager();
		$repository= $em->getRepository('AgoratecVueloAppBundle:Aeropuerto');
		
		$products = $repository->findAll();
		
        return $this->render('AgoratecVueloAppBundle:Home:index.html.twig');
    }
}
