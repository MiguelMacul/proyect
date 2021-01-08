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
class morden_compra extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_orden_compra()
    {
        // en get va el nombre d ela tabla 
        return $this->db->get('ordenes_compra')->result();
    }
	
	  public function listar_compras()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('compras')->result();
    }
	
	  public function listar_usuarios()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('usuarios')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_orden_compra($id)
    {
        $this->db->where('Id_compras',$id);
        return $this->db->get('ordenes_compra')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_orden_compra($data)
    {
        return $this->db->insert('ordenes_compra', $data);

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
    public function actualizacion_orden_compra($id,$data)
    {   
        $this->db->where('Id_compras',$id);
        return $this->db->update('ordenes_compra',$data); 
    }
    
    // --------------------------------------------------------------------

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_orden_compra($id)
    {
        $this->db->where('Id_compras', $id);// id de la tabla
        return $this->db->delete('ordenes_compra');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}