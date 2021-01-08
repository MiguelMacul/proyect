<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Helper de opciones de navegación
* ------------------------------------------------------------------------
*
* Este helper contene funciones para ayudar a mostrar el menu de
* navegación y sistema de nevegación
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/

/**
* Obitne el menu activo
*
* @param String
* @return  Object
*/
if ( ! function_exists('menu') )
{
	function menu($menu=''){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;

		if($controller==$menu)
		{
			return 'show';
		}

		return NULL;
	}
}
// --------------------------------------------------------------------

/**
* Obitne el submenumenu activo
*
* @param String
* @return  Object
*/
if ( ! function_exists('submenu') )
{
	function submenu($submenu=''){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;

		if($metodo==$submenu)
		{
			return 'active';
		}

		return NULL;
	}
}
// --------------------------------------------------------------------

/**
* Calcula el menu de navegacion
*
* @param 	String
* @param 	Array
* @return  	String
*/
if ( ! function_exists('navegacion') )
{
	function navegacion($titulo=NULL, $extra=array()){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$CI->load->helper('url');
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;

		if($metodo=='index')
			$metodo = 'Inicio';

		$menu = '';

		//Concatenamos el menu
		$menu .= '
		        <h6 class="header-pretitle">
		          '.ucwords(str_replace(array('-','_')," ",$controller)).'
		        </h6>
		        <!-- Title -->
		        <h1 class="header-title">
		          '.ucwords(str_replace(array('-','_')," ",$metodo)).'
		        </h1>
		';

		return $menu;
	}
}
// --------------------------------------------------------------------

/**
* Calcula el titulo de la pagina
*
* @param 	String
* @return  	String
*/
if ( ! function_exists('title') )
{
	function title($titulo=NULL){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$CI->load->helper('url');
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;

		$temp = '';

		if(!$titulo)
		{	
			if($metodo=='index')
			{
				$temp .= ucwords($controller);
			}
			else
			{
				$temp .= ucwords($controller).'|'.ucwords($metodo);
			}

			$titulo = $temp;
		}

		return $titulo;
	}
}
// --------------------------------------------------------------------