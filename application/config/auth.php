<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Auth Config
* -------------------------------------------------------------------------
*
* Este archivo de configuración sirve para el modulo de inicio de sesión
* y control de permisos a modulos
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/

/*
| -------------------------------------------------------------------------
| Tablas para la validación de sesiones
| -------------------------------------------------------------------------
*/
$config['auth_tablas']['usuarios'] 				= 'usuarios';
$config['auth_tablas']['grupos']    			= 'grupos';
$config['auth_tablas']['usuarios_grupos']    	= 'usuarios_grupos';
$config['auth_tablas']['permisos'] 				= 'permisos';
$config['auth_tablas']['modulos']   			= 'modulos';

$config['auth_joins']['usuarios']   			= 'usuario_id';
$config['auth_joins']['grupos']   				= 'grupo_id';
$config['auth_joins']['modulos']   				= 'modulo_id';


/*
| -------------------------------------------------------------------------
| Variables de sesión
| -------------------------------------------------------------------------
*/
$config['auth_idusuario'] 	= 'usuario_id';
$config['auth_username'] 	= 'email';
$config['auth_password'] 	= 'password';
$config['auth_admin'] 		= 'admin';

/*
| -------------------------------------------------------------------------
| Modulos permitidos sin inicio de sesión
| -------------------------------------------------------------------------
*/
$config['auth_modulos_out'] 	= array('api');

/*
| -------------------------------------------------------------------------
| Modulos permitidos con inicio de sesión
| -------------------------------------------------------------------------
*/
$config['auth_modulos_in'] 	= array('tablero');

/*
| -------------------------------------------------------------------------
| Controlador login
| -------------------------------------------------------------------------
*/

$config['auth_controller'] 	= 'log';
$config['auth_login'] 		= 'in';
$config['auth_logout'] 		= 'out';