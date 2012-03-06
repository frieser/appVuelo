<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Agoratec\VueloAppBundle\Entity\Aeropuerto;
use Agoratec\VueloAppBundle\Lib\Geo\Point;


class HomeController extends Controller
{
    
    public function indexAction()
    {
    	//$air=new Aeropuerto();
		//$air->setNombre('test');
		//$air->setTipo('O');
		//$air->setPosicion(Point::fromLonLat(35,23));
			
		
		$em = $this->getDoctrine()->getEntityManager();
		
		//$em->persist($air);
		//$em->flush();
		$repository= $em->getRepository('AgoratecVueloAppBundle:Zona');
		
		$aeropuertos = $repository->findAll();
		
		
					
		//return new Response($products->getPosicion());
		return $this->render('AgoratecVueloAppBundle:Home:test.html.twig',array('aeropuertos' => $aeropuertos));
        //	return $this->render('AgoratecVueloAppBundle:Home:index.html.twig');
    }
}
