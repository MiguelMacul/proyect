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
class Msistema extends CI_Model
{

    /**
     * Guarda usuarios y grupos relacionados
     * 
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function gurdar_usuario($data, $grupos)
    {
        $this->db->trans_start();
        $this->db->insert('usuarios',$data);
        $usuario_id = $this->db->insert_id();

        $index=0;
        foreach ($grupos as $key => $grupo){
            $data_permisos[$index]['usuario_id'] = $usuario_id;
            $data_permisos[$index]['grupo_id']   = $grupo;
            $index++;
        }

        $this->db->insert_batch('usuarios_grupos',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un usuario en específico
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_usuario($id)
    {
        $this->db->where('usuario_id',$id);
        return $this->db->get('usuarios')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un usuario en específico
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_usuario_pass($id,$data)
    {
        $this->db->where('usuario_id',$id);
        return $this->db->update('usuarios',$data);
    }
    // --------------------------------------------------------------------

    /**
     * Actualizar usuario y grupos
     * 
     * @param   Int
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_usuario($id, $data, $grupos)
    {
        $this->db->trans_start();
        $this->db->where('usuario_id',$id);
        $this->db->delete('usuarios_grupos');

        $this->db->where('usuario_id',$id);
        $this->db->update('usuarios',$data);

        $index=0;
        foreach ($grupos as $key => $grupo){
            $data_permisos[$index]['usuario_id'] = $id;
            $data_permisos[$index]['grupo_id']   = $grupo;
            $index++;
        }

        $this->db->insert_batch('usuarios_grupos',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los usuarios
     * 
     * @return  Array
     */
    public function listar_usuarios()
    {
        //$this->db->join('usuarios_grupos','usuarios_grupos.usuario_id=usuarios.usuario_id');
        //$this->db->join('grupos','grupos.grupo_id=usuarios_grupos.grupo_id');

        return $this->db->get('usuarios')->result();
    }
    // --------------------------------------------------------------------
   
    /**
     * Lista modulos por grupo
     * 
     * @param   Int
     * @return  Array
     */
    public function obtener_clientes($idcliente)
    {
        $this->db->join('clientes.idcliente=cotizacion.idcliente');
        $this->db->where('cotizacion.idcliente',$idcliente);
        return $this->db->get('clientes')->result();
    }

    /**
     * Elimina el modulo
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_usuarios($id)
    {
        $this->db->where('usuario_id', $id);
        return $this->db->delete('usuarios');
    }
    // --------------------------------------------------------------------

    /**
     * Lista modulos por grupo
     * 
     * @param   Int
     * @return  Array
     */
    public function obtener_modulos_grupo($idgrupo)
    {
        $this->db->join('permisos','permisos.modulo_id=modulos.modulo_id');
        $this->db->where('permisos.grupo_id',$idgrupo);
        return $this->db->get('modulos')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Guarda grupos de trabajo
     * 
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function gurdar_grupo($data, $modulos)
    {
        $this->db->trans_start();
        $this->db->insert('grupos',$data);
        $grupo_id = $this->db->insert_id();

        $index=0;
        foreach ($modulos as $key => $modulo){
            $data_permisos[$index]['grupo_id']  = $grupo_id;
            $data_permisos[$index]['modulo_id'] = $modulo;
            $index++;
        }

        $this->db->insert_batch('permisos',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los grupos de trabajo
     * 
     * @param   Int
     * @return  Array
     */
    public function obtener_grupos_usuario($id)
    {
        $this->db->join('usuarios_grupos','usuarios_grupos.grupo_id=grupos.grupo_id');
        $this->db->where('usuarios_grupos.usuario_id',$id);
        return $this->db->get('grupos')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los grupos de trabajo
     * 
     * @return  Array
     */
    public function listar_grupos()
    {
        return $this->db->get('grupos')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un grupo en específico
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_grupo($id)
    {
        $this->db->where('grupo_id',$id);
        return $this->db->get('grupos')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Actualizar grupos y permisos
     * 
     * @param   Int
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_grupo($id, $data, $modulos)
    {
        $this->db->trans_start();
        $this->db->where('grupo_id',$id);
        $this->db->delete('permisos');

        $this->db->where('grupo_id',$id);
        $this->db->update('grupos',$data);

        $index=0;
        foreach ($modulos as $key => $modulo){
            $data_permisos[$index]['grupo_id'] = $id;
            $data_permisos[$index]['modulo_id']   = $modulo;
            $index++;
        }

        $this->db->insert_batch('permisos',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    // --------------------------------------------------------------------

    /**
     * Elimina el grupo
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_grupo($id)
    {
        $this->db->where('grupo_id', $id);
        return $this->db->delete('grupos');
    }
    // --------------------------------------------------------------------

    /**
     * Guarda modulos
     * 
     * @param   Array
     * @return  Boolean
     */
    public function gurdar_modulo($data)
    {
        return $this->db->insert('modulos',$data); 
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un usuario en específico
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_modulo($id)
    {
        $this->db->where('modulo_id',$id);
        return $this->db->get('modulos')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Actualiza un modulo
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_modulo($id,$data)
    {   
        $this->db->where('modulo_id',$id);
        return $this->db->update('modulos',$data); 
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los modulos
     * 
     * @return  Array
     */
    public function listar_modulos()
    {
        return $this->db->get('modulos')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Elimina el modulo
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_modulo($id)
    {
        $this->db->where('modulo_id', $id);
        return $this->db->delete('modulos');
    }
    // --------------------------------------------------------------------
}