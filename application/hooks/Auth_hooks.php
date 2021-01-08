<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Hooks para validar la sesión y permisos del sistema
* ------------------------------------------------------------------------
*
* Hooks
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Auth_hooks
{

	protected $modulos_out 		= array();
	protected $auth_login		= '';
	protected $auth_logout		= '';
	protected $auth_controller	= '';
	protected $url 				= '';
	protected $controller 		= '';
	protected $modulos_in 		= '';

	/**
     * Constructor de la clase, inicializa variables
     *
     * @return	void
     */
	public function __construct()
	{
		$this->modulos_out 		= $this->config->item('auth_modulos_out');
		$this->modulos_in		= $this->config->item('auth_modulos_in');

		$this->auth_controller	= $this->config->item('auth_controller');
		$this->auth_login 		= $this->config->item('auth_controller').'/'.$this->config->item('auth_login');
		$this->auth_logout		= $this->config->item('auth_controller').'/'.$this->config->item('auth_logout');

		$this->url 				= $this->router->class.'/'.$this->router->method;
		$this->controller 		= $this->router->class;
	}
	// --------------------------------------------------------------------

	/**
     * Instanciamos el objeto CI de CodeIgniter
     *
     * @return	Object
     */
	public function __get($var)
	{
		return get_instance()->$var;
	}
	// -------------------------------------------------------------------

	/**
     * Verifica la sesion creada y las redirecciones
     *
     * @return	void
     */
	public function logged()
	{

		if( $this->auth->logged_in() && $this->url==$this->auth_login)
			redirect();
		else  if( !$this->auth->logged_in() && !in_array($this->controller,$this->modulos_out) && $this->controller!=$this->auth_controller)
			redirect($this->auth_login);
	}
	// --------------------------------------------------------------------

	/**
     * Valida permisos de cada usuario
     *
     * @return	void
     */
	public function permisos()
	{
		if( $this->auth->logged_in() ){

			if($this->controller!=$this->auth_controller && $this->auth->logged_user()->admin==0 && !in_array($this->controller,$this->modulos_in)  && !in_array($this->controller,$this->auth->get_modulos_array()) )
				$this->alertas->warning(base_url(),'Sin permisos para acceder a este modulo');
		}
	}
	// --------------------------------------------------------------------
	
}
/* Final del archivo Seguridad.php 
 * Ubicacion: ./hooks/Seguridad.php
 */