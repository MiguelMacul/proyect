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
class garantia extends CI_Controller
{

    private $views = 'garantia/';
    private $model = 'mgarantia';


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
    public function garantia()
    {
        
$data['cotizacion'] = $this->{$this->model}->listar_garantia();
        $this->load->view($this->views.'garantia',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function garantia_alta()
    {

        


        $this->load->view($this->views.'alta_garantia',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function garantia_actualizacion($id=NULL)
    {

        

        

        $this->load->view($this->views.'actualizacion_garantia',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function garantia_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_garantia($id),'garantia/garantia');
    }
    // -------------------------------------------------------------------
}

