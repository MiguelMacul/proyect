<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modulo de Login
* ------------------------------------------------------------------------
*
* Modulo Login para sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Log extends CI_Controller
{

	private $views = 'login/';
	private $model = '';

	protected $login 	= '';
	protected $logout	= '';

	/**
     * Constructor de la clase
     *
     * @return	Object
     */
    public function __construct()
    {
        parent::__construct();
       
		$this->login  = $this->config->item('auth_controller').'/'.$this->config->item('auth_login');
		$this->logout = $this->config->item('auth_controller').'/'.$this->config->item('auth_logout');
    }
    // -------------------------------------------------------------------

	/**
     * Funcion inicio del modulo
     *
     * @return  Void
     */
	public function index()
	{
		redirect();
	}
	// -------------------------------------------------------------------

	/**
     * Valida los datos de inicio de sesión
     *
     * @return  Void
     */
	public function in()
	{
		// Validaciones de Formulario
        $this->form_validation->set_rules('correo', 'Correo', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if( $this->form_validation->run() && $this->input->post() ){

        	$username     = $this->input->post('correo',TRUE);
            $password     = $this->input->post('password',TRUE);

            if( $this->auth->login($username,$password) )
            	$this->alertas->success(base_url(),'Sesión iniciada con éxito.');
            else
            	$this->alertas->danger($this->login,'Correo y/o comntraseña incorrectos.');

        }

        $this->load->view($this->views.'login');
	}
	// -------------------------------------------------------------------

	/**
     * Valida el cierre de desión del sistema
     *
     * @return  Void
     */
	public function out()
	{
		$this->auth->logout();
		$this->alertas->success(base_url());
	}
	// -------------------------------------------------------------------

	/**
     * Funcion para insertar datos de prueba iniciales
     *
     * @return  Void
     */
	public function usuario()
	{
		//Consultas
		$this->db->trans_start();

		$this->db->insert('grupos',array('titulo'=>'SUPER ADMIN', 'descripcion'=>'Super administrador'));
		$grupo_id = $this->db->insert_id();

		$data_user = array(
		            'email' 	=> 'admin@uptlax.edu.mx',
		            'nombre' 	=> 'ADMIN',
		            'apellidos' => 'SISTEMA',
		            'password' 	=> $this->bcrypt->hash_password('1qazplm'),
		            'admin' 	=> 1,
		            'creado_en' => date('Y:m:d'),
		        );

		$this->db->insert('usuarios',$data_user);
		$usuario_id = $this->db->insert_id();

		$data_permisos = array(
		            'usuario_id' 	=> $usuario_id,
		            'grupo_id' 		=> $grupo_id,
		        );

		$this->db->insert('usuarios_grupos',$data_permisos);

		$this->db->trans_complete();

		echo json_encode($this->db->trans_status());
	}
	// -------------------------------------------------------------------
}
