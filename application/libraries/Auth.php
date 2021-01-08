<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Libreria de Sesiones en Sistema
* ------------------------------------------------------------------------
*
* Esta libreria Ccontiene funciones para el inicio de sesiones
* y validaciones de modulos del sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Auth
{

	//Variable de entorno
	protected $tablas = array();
	protected $joins = array();

	protected $userid = NULL;
	protected $username = NULL;

	/**
     * Constructor de la clase, inicializa variables
     *
     * @return	void
     */
	public function __construct()
	{
		$this->load->library('bcrypt');

		$this->tablas 	= $this->config->item('auth_tablas');
		$this->joins 	= $this->config->item('auth_joins');

		$this->userid 	= $this->config->item('auth_idusuario');
		$this->username = $this->config->item('auth_username');
		$this->password = $this->config->item('auth_password');
	}
	// -------------------------------------------------------------------

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
     * Función para iniciar sesión en el sistema
     *
     * @return  Boolean
     */
	public function login($username=NULL, $password=NULL)
	{	
		//Validamos usuario
		if ($user = $this->get_user($username)) {

			//Validamos contraseña
			if( $this->bcrypt->check_password($password, $user->{$this->password}) ){

				//Creamos la sesión deñ sistema
				$session_data = array(
		            "logged"    		=> TRUE,
		            $this->userid   	=> $user->{$this->userid},
		            $this->username    	=> $user->{$this->username}
		        );

        		$this->session->set_userdata($session_data);

        		return TRUE;
			}
		}

		return FALSE;
	}
	// -------------------------------------------------------------------

	/**
     * Función para obtener el uuario logeado
     *
     * @return  Boolean
     */
	public function logged_user()
	{
		if ($this->logged_in()) {

			//Config
			$idusuario 	= $this->session->userdata($this->userid);

			//Consultas
			$this->db->trans_start();

			$this->db->join(
				    $this->tablas['usuarios_grupos'],
				    $this->tablas['usuarios_grupos'].'.'.$this->joins['usuarios'].'='.$this->tablas['usuarios'].'.'.$this->joins['usuarios']
				);

			$this->db->join(
				    $this->tablas['grupos'],
				    $this->tablas['grupos'].'.'.$this->joins['grupos'].'='.$this->tablas['usuarios_grupos'].'.'.$this->joins['grupos']
				);

			$this->db->where($this->tablas['usuarios'].'.'.$this->userid,$idusuario);

			$query = $this->db->get($this->tablas['usuarios'])->row();

			$this->db->trans_complete();

			return $query;
		}

		return FALSE;
	}
	// -------------------------------------------------------------------

	/**
     * Función para validar super admin
     *
     * @return  Array
     */
	public function get_modulos()
	{
		if ($user = $this->logged_user()) {

			//Listamos los domulos permitidos para el usuario
			//Consultas
			$this->db->trans_start();

			$this->db->join(
				    $this->tablas['permisos'],
				    $this->tablas['permisos'].'.'.$this->joins['modulos'].'='.$this->tablas['modulos'].'.'.$this->joins['modulos']
				);

			$this->db->where($this->tablas['permisos'].'.'.$this->joins['grupos'],$user->{$this->joins['grupos']});

			$query = $this->db->get($this->tablas['modulos'])->result();

			$this->db->trans_complete();

			return $query;
		}
		
		return array();
	}
	// -------------------------------------------------------------------

	/**
     * Función para validar super admin
     *
     * @return  Array
     */
	public function get_modulos_array()
	{
		$modulos = array();

		foreach ($this->get_modulos() as $key => $modulo) {
			array_push($modulos,$modulo->controlador);
		}

		return $modulos;
	}
	// -------------------------------------------------------------------

	/**
     * Función para validar super admin
     *
     * @return  Boolean
     */
	public function is_admin()
	{
		if ($this->logged_in()) {

			$idusuario 		= $this->session->userdata($this->userid);
		}
		

		return FALSE;
	}
	// -------------------------------------------------------------------

	/**
     * Función para recuperar la sesión iniciada
     *
     * @return  Boolean
     */
	public function logged_in()
	{
		//Config
		$logged 		= (boolean)$this->session->userdata('logged');
		$idusuario 		= $this->session->userdata($this->userid);

		return $logged;
	}
	// -------------------------------------------------------------------

	/**
     * Función para destruir la sesión del sistema
     *
     * @return  Boolean
     */
	public function logout()
	{

		$this->session->unset_userdata( array('logged' => NULL, $this->userid => NULL , $this->username => NULL ) );
        $this->session->sess_destroy();

        return TRUE;
	}
	// -------------------------------------------------------------------

	/**
     * Devulve un usuario en específico 
     *
     * @return  Object
     */
	private function get_user($username=NULL)
	{

		$this->db->where($this->username,$username);

		$query = $this->db->get($this->tablas['usuarios'])->row();

        return $query;
	}
	// -------------------------------------------------------------------
}
