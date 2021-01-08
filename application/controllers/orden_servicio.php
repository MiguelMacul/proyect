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
class orden_servicio extends CI_Controller
{

    private $views = 'orden_servicio/';
    private $model = 'morden_servicio';

 
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
    public function orden_servicio()
    {
        
$data['cotizacion'] = $this->{$this->model}->listar_orden_servicio();

        $this->load->view($this->views.'orden_servicio',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function orden_servicio_alta()
    {
			if( $this->input->post() ){
		  		$compras = array(
				'Estatus' 	=> $this->input->post('ordenes_servicio_status',TRUE),
				'Id_inventario' 	=> $this->input->post('ordenes_servicio_inventario',TRUE),
        		'Fecha_servicio' 	=> $this->input->post('ordenes_servicio_fecha',TRUE),
				'Id_usuario' 	=> $this->input->post('ordenes_servicio_usuario',TRUE),
				'Empresa' 	=> $this->input->post('ordenes_servicio_empresa',TRUE),
				'Id_orden_compra' 	=> $this->input->post('ordenes_servicio_compras',TRUE)
			);
				$this->alertas->db( $this->{$this->model}->guardar_orden_servicio($compras),'orden_servicio/orden_servicio/');
		
		  }
        

		$data['inventario'] = $this->{$this->model}->listar_inventario();
		$data['usuarios'] = $this->{$this->model}->listar_usuarios();
		$data['ordenes_compra'] = $this->{$this->model}->lista_orden_compra();
		
		
        $this->load->view($this->views.'alta_orden_servicio',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function orden_servicio_actualizacion($id)
    {
		$data['codigo'] = $id;
		
		if( $this->input->post() ){
		  		$compras = array(
				'Estatus' 	=> $this->input->post('ordenes_servicio_status',TRUE),
				'Id_inventario' 	=> $this->input->post('ordenes_servicio_inventario',TRUE),
        		'Fecha_servicio' 	=> $this->input->post('ordenes_servicio_fecha',TRUE),
				'Id_usuario' 	=> $this->input->post('ordenes_servicio_usuario',TRUE),
				'Empresa' 	=> $this->input->post('ordenes_servicio_empresa',TRUE),
				'Id_orden_compra' 	=> $this->input->post('ordenes_servicio_compras',TRUE)
			);
				$this->alertas->db( $this->{$this->model}->actualizacion_orden_servicio($id,$compras),'orden_servicio/orden_servicio/');
		
		  }
		$data['cotizacion'] = $this->{$this->model}->obtener_orden_servicio($id);
		$data['inventario'] = $this->{$this->model}->listar_inventario();
		$data['usuarios'] = $this->{$this->model}->listar_usuarios();
		$data['ordenes_compra'] = $this->{$this->model}->lista_orden_compra();
        $this->load->view($this->views.'actualizacion_orden_servicio',$data);
    }
    // -------------------------------------------------------------------
 

    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function orden_servicio_eliminar($id)
    {
        $this->alertas->db($this->{$this->model}->eliminar_orden_servicio($id),'orden_servicio/orden_servicio');
    }
    // -------------------------------------------------------------------
}

