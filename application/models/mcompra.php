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
class mcompra extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_orden_compra()
    {
        // en get va el nombre d ela tabla
       return $this->db->get('compras')->result();
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
        return $this->db->get('compras')->row();
		/*$query  = $this->db->select('*')
			->from('compras')
			->where('Id_compras', $codcompras) 
			->get();
			return $query->row();*/
    }
	 public function obtener_contacto($id)
    {
        $this->db->where('Id_comprador',$id);
        return $this->db->get('conctacto')->row();
		/*$query  = $this->db->select('*')
			->from('compras')
			->where('Id_compras', $codcompras) 
			->get();
			return $query->row();*/
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_compra($data)
    {
        return $this->db->insert('compras', $data);

    }
	  public function guardar_contacto($data)
    {
        return $this->db->insert('conctacto', $data);

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
        return $this->db->update('compras',$data); 
    }
     public function actualizacion_contactos($id,$data)
    {   
        $this->db->where('Id_comprador',$id);
        return $this->db->update('conctacto',$data); 
    }
    // --------------------------------------------------------------------

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function compra_eliminar($id)
    {
        $this->db->where('Id_compras', $id);// id de la tabla
        return $this->db->delete('compras');//tabla
    }
	 public function contacto_eliminar($id)
    {
        $this->db->where('Id_comprador', $id);// id de la tabla
        return $this->db->delete('conctacto');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}