<?php

namespace Agoratec\VueloAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Agoratec\VueloAppBundle\Form\Frontend\UsuarioType;

use Agoratec\VueloAppBundle\Entity\Usuario;



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
	
	public function registroAction()
	{
		$peticion = $this->getRequest();
		
		$usuario = new Usuario();
		$formulario = $this->createForm(new UsuarioType(), $usuario);
		
		if ($peticion->getMethod() == 'POST') {
			$formulario->bindRequest($peticion);
			if ($formulario->isValid()) {
				$encoder = $this->get('security.encoder_factory')
				->getEncoder($usuario);
				$usuario->setSalt(md5(time()));
				$passwordCodificado = $encoder->encodePassword(
				$usuario->getPassword(),
				$usuario->getSalt()
				);
				$usuario->setPassword($passwordCodificado);
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($usuario);
				$em->flush();
				$this->get('session')->setFlash('info','¡Enhorabuena! Te has registrado correctamente en AppVuelo');
				$token = new UsernamePasswordToken(
							$usuario,
							$usuario->getPassword(),
							'usuarios',
							$usuario->getRoles()
							);
							$this->container->get('security.context')->setToken($token);
				
			}
			return $this->redirect($this->generateUrl('AgoratecVueloAppBundle_homepage'));
		}
		
			
		return $this->render(
			'AgoratecVueloAppBundle:Usuario:registro.html.twig',array('formulario' => $formulario->createView()));
		
	}
	
}
