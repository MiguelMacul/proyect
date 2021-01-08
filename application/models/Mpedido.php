<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Pedido
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Mpedido extends CI_Model
{

    /**
     * Lista todos los compras
     *
     * @return  Array
     */
    public function listar_compras()
    {
        return $this->db->get('registro_compra')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un compra
     *
     * @param Int
     * @return  Object
     */
    public function obtener_compra($id)
    {
        $this->db->where('idRegistro_Compras', $id);
        return $this->db->get('registro_compra')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Elimina un pedido
     *
     * @param Int
     * @return  Boolean
     */
    public function eliminar_pedido($id)
    {
        $this->db->where('idRegistro_Compras', $id);
        return $this->db->delete('registro_compra');
    }
    //---------------------------------------------------------------------

   
}