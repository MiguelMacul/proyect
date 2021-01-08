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
class Cliente extends CI_Controller
{

    private $views = 'cliente/';
    private $model = 'mcliente';


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
    public function cliente()
    {
        
$data['clientes'] = $this->{$this->model}->listar_cliente();

        $this->load->view($this->views.'cliente',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un usuario nuevo
     *
     * @return  Void
     */
    public function cliente_alta()
    {
		 if( $this->input->post() ){
					
						$compras = array(
						'Id_cliente' 	=> null,
						'Nombre' 	=> $this->input->post('Cliente_nombre',TRUE),
						'Apellidos' 	=> $this->input->post('Cliente_apellidos',TRUE),
						'Direccion' 	=> $this->input->post('Cliente_direccion',TRUE)
						
			);

						$this->alertas->db( $this->{$this->model}->guardar_cliente($compras) ,'Cliente/cliente');
		 }
        $this->load->view($this->views.'alta_cliente');

    }
    // -------------------------------------------------------------------

    /**
     * Editar un usuario


    /**
     * Edita un grupo
     * @param   Int
     * @return  Void
     */
    public function cliente_actualizacion($id)
    {

        
$data['codigo']=$id;
       
		if( $this->input->post() ){
					
						$compras = array(
	
						'Nombre' 	=> $this->input->post('cliente_nombre',TRUE),
						'Apellidos' 	=> $this->input->post('cliente_apellidos',TRUE),
						'Direccion' 	=> $this->input->post('cliente_direccion',TRUE)
						
			);
				
						$this->alertas->db( $this->{$this->model}->actualizacion_cliente($id,$compras) ,'Cliente/cliente');
		 }
		$data['mostrar'] = $this->{$this->model}->obtener_cliente($id);

        $this->load->view($this->views.'actualizacion_cliente',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina un determinado usuario
     *
     * @param   Int
     * @return  Void
     */
    public function cliente_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_cliente($id),'cliente/cliente');
    }
    // -------------------------------------------------------------------
}

