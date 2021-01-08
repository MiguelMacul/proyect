<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modulo de Tablero de Información
* ------------------------------------------------------------------------
*
* Modulo tablero de información general del sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Tablero extends CI_Controller
{

	private $views = 'tablero/';
	private $model = 'mtablero';


    public function __construct()
    {
        parent::__construct();
    }

	/**
     * Muestra la vista principal del tablero
     *
     * @return  Void
     */
	public function index()
	{
		$this->load->view('template');
	}
	// -------------------------------------------------------------------
}
