<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Alertas de sistema
 *
 * @author		Ing. Oscar Mendez Perez
 */
class Alertas {

	/**
	 * Reference to the CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	protected $prefix = '';

	protected $suffix = '';

	protected $class= 'alert';

	protected $class_success = 'card alert-success border';

	protected $class_danger = 'card alert-danger border';

	protected $class_warning = 'card alert-warning border';

	protected $class_info = 'card alert-secondary border';

	//Mensaje de sistema
	
	public $db_404 = 'Intentas ver algo que no existe en la base de datos';

	public $db_403 = 'Intentas ver algo que no existe en la base de datos';

	public $db_nodelete = 'No se puede eliminar este registro, existen elementos asociados';

	public $db_error = 'Lo sentimos ocurrio un error al procesar su peteción, por favor consulte al administrador del sistema';


	/**
	 * Initialize Form_Validation class
	 *
	 * @param	array	$rules
	 * @return	void
	 */
	public function __construct(){

		$this->CI =& get_instance();
	}

	// --------------------------------------------------------------------

	/**
	 * Alerta Success
	 *
	 */
	public function success($url=NULL, $text='', $titulo=''){

		$titulo = $titulo != FALSE? $titulo : '<i class="fe fe-check-circle mr-2"></i> Correcto !'; 

		$text = $text != FALSE? $text : 'La información se proceso con éxito.';
		

		$this->CI->session->set_flashdata('alert', $this->_mensaje($titulo, $text, $this->class_success));

		if($url)
			redirect($url);
	}

	/**
	 * Alerta Warning
	 *
	 */
	public function warning($url=NULL, $text='', $titulo=''){

		$titulo = $titulo != FALSE? $titulo : '<i class="fe fe-alert-triangle mr-2"></i> Precaución !'; 

		$text = $text != FALSE? $text : 'Lo sentimos ocurrio un error al procesar su peticion.'; 
		

		$this->CI->session->set_flashdata('alert', $this->_mensaje($titulo, $text, $this->class_warning));

		if($url)
			redirect($url);
	}

	/**
	 * Alerta Danger
	 *
	 */
	public function danger($url=NULL, $text='', $titulo=''){

		$titulo = $titulo != FALSE? $titulo : '<i class="fe fe-x-circle mr-2"></i> Error !'; 

		$text = $text != FALSE? $text : 'Lo sentimos ocurrio un error al procesar su peticion.'; 
		

		$this->CI->session->set_flashdata('alert', $this->_mensaje($titulo, $text, $this->class_danger));

		if($url)
			redirect($url);
	}

	/**
	 * Alerta Info
	 *
	 */
	public function info($url=NULL, $text='', $titulo=''){

		$titulo = $titulo != FALSE? $titulo : '<i class="fe fe-info mr-2"></i> Precaución !'; 

		$text = $text != FALSE? $text : 'Lo sentimos ocurrio un error al procesar su peticion.'; 
		

		$this->CI->session->set_flashdata('alert', $this->_mensaje($titulo, $text, $this->class_info));

		if($url)
			redirect($url);
	}

	/**
     * Agrega un usuario nuevo
     * 
     * @return  Void
     */
	public function db($transaccion=NULL,$url=NULL,$text=''){


		if($transaccion){

			$titulo = '<i class="fe fe-check-circle mr-2"></i> Correcto !';
			$text = $text != FALSE? $text : 'La información se proceso con éxito.';
			$class = $this->class_success;

		}else{

			$titulo = '<i class="fe fe-x-circle mr-2"></i> Error !';
			$text = $text != FALSE? $text : 'Lo sentimos ocurrio un error al procesar su peticion.';
			$class = $this->class_danger;
		}

		$this->CI->session->set_flashdata('alert', $this->_mensaje($titulo, $text, $class));

		if($url)
			redirect($url);
	}
	// -------------------------------------------------------------------

	public function get(){


		if( $alert = $this->CI->session->alert ){

			$this->CI->session->set_flashdata('alert', NULL);

			return $alert;
		}

		return FALSE;
	}

	public function _mensaje($titulo='', $texto='',$alert){

		$alert = '<br>
					<div class="'.$this->class.' '.$alert.' alert-dismissable fade show">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
						<h4 class="mb-2">
                            <strong>'.$titulo.'</strong>
                        </h4>
						<p class="small mb-0">
                            '.$texto.'
                         </p>
					</div>
				';
		return $alert;
	}

	/* Alertas totales*/


	public function _404($titulo='', $texto='', $url=NULL){


		//Validamos titulo de error
		$titulo = $titulo != ''? $titulo : 'ERROR 404';

		//Validamos texto del error
		$texto = $texto != ''? $texto : 'EL RECURSO SOLOCITADO NO FUE ENCONTRADO '; 

		if($url!=NULL)
			$texto.= '<p><a href="'.$url.'" class="btn btn-default"> Puedes volver a '.$url.'</a></p>';

		//Mandamos el error
		show_error($texto, 404, $titulo);
	}

	public function _403($titulo='', $texto='', $url=NULL){


		//Validamos titulo de error
		$titulo = $titulo != ''? $titulo : 'ERROR 403';

		//Validamos texto del error
		$texto = $texto != ''? $texto : 'NO TIENE PERMISOS PARA ACCEDER A ESTA PARTE DEL SISTEMA '; 

		if($url!=NULL)
			$texto.= '<p><a href="'.$url.'" class="btn btn-default"> Puedes volver a '.$url.'</a></p>';

		//Mandamos el error
		show_error($texto, 403, $titulo);
	}

	public function _409($titulo='', $texto='', $url=NULL){


		//Validamos titulo de error
		$titulo = $titulo != ''? $titulo : 'ERROR 409';

		//Validamos texto del error
		$texto = $texto != ''? $texto : 'SE A PRESENTADO UN CONFLICTO AL PROCESAR LA INFORMACIÓN SOLICITADA'; 

		if($url!=NULL)
			$texto.= '<p><a href="'.$url.'" class="btn btn-default"> Puedes volver a '.$url.'</a></p>';

		//Mandamos el error
		show_error($texto, 409, $titulo);
	}


	public function _500($titulo='', $texto='', $url=NULL){


		//Validamos titulo de error
		$titulo = $titulo != ''? $titulo : 'ERROR 500';

		//Validamos texto del error
		$texto = $texto != ''? $texto : 'SE A PRESENTADO UN ERROR EN EL SERVIDOR'; 

		if($url!=NULL)
			$texto.= '<p><a href="'.$url.'" class="btn btn-default"> Puedes volver a '.$url.'</a></p>';

		//Mandamos el error
		show_error($texto, 500, $titulo);
	}
}
