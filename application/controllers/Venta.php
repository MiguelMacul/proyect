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
class inventario extends CI_Controller
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

        


        $this->load->view($this->views.'alta_inventario',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function inventario_actualizacion($id=NULL)
    {

        

        

        $this->load->view($this->views.'actualizacion_inventario',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function inventario_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_cotizacion($id),'inventario/inventario');
    }
    // -------------------------------------------------------------------
}

