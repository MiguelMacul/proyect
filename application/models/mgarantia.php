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
class mgarantia extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_garantia() 
    {
        // en get va el nombre d ela tabla
   $query = 'SELECT garantia.Id_garantia as id,venta.Fecha_Venta as fecha, concat(cliente.Nombre, concat(" ",cliente.Apellidos)) as Completo, garantia.Condiciones as Condiciones, garantia.Duracion as plazo   FROM garantia, venta, cliente  WHERE garantia.Id_venta=venta.Id_venta and cliente.Id_cliente=garantia.Id_cliente';
        $resultados = $this->db->query($query);
		//retorno de los resultados de la consulta
		return $resultados->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_garantia($id)
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
    public function guardar_garantia($data)
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
     * Actualiza cotizacion
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizacion_garantia($id,$data)
    {   
        //$this->db->where('Idcotizacion',$id);
        //return $this->db->update('cotizacion',$data); 
    }
    
    // --------------------------------------------------------------------

   

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_garantia($id)
    {
        //$this->db->where('Idcotizacion', $id);// id de la tabla
        //return $this->db->delete('cotizacion');//tabla
    }
    // --------------------------------------------------------------------


    

   
    
}