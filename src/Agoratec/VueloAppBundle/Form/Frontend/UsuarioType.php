<?php

namespace Agoratec\VueloAppBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UsuarioType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder
		->add('nombre')
		->add('login')
		->add('password', 'repeated', array(
		'type' => 'password',
		'invalid_message' => 'Las dos contraseñas deben coincidir',
		'options' => array('label' => 'Contraseña')
		))		
		->add('email','email')
		//->add('fecha_nac', 'birthday')
		;
	}
	
	
	public function getName()
	{
		return 'agoratec_vueloappbundle_usuariotype';
	}
}
