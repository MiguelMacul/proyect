<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modulo de configuración del sistema
* ------------------------------------------------------------------------
*
* Modulo que permite configurar y agregar los diferenets catálogos
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Sistema extends CI_Controller
{

	private $views = 'sistema/';
	private $model = 'msistema';


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }

	/**
     * Muestra la vista principal
     *
     * @return  Void
     */
	public function index()
	{
		$this->load->view($this->views.'lista');
	}
	// --------------------------------------------------<-----------------

	/**
     * Muestra la vista principal
     * 
     * @return  Void
     */
	public function usuarios()
	{
		$data['usuarios'] = $this->{$this->model}->listar_usuarios();

		foreach ($data['usuarios'] as $key => $usuario) {
			$usuario->admin = ($usuario->admin == 1) ? 'Si' : 'No';
			$usuario->active = ($usuario->active == 1) ? 'Activo' : 'In-activo';

			$usuario->grupos = $this->{$this->model}->obtener_grupos_usuario($usuario->usuario_id);
		}

		$this->load->view($this->views.'usuarios',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Agrega un usuario nuevo
     * 
     * @return  Void
     */
	public function usuarios_agregar()
	{

		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_correo',
		            'label' => 'Correo electrónico',
		            'rules' => 'required|valid_email|is_unique[usuarios.email]',
		            'errors' => array(
                        'is_unique' => 'El correo electrónico ingresado ya esta en uso',
                	),
		        ),
		        array(
		            'field' => 'input_nombre',
		            'label' => 'Nombre',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_apellidos',
		            'label' => 'Apellidos',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_grupos[]',
		            'label' => 'Grupos',
		            'rules' => 'required|numeric'
		        ),
		        array(
		            'field' => 'input_contrasenia',
		            'label' => 'Contraseña',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_repitcontrasenia',
		            'label' => 'Repetir contraseña',
		            'rules' => 'required|matches[input_contrasenia]'
		        )
			)
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	//Corremos libreria
        	$this->load->library('bcrypt');

        	$data = array(
        		'email' 	=> $this->input->post('input_correo',TRUE),
        		'nombre' 	=> $this->input->post('input_nombre',TRUE),
        		'apellidos' => $this->input->post('input_apellidos',TRUE),
        		'password' 	=> $this->bcrypt->hash_password($this->input->post('input_contrasenia',TRUE)),
        		'admin' 	=> ($this->input->post('input_admin',TRUE) == 'on' ) ? 1 : 0,
        		'creado_en' => date('Y:m:d'),
        	);

        	$grupos = $this->input->post('input_grupos',TRUE);

        	$this->alertas->db($this->{$this->model}->gurdar_usuario($data, $grupos),'sistema/usuarios');
        }

        //Vista
		$data['grupos'] = $this->{$this->model}->listar_grupos();

		$this->load->view($this->views.'agregar_usuario',$data);
		
	}
	// -------------------------------------------------------------------

	/**
     * Editar un usuario
     * 
     * @param 	Int
     * @return  Void
     */
	public function usuarios_editar($id=NULL)
	{
		//Obtenemos el usuario a editar
		if( !$data['usuario'] 	= $this->{$this->model}->obtener_usuario($id) )
			$this->alertas->info('sistema/usuarios');

		$data['usuario']->grupos = $this->{$this->model}->obtener_grupos_usuario($id);

		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_nombre',
		            'label' => 'Nombre',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_apellidos',
		            'label' => 'Apellidos',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_grupos[]',
		            'label' => 'Grupos',
		            'rules' => 'required|numeric'
		        ),
			)
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	//Obtenemos el usuario a editar
			if( !$usuario = $this->{$this->model}->obtener_usuario($this->input->post('id_token',TRUE)) )
				$this->alertas->info('sistema/usuarios');

        	//Corremos libreria
        	$this->load->library('bcrypt');

        	$data_update = array(
        		'nombre' 	=> $this->input->post('input_nombre',TRUE),
        		'apellidos' => $this->input->post('input_apellidos',TRUE),
        		'admin' 	=> ($this->input->post('input_admin',TRUE) == 'on' ) ? 1 : 0,
        		'active' 	=> ($this->input->post('input_active',TRUE) == 'on' ) ? 1 : 0,
        	);

        	$grupos = $this->input->post('input_grupos',TRUE);

        	$this->alertas->db($this->{$this->model}->actualizar_usuario($usuario->usuario_id,$data_update, $grupos),'sistema/usuarios');

        }

        //Vista
		$data['grupos'] 	= $this->{$this->model}->listar_grupos();

		$this->load->view($this->views.'editar_usuario',$data);
		
	}
	// -------------------------------------------------------------------

	/**
     * Cambiar contraseña de usuario
     * 
     * @return  Void
     */
	public function usuarios_cambiarpass()
	{
		//Obtenemos el usuario a editar
		if( !$data['usuario'] 	= $this->{$this->model}->obtener_usuario($this->input->post('id_token',TRUE)) )
			$this->alertas->info('sistema/usuarios');

		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_contrasenia',
		            'label' => 'Contraseña',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_repitcontrasenia',
		            'label' => 'Repetir contraseña',
		            'rules' => 'required|matches[input_contrasenia]'
		        )
			)
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	//Corremos libreria
        	$this->load->library('bcrypt');

        	$data_update = array(
        		'password' 	=> $this->bcrypt->hash_password($this->input->post('input_contrasenia',TRUE)),
        	);

        	$this->alertas->db($this->{$this->model}->actualizar_usuario_pass($data['usuario']->usuario_id,$data_update),'sistema/usuarios');
        }

        //Vista
		$data['grupos'] 	= $this->{$this->model}->listar_grupos();

		$this->load->view($this->views.'editar_usuario',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Elimina un determinado usuario
     * 
     * @param 	Int
     * @return  Void
     */
	public function usuarios_eliminar($id=NULL)
	{
		$this->alertas->db($this->{$this->model}->eliminar_usuarios($id),'sistema/usuarios');
	}
	// -------------------------------------------------------------------

	/**
     * Muestra la lista de modulos
     * 
     * @return  Void
     */
	public function modulos()
	{
		$data['modulos'] = $this->{$this->model}->listar_modulos();

		foreach ($data['modulos'] as $key => $modulo){

			$modulo->visible = ($modulo->visible == 1) ? 'Visible' : 'No-visible';
			$modulo->funciones = ($modulo->funciones == '') ? '--- sin funciones ---' : $modulo->funciones;
			
		}

		$this->load->view($this->views.'modulos',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Agrega un nuevo modulo
     * 
     * @return  Void
     */
	public function modulos_agregar()
	{
		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_descripcion',
		            'label' => 'Descripción',
		            'rules' => 'required',
		        ),
		        array(
		            'field' => 'input_controlador',
		            'label' => 'Controlador',
		            'rules' => 'required|is_unique[modulos.controlador]',
		            'errors' => array(
                        'is_unique' => 'Este controlador ya esta dado de alta',
                	)
		        ),
		        array(
		            'field' => 'input_titulo',
		            'label' => 'Titulo',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_icono',
		            'label' => 'Icono',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_visible',
		            'label' => 'Visible',
		            'rules' => 'required'
		        )
			)
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	$data = array(
        		'descripcion' 	=> $this->input->post('input_descripcion',TRUE),
        		'controlador' 	=> strtolower($this->input->post('input_controlador',TRUE)),
        		'funciones' 	=> $this->input->post('input_funciones',TRUE),
        		'titulo_menu' 	=> $this->input->post('input_titulo',TRUE),
        		'icono' 		=> $this->input->post('input_icono',TRUE),
        		'visible' 		=> ($this->input->post('input_visible',TRUE) == 'on' ) ? 1 : 0,
        	);

        	$this->alertas->db($this->{$this->model}->gurdar_modulo($data),'sistema/modulos');
        }

		$this->load->view($this->views.'agregar_modulo');
	}
	// -------------------------------------------------------------------

	/**
     * Edita un modulo
     * 
     * @param 	Int
     * @return  Void
     */
	public function modulos_editar($id=NULL)
	{
		//Obtenemos el usuario a editar
		if( !$data['modulo'] 	= $this->{$this->model}->obtener_modulo($id) )
			$this->alertas->info('sistema/modulos');

		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_descripcion',
		            'label' => 'Descripción',
		            'rules' => 'required',
		        ),
		        array(
		            'field' => 'input_titulo',
		            'label' => 'Titulo',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'input_icono',
		            'label' => 'Icono',
		            'rules' => 'required'
		        )
			)
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	//Obtenemos el modulo a editar
			if( !$modulo = $this->{$this->model}->obtener_modulo($this->input->post('id_token',TRUE)) )
				$this->alertas->info('sistema/modulos');


        	$data = array(
        		'descripcion' 	=> $this->input->post('input_descripcion',TRUE),
        		'funciones' 	=> $this->input->post('input_funciones',TRUE),
        		'titulo_menu' 	=> $this->input->post('input_titulo',TRUE),
        		'icono' 		=> $this->input->post('input_icono',TRUE),
        		'visible' 		=> ($this->input->post('input_visible',TRUE) == 'on' ) ? 1 : 0,
        	);

        	$this->alertas->db($this->{$this->model}->actualizar_modulo($modulo->modulo_id,$data),'sistema/modulos');
        }

		$this->load->view($this->views.'editar_modulo',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Elimina un determinado modulo
     * 
     * @param 	Int
     * @return  Void
     */
	public function modulos_eliminar($id=NULL)
	{
		$this->alertas->db($this->{$this->model}->eliminar_modulo($id),'sistema/modulos');
	}
	// -------------------------------------------------------------------

	/**
     * Muestra la lista de grupos
     * 
     * @return  Void
     */
	public function grupos()
	{
		$data['grupos'] = $this->{$this->model}->listar_grupos();
		foreach ($data['grupos'] as $key => $grupo){
			$grupo->modulos = $this->{$this->model}->obtener_modulos_grupo($grupo->grupo_id);
		}
		$this->load->view($this->views.'grupos',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Agrega un nuevo grupo
     * 
     * @return  Void
     */
	public function grupos_agregar()
	{
		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_titulo',
		            'label' => 'Nombre',
		            'rules' => 'required|is_unique[grupos.titulo]',
		            'errors' => array(
                        'is_unique' => 'Este nombre ya esta en uso por otro grupo',
                	)
		        ),
		        array(
		            'field' => 'input_descripcion',
		            'label' => 'Descripción',
		            'rules' => 'required',
		        ),
		        array(
		            'field' => 'input_modulos[]',
		            'label' => 'Modulos',
		            'rules' => 'required|numeric'
		        )
		    )
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	$data = array(
        		'titulo' 	=> $this->input->post('input_titulo',TRUE),
        		'descripcion' 	=> $this->input->post('input_descripcion',TRUE),
        	);

        	$modulos = $this->input->post('input_modulos',TRUE);
        	$this->alertas->db($this->{$this->model}->gurdar_grupo($data, $modulos),'sistema/grupos');
        }

        $data['modulos'] = $this->{$this->model}->listar_modulos();

		$this->load->view($this->views.'agregar_grupo',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Edita un grupo
     * @param 	Int
     * @return  Void
     */
	public function grupos_editar($id=NULL)
	{

		//Obtenemos el usuario a editar
		if( !$data['grupo'] 	= $this->{$this->model}->obtener_grupo($id) )
			$this->alertas->info('sistema/grupos');

		$data['grupo']->modulos = $this->{$this->model}->obtener_modulos_grupo($id);

		// Validaciones de Formulario
        $this->form_validation->set_rules(
        	array(
		        array(
		            'field' => 'input_titulo',
		            'label' => 'Nombre',
		            'rules' => 'required',
		            'errors' => array(
                        'is_unique' => 'Este nombre ya esta en uso por otro grupo',
                	)
		        ),
		        array(
		            'field' => 'input_descripcion',
		            'label' => 'Descripción',
		            'rules' => 'required',
		        ),
		        array(
		            'field' => 'input_modulos[]',
		            'label' => 'Modulos',
		            'rules' => 'required|numeric'
		        )
		    )
        );

        if( $this->form_validation->run() && $this->input->post() ){

        	//Obtenemos el usuario a editar
			if( !$grupo = $this->{$this->model}->obtener_grupo($this->input->post('id_token',TRUE)) )
				$this->alertas->info('sistema/grupos');

        	$data = array(
        		'titulo' 	=> $this->input->post('input_titulo',TRUE),
        		'descripcion' 	=> $this->input->post('input_descripcion',TRUE),
        	);

        	$modulos = $this->input->post('input_modulos',TRUE);
        	$this->alertas->db($this->{$this->model}->actualizar_grupo($grupo->grupo_id, $data, $modulos),'sistema/grupos');
        }

        $data['modulos'] = $this->{$this->model}->listar_modulos();

		$this->load->view($this->views.'editar_grupo',$data);
	}
	// -------------------------------------------------------------------

	/**
     * Elimina un determinado grupo
     * 
     * @param 	Int
     * @return  Void
     */
	public function grupo_eliminar($id=NULL)
	{
		$this->alertas->db($this->{$this->model}->eliminar_grupo($id),'sistema/grupos');
	}
	// -------------------------------------------------------------------
}
