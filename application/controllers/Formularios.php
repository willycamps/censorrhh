<?php
class Formularios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
      $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('formulario_model');
      $this->load->helper('url');
	}
	

   function index()
   {
      $datos=$this->formulario_model->verFormularios();
      $data['data']= json_encode($datos); 
      $this->load->view('/formularios/verformularios', $data);
      
   }

   function crear($id = null, $num = null)
   {	

      	$params = array	(
							'DPI' 	=> $this->input->post('DPI'),
							'PNombre'	   => $this->input->post('PNombre'),
                     'SNombre'    => $this->input->post('SNombre'),
                     'ONombre'    => $this->input->post('ONombre'),
                     'PApellido'    => $this->input->post('PApellido'),
                     'SApellido'    => $this->input->post('SApellido'),
                     'CApellido'    => $this->input->post('CApellido'),
                     'Direccion'    => $this->input->post('Direccion'),
                     'Telefono'    => $this->input->post('Telefono'),
                     'Nuevo'    => $this->input->post('Nuevo'),
                     'Institucion'    => $this->input->post('Institucion'),
                     'fecha'    => $this->input->post('fecha'),
                     'Causa'    => $this->input->post('Causa'),
                     'Retorno'    => $this->input->post('Retorno'),
                     'Poblado'   => $this->input->post('Poblado'),
                     'Region'    => $this->input->post('Region'),
                     'Municipio'    => $this->input->post('Municipio'),
                     'Area'    => $this->input->post('Area')
						);

      	if(($params['DPI'] !='')){
      		$this->formulario_model->NuevoFormulario($params);	
      	}

		   $res=$this->formulario_model->ListarCausas();
         $data['causas']= json_encode($res);

         $res=$this->formulario_model->ListarTiempoRetorno();
         $data['tiempo_retorno']= json_encode($res);

         $res=$this->formulario_model->ListarRegiones();
         $data['regiones']= json_encode($res);

         $res=$this->formulario_model->ListarInstituciones();
         $data['instituciones']= json_encode($res);

         $res=$this->formulario_model->ListarDepartamentos();
         $data['departamentos']= json_encode($res); 

         $res=$this->formulario_model->ListarPersona();
         $data['personas']= json_encode($res); 

      $this->load->view('/formularios/crear', $data);

   }

    function ListarMunicipio($id_departamento=null)
   {  

      $res=$this->formulario_model->ListarMunicipios($id_departamento);
      $data['municipios']= json_encode($res);
      $this->load->view('/formularios/ListarMunicipio', $data);

   }

   function InfoPersona($dpi=null)
   {  

      $res=$this->formulario_model->InformacionPersonal($dpi);
      $data['informacion']= json_encode($res);
      $this->load->view('/formularios/infopersona', $data);

   } 
 
}
?>