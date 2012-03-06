<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;



class UsuarioController extends Controller
{
    
    public function loginAction()
    {
        $peticion = $this->getRequest();
		
		$sesion = $peticion->getSession();
		
		$error = $peticion->attributes->get(SecurityContext::AUTHENTICATION_ERROR, 
					$sesion->get(SecurityContext::AUTHENTICATION_ERROR));
					
		return $this->render('AgoratecVueloAppBundle:Usuario:login.html.twig', array(
						'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
						'error' => $error));

    }
}
