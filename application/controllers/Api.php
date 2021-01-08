<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modulo API REST
* ------------------------------------------------------------------------
*
* Modulo API REST para aplicación movil
* Documentación de la Libreria https://code.tutsplus.com/es/tutorials/working-with-restful-services-in-codeigniter--net-8814
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/

//Librearia API REST
require(APPPATH.'libraries/REST_Server.php');

class Api extends REST_Server
{

	private $views = 'api/';
	private $model = 'mapi';

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

	/**
     * Función de prueba metodo GET
     *
     * @return  Void
     */
	public function registros_get()
	{

		// Set the response and exit
        $this->response( [
            'status' => false,
            'message' => 'No users were foundsd'
        ], 404 );
	}
	// -------------------------------------------------------------------
}
