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
class orden_compra extends CI_Controller
{

    private $views = 'orden_compra/';
    private $model = 'morden_compra';


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
    public function orden_compra()
    {
        $data['cotizaciones'] = $this->{$this->model}->listar_orden_compra();


        $this->load->view($this->views.'orden_compra',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function orden_compra_alta()
    {

        	if( $this->input->post() ){
		  		$compras = array(
				'Id_usuario' 	=> $this->input->post('usuario',TRUE),
				'Id_compra' 	=> $this->input->post('compras',TRUE),
        		'Referencia' 	=> $this->input->post('orden_compra_referencia',TRUE),
				'Total' 	=> $this->input->post('orden_compra_Total',TRUE),
				'Fecha_orden' 	=> $this->input->post('orden_compra_fecha',TRUE),
				'Estatus' 	=> $this->input->post('orden_compra_estatus',TRUE)
			);
			
		 $this->alertas->db( $this->{$this->model}->guardar_orden_compra($compras),'orden_compra/orden_compra/');
		
		  }


  $data['compras'] = $this->{$this->model}->listar_compras();
  $data['usuarios'] = $this->{$this->model}->listar_usuarios();
        $this->load->view($this->views.'alta_orden_compra',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function orden_compra_actualizacion($id)
    {

        

         $data['codigo']=$id;

		
		if( $this->input->post() ){
		  		$compras = array(
				'Id_usuario' 	=> $this->input->post('usuario',TRUE),
				'Id_compra' 	=> $this->input->post('compras',TRUE),
        		'Referencia' 	=> $this->input->post('orden_compra_referencia',TRUE),
				'Total' 	=> $this->input->post('orden_compra_Total',TRUE),
				'Fecha_orden' 	=> $this->input->post('orden_compra_fecha',TRUE),
				'Estatus' 	=> $this->input->post('orden_compra_estatus',TRUE)
			);
			
		 $this->alertas->db( $this->{$this->model}->actualizacion_orden_compra($id,$compras),'orden_compra/orden_compra/');
		
		  }
		  $data['cotizacion'] = $this->{$this->model}->obtener_orden_compra($id);
  $data['compras'] = $this->{$this->model}->listar_compras();
  $data['usuarios'] = $this->{$this->model}->listar_usuarios();
        $this->load->view($this->views.'actualizacion_orden_compra',$data);
    }
    // -------------------------------------------------------------------

 
    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function orden_compra_eliminar($id)
    {
        $this->alertas->db($this->{$this->model}->eliminar_orden_compra($id),'orden_compra/orden_compra');
    }
    // -------------------------------------------------------------------
}

