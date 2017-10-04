<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');		
		$this->load->model('rrhh_model');
		
		
		//$this->load->helper('roles');
			//validarRol(array("ADMIN","INVENTARIO"), $this->session->userdata('rol'));
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		
		$this->load->view('welcome_message');		
		
	}
	
	public function boleta_institucion()
	{				
		
		$all_boletas = $this->rrhh_model->getBoletas();
		$data['boletas'] = null;
		
		if ($all_boletas)
		{
			$data['boletas'] = $all_boletas;
		}
										
		$this->load->view('boletas_censadas', $data);			
	}
	
	public function departamentos()
	{
		$all_departamentos = $this->rrhh_model->getDeptos();			
		$data['departamentos'] = null;
		
		if ($all_departamentos)
		{
			$data['departamentos'] = $all_departamentos;
		}
		
		$this->load->view('boletas_depto_muni', $data);		
	}
	
	public function municipios()
	{
		$data['municipios'] = null;		
		$id_departamento = $this->input->post('codigo');
		$all_municipios = $this->rrhh_model->getMunis($id_departamento);		
		
		if($all_municipios)
		{
			echo json_encode($all_municipios->result());						
		
		}										
	}
	
	public function boleta_depto_munis()
	{				
		
			$id_departamento = $this->input->post('id_deptos');
			$id_munis = $this->input->post('id_munis');
			$data['boletas'] = null;
		
			$all_boletas = $this->rrhh_model->_getBoletas($id_departamento,$id_munis); 		
		
		echo json_encode($all_boletas->result());						
				
			/*if ($all_boletas)
			{
				echo json_encode($all_boletas->result());						
			
			}*/
						
		//$id_departamento=18;
		//$id_munis=5;
		//$all_boletas = $this->rrhh_model->_getBoletas($id_departamento,$id_munis); 
	
	}
	
	
	
}
