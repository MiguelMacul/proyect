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
class Compra extends CI_Controller
{

    private $views = 'compra/';
    private $model = 'mcompra';


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
    public function compra()
    {
        
$data['cotizaciones'] = $this->{$this->model}->listar_orden_compra();
        $this->load->view($this->views.'compra',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function compra_alta()
    {

		  if( $this->input->post() ){
			  $id=rand(1,1000);
		  		$compras = array(
				'Id_compras' 	=> $id,
				'Nombre' 	=> $this->input->post('Nombre',TRUE),
				'RFC' 	=> $this->input->post('RFC',TRUE),
        		'Telefono' 	=> $this->input->post('Telefono',TRUE),
				'Fax' 	=> $this->input->post('Fax',TRUE),
				'Catalogo' 	=> $this->input->post('Catalogo',TRUE),
				'Direcciones' 	=> $this->input->post('Direcciones',TRUE)
			);
			  $contacto = array(
				'Id_contacto' 	=> null,
				'Id_comprador' 	=> $id,
				'Nombre' 	=> $this->input->post('Nombre_contacto',TRUE),
        		'Telefono' 	=> $this->input->post('Telefono_contacto',TRUE),
				'Correo' 	=> $this->input->post('correo_contacto',TRUE)	
			);
			  
			
			    $this->alertas->db( $this->{$this->model}->guardar_compra($compras) && $this->{$this->model}->guardar_contacto($contacto),'compra/compra');
			
		  }
        $this->load->view($this->views.'alta_compra');

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function compra_actualizacion($id)
    {
        $data['cotizaciones']=$id;
		
		if( $this->input->post() ){
		  		$compras = array(
				'Nombre' 	=> $this->input->post('Compras_nombre',TRUE),
				'RFC' 	=> $this->input->post('Compras_rfc',TRUE),
        		'Telefono' 	=> $this->input->post('Compras_telefono',TRUE),
				'Fax' 	=> $this->input->post('Compras_fax',TRUE),
				'Catalogo' 	=> $this->input->post('Compras_catalogo',TRUE),
				'Direcciones' 	=> $this->input->post('Compras_direcciones',TRUE)
			);
			  $contacto = array(
				'Nombre' 	=> $this->input->post('contacto_nombre',TRUE),
        		'Telefono' 	=> $this->input->post('contacto_telefono',TRUE),
				'Correo' 	=> $this->input->post('contacto_correo',TRUE)	
			);
		 $this->alertas->db( $this->{$this->model}->actualizacion_orden_compra($id,$compras) || $this->{$this->model}->actualizacion_contactos($id,$contacto),'compra/compra/');
		
		  }
		$data['mostrar']=$this->{$this->model}->obtener_orden_compra($id);
		$data['contacto']=$this->{$this->model}->obtener_contacto($id);
        $this->load->view($this->views.'actualizacion_compra',$data);
		
    }
    // -------------------------------------------------------------------


    /**  
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function compra_eliminar($id)
    {

         $this->alertas->db( $this->{$this->model}->compra_eliminar($id) || $this->{$this->model}->contacto_eliminar($id)  ,'Compra/compra');
    }
    // -------------------------------------------------------------------
}

