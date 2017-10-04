<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function verFormularios()
	{
		$usuario_id = $this->session->userdata('usuario_id');
		
		$sql = "SELECT P.dpi, P.pnombre, P.snombre, P.onombre, P.papellido, 
					   P.sapellido, P.capellido, I.direccion as Idireccion, 
					   C.nombre as Causa, T.nombre as Tiempo, R.nombre as Region, 
					   M.nombre as Municipio, D.nombre as Departamento , F.lugar_poblado, F.area 
				FROM   rrhh.formulario as F, rrhh.persona as P, rrhh.institucion as I, 
					   rrhh.causa as C, rrhh.tiempo_retorno as T, rrhh.region as R, rrhh.municipio as M,
					   rrhh.departamento as D 
				WHERE  F.id_persona = P.id_persona and F.id_institucion = I.id_institucion and 
					   F.id_causa = C.id_causa and F.id_tiempo_retorno = T.id_tiempo_retorno and
					   F.id_region = R.id_region and F.id_municipio = M.id_municipio and 
					   M.id_departamento = D.id_departamento and F.codigo = 'FC-02' and 
					   F.id_persona_empadronador = ".$usuario_id.";";

		$res = $this->db->query($sql);

		if ($res->num_rows() > 0) {
			return $res->result();
		}else{
			return 0;
		}
		
	}

	function NuevoFormulario($params)
	{

		$DPI 	= $params['DPI'];
		$PNombre 	= $params['PNombre'];
		$SNombre 	= $params['SNombre'];
		$ONombre 	= $params['ONombre'];
		$PApellido 	= $params['PApellido'];
		$SApellido 	= $params['SApellido'];
		$CApellido 	= $params['CApellido'];
		$Direccion 	= $params['Direccion'];
		$Telefono 	= $params['Telefono'];
		$ID = $params['Nuevo'];

		$Institucion 	= $params['Institucion'];
		$fecha 	= $params['fecha'];
		$Causa 	= $params['Causa'];
		$Retorno 	= $params['Retorno'];
		$Poblado  =  $params['Poblado'];
		$Region 	= $params['Region'];
		$Municipio 	= $params['Municipio'];
		$Area 	= $params['Area'];
		
			$this->db->trans_start();

			
			if ($ID==0){
				$datap = array();	


				 $datap = array(
					 'dpi' => $DPI,
					 'pnombre' => $PNombre,
					 'snombre' => $SNombre,
					 'onombre' => $ONombre,
					 'papellido' => $PApellido,
					 'sapellido' => $SApellido,
					 'capellido' => $CApellido,
					 /*'direccion' => $Direccion,
					 'telefono' => $Telefono,*/
					 'id_pais_nacimiento' => 1,
					 'id_nacionalidad' => 1533
				 );

				$this->db->insert('persona', $datap);

			 	$id_persona = $this->db->insert_id();

			}else{

				$datap = array();	
		 		$id_persona = $ID;

			}		

			 $data = array();	


			 $data = array(
				 'nombre' => 'FC-02',
				 'codigo' => 'FC-02',
				 'id_persona' => $id_persona,
				 'id_persona_empadronador' => '7',
				 'id_institucion' => $Institucion,
				 'id_region' => $Region,
				 'id_municipio' => $Municipio,
				 'id_causa' => $Causa,
				 'id_tiempo_retorno' => $Retorno,
				 'area' => $Area,
				 'lugar_poblado' => $Poblado
			 );	

		$this->db->insert('formulario', $data);
		$this->db->trans_complete();
		return 0;

	}

	function ListarCausas()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.causa');
		return $query->result();

	}

	function ListarTiempoRetorno()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.tiempo_retorno');
		return $query->result();
	}

	function ListarRegiones()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.region');
		return $query->result();

	}

	function ListarDepartamentos()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.departamento');
		return $query->result();

	}

	function ListarInstituciones()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.institucion');
		return $query->result();

	}

	function ListarMunicipios($id_departamento=null)
	{
		$this->db->select('*');
		$this->db->where('id_departamento', $id_departamento);
		$query = $this->db->get('rrhh.municipio');
		return $query->result();

	}

	function ListarPersona()
	{
		$this->db->select('*');
		$query = $this->db->get('rrhh.persona');
		return $query->result();

	}

	function InformacionPersonal($dpi=null)
	{
		$this->db->select('*');
		$this->db->where('dpi', $dpi);
		$query = $this->db->get('rrhh.persona');
		return $query->result();

	}

}