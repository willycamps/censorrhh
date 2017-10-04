<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resumen extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('resumen_model');
		$this->load->model('usuario_model');
	}	

	public function index()
	{
		$data['groups'] = $this->resumen_model->GetDepartamentos();
		$data['institucion'] = $this->resumen_model->GetInstitucion();
		$data['ministerio'] = $this->resumen_model->GetMinisterio();
		$this->load->view('resumen', $data);
	}
	
	public function agregar()
	{
		$encontrado = 0;
		$noencontrado = 0;
		$nuevo=0;
		$visit=0;
		
		if ($this->input->post('encontrado')) {
			$encontrado = 1;
		}
		
		if ($this->input->post('noencontrado')) {
			$noencontrado = 1;
		}	

        if ($this->input->post('nuevo')) {
			$nuevo = 1;
		}		

       if (!$this->input->post('visitas'))
		{
			$visit = 0;
		}				
		else
		{
			$visit = $this->input->post('visitas');
		}
		
		$params = array(
			'boleta' => $this->input->post('boleta'),
			'cui' => $this->input->post('cui'),
			'nit' => $this->input->post('nit'),
			'fecha' => $this->input->post('fecha'),
			'pnombre' => $this->input->post('pnombre'),
			'snombre' => $this->input->post('snombre'),
			'onombre' => $this->input->post('onombre'),
			'papellido' => $this->input->post('papellido'),
			'sapellido' => $this->input->post('sapellido'),
			'capellido' => $this->input->post('capellido'),
			'id_departamento' => $this->input->post('departamento'),
			'id_institucion' => $this->input->post('institucion'),
			'id_municipio' => $this->input->post('municipio'),
			'id_ministerio' => $this->input->post('ministerio'),
			'encontrado'=>$encontrado,
			'noencontrado'=>$noencontrado,
			'nuevo'=>$nuevo,
			'visitas'=>$visit,
		);
		
		$this->resumen_model->agregarFormulario($params);
		redirect('resumen');
	}
	
	public function GetMunicipio()
	{
		$codigo=$this->input->post('codigo');
		if ($codigo){
		$res = $this->resumen_model->GetMunicipio($codigo);
		echo json_encode($res);
		}
			
	}
	
	public function obtenerReportePorDPI()
	{
		$cui = $this->input->post('cui');
		/*$json = array('nit' => 'nada', 'fecha' => 'nada', 'pnombre' => 'nada', 'snombre' => 'nada', 'onombre' => 'nada','papellido' => 'nada','sapellido' => 'nada','capellido' => 'nada','id_departamento' => 'nada','id_institucion' => 'nada','id_municipio' => 'nada','id_ministerio' => 'nada','encontrado' => 'nada','noencontrado' => 'nada','nuevo' => 'nada','visitas' => 'nada');*/
		if ($cui){
			$res = $this->resumen_model->obtenerReportePorDPI($cui);
			foreach ($res->result() as $row) {
				$json = array('nit' => $row->nit,'pnombre' => $row->pnombre, 'snombre' => $row->snombre, 'onombre' => $row->onombre,'papellido' => $row->papellido,'sapellido' => $row->sapellido,'capellido' => $row->capellido,'id_departamento' => $row->id_departamento,'id_institucion' => $row->id_institucion,'id_municipio' => $row->id_municipio,'id_ministerio' => $row->id_ministerio);
			}
		}
		else {
			$json = array('nit' => 'Existió un error al recuperar los datos');
		}
		echo json_encode($json);
	}
	
	
	
}

?>