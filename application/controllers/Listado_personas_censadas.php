<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class listado_personas_censadas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('personascensadas_model');
		$this->load->model('resumen_model');
		
	}	

	public function index()
	{
		$data['groups'] = $this->resumen_model->GetDepartamentos();
		$data['institucion'] = $this->resumen_model->GetInstitucion();
		$data['ministerio'] = $this->resumen_model->GetMinisterio();
		$this->load->view('listado_personas_censadas',$data);
		
	}
	
	public function ListadoPersonas()
	{
		$params = $this->input->post('params');
		$res = $this->personascensadas_model->listadoPersonas($params);

		echo json_encode($res);
	}
	
	
	
	
	}

?>