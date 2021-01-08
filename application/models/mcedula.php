<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modelo Sistema
* ------------------------------------------------------------------------
*
* Modelo de base de datos para el controlador Sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class mcedula extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_cedula()
    {
        // en get va el nombre d ela tabla
        //return $this->db->get('cotizacion')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_cedula($id)
    {
        //$this->db->where('Idcotizacion',$id);
        //return $this->db->get('cotizacion')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_cedula($data)
    {
        //return $this->db->insert('cotizacion', $data);

    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_clientes()
    {
        //return $this->db->get('clientes')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_encargados()
    {
        //return $this->db->get('encargado')->result();
    }
    // --------------------------------------------------------------------




   

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_cedula($id)
    {
        //$this->db->where('Idcotizacion', $id);// id de la tabla
        //return $this->db->delete('cotizacion');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}