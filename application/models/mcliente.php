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
class mcliente extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array 
     */
    public function listar_cliente()
    {
        // en get va el nombre de la tabla
        return $this->db->get('cliente')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_cliente($id)
    {
        $this->db->where('Id_cliente',$id);
        return $this->db->get('cliente')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_cliente($data)
    {
        return $this->db->insert('cliente', $data);

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
     * Actualiza cotizacion
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizacion_cliente($id,$data)
    {   
        $this->db->where('Id_cliente',$id);
        return $this->db->update('cliente',$data); 
    }
    
    // --------------------------------------------------------------------

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_cliente($id)
    {
        $this->db->where('Id_cliente', $id);// id de la tabla
        return $this->db->delete('cliente');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}