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
class cedula extends CI_Controller
{

    private $views = 'cedula/';
    private $model = 'mcedula';


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
    public function cedula()
    {
        

        $this->load->view($this->views.'cedula',$data);
    }
   

   

    


    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function cedula_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_cedula($id),'cedula/cedula');
    }
    // -------------------------------------------------------------------
}

