<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración del sistema
 * ------------------------------------------------------------------------
 *
 * Modulo que permite ingresar clientes y generar cotización
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Inventario extends CI_Controller
{

    private $views = 'inventario/';
    private $model = 'minventario';
 

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
    public function inventario()
    {
        
$data['cotizaciones'] = $this->{$this->model}->listar_inventario();
        $this->load->view($this->views.'inventario',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function inventario_alta()
    {

        	if( $this->input->post() ){
		  		$compras = array(
				'Nombre' 	=> $this->input->post('inventario_nombre',TRUE),
				'Marca' 	=> $this->input->post('inventario_marca',TRUE),
        		'Modelo' 	=> $this->input->post('inventario_modelo',TRUE),
				'Numero_Serie' 	=> $this->input->post('inventario_serie',TRUE),
				'Descripcion' 	=> $this->input->post('inventario_descripcion',TRUE),
				'Estatus' 	=> $this->input->post('inventario_estado',TRUE),
				'Fecha_ingreso' 	=> $this->input->post('inventario_fecha',TRUE),
				'Hora_ingreso' 	=> $this->input->post('inventario_hora',TRUE),
			);
				$this->alertas->db( $this->{$this->model}->guardar_inventario($compras),'Inventario/inventario/');
		
		  }
        $this->load->view($this->views.'alta_inventario');

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function inventario_actualizacion($id)
    {

        
$data['cotizaciones']=$id;
		
		if( $this->input->post() ){
		  		$compras = array(
				'Nombre' 	=> $this->input->post('inventario_nombre',TRUE),
				'Marca' 	=> $this->input->post('inventario_marca',TRUE),
        		'Modelo' 	=> $this->input->post('inventario_modelo',TRUE),
				'Numero_Serie' 	=> $this->input->post('inventario_serie',TRUE),
				'Descripcion' 	=> $this->input->post('inventario_descripcion',TRUE),
				'Estatus' 	=> $this->input->post('inventario_estado',TRUE),
				'Fecha_ingreso' 	=> $this->input->post('inventario_fecha',TRUE),
				'Hora_ingreso' 	=> $this->input->post('inventario_hora',TRUE),
			);
			 
		 $this->alertas->db( $this->{$this->model}->actualizacion_inventario($id,$compras) ,'Inventario/inventario/'.$id);
		
		  }
        
$data['mostrar']=$this->{$this->model}->obtener_inventario($id);
        $this->load->view($this->views.'actualizacion_inventario',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function inventario_eliminar($id)
    {
        $this->alertas->db($this->{$this->model}->eliminar_inventario($id),'inventario/inventario');
    }
    // -------------------------------------------------------------------
}

