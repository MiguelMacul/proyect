<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modelo Sistema
* --------------------------------------------------------------------------
*
* Modelo de base de datos para el controlador Sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class morden_servicio extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_orden_servicio()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('ordenes_servicio')->result();
    }
	
	
	 public function listar_inventario()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('inventario')->result();
    }
	 public function listar_usuarios()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('usuarios')->result();
    }
	 public function lista_orden_compra()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('ordenes_compra')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_orden_servicio($id)
    {
        $this->db->where('Id_servicio',$id);
        return $this->db->get('ordenes_servicio')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_orden_servicio($data)
    {
        return $this->db->insert('ordenes_servicio', $data);

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
    public function actualizacion_orden_servicio($id,$data)
    {   
        $this->db->where('Id_servicio',$id);
        return $this->db->update('ordenes_servicio',$data); 
    }
    
    // --------------------------------------------------------------------

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_orden_servicio($id)
    {
        $this->db->where('Id_servicio', $id);// id de la tabla
        return $this->db->delete('ordenes_servicio');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}