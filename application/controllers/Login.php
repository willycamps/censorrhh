<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('usuario_model');
		$this->load->library('session');
	}	

	public function index()
	{
		$this->load->view('login');
	}

	public function iniciarSesion()
	{
		$params =	array
					(
						'userid' => $this->input->post('userid'),
						'password' => $this->input->post('password')
					);
		
		$rolesDbRes = $this->usuario_model->autenticarUsuario($params);
		
		if ($rolesDbRes != false) { 
			$rolesDataSet = $rolesDbRes->result()[0];
			//set sessions
			$this->session->set_userdata('sesion', true);
			$this->session->set_userdata('usuario', $rolesDataSet->USUARIO);
			$this->session->set_userdata('usuario_id', $rolesDataSet->ID_PERSONA);
			$this->session->set_userdata('usuario_nombre', $rolesDataSet->PNOMBRE);
			$this->session->set_userdata('rol', $rolesDataSet->ROL);

			//$sesionid = $this->usuario_model->guardarSesion();
			//$this->session->set_userdata('sesion_id', $sesionid);
			
			$this->session->set_userdata('codempadronador', $rolesDataSet->EMPADRONADOR);

			//Preferiblemente redireccionar
			switch ($rolesDataSet->ROL) 
			{
				case 'MONITOR':
					redirect("inicio");
					break;
				case 'EMPADRONADOR':
					redirect("inicio");
					break;
				default:
					redirect("login");
					break;
			}
		} else {
			$data['login_estatus']='1';
			$data['usuario_negado'] = $params['userid'];
			$this->load->view('login',$data);
		}
	}

	public function cerrarSesion()
	{
		//$this->usuario_model->finSesion();
		$this->session->sess_destroy();
		redirect("login");
	}
}

?>