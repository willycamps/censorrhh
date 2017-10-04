<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}	

	public function index()
	{
		$this->load->view('inicio');
		/* comentario agregado*/
		//$this->load->view('boletas_censadas', $data);	
	}
}

?>