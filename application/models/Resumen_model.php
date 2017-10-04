<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resumen_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//Obtiene el código del empadronador
	function obtenerUsuario(){
		$id_usuario = $this->session->userdata('usuario_id');
		$sql = "SELECT p.empadronador FROM rrhh.persona as p inner join rrhh.usuario as u on p.id_persona=u.id_persona WHERE u.id_usuario = ${id_usuario} AND ESTADO = 'A'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}	
		
	function GetDepartamentos()
	{
		$sql = "SELECT ID_DEPARTAMENTO,NOMBRE FROM rrhh.departamento";
		$res = $this->db->query($sql);
		return $res->result();
		
	}
	
	function GetInstitucion()
	{
		$sql = "SELECT ID_INSTITUCION,NOMBRE FROM rrhh.institucion";
		$res = $this->db->query($sql);
		return $res->result();
		
	}
	function GetMunicipio($codigo)
	{
		$sql = "SELECT ID_MUNICIPIO,NOMBRE FROM rrhh.municipio WHERE id_departamento = ${codigo}";
		$res = $this->db->query($sql);
		return $res->result();
		
	}
	
	function GetMinisterio()
	{
		$sql = "SELECT ID_MINISTERIO,NOMBRE FROM rrhh.ministerio";
		$res = $this->db->query($sql);
		return $res->result();
		
	}
	
		
	public function agregarFormulario($params)
	{
		$usuario_id = $this->session->userdata('usuario_id');
		/*$id_usuario	= $params['id_usuario_empadronador'];*/
		$fecha	= $params['fecha'];
		$pnombre	= $params['pnombre'];
		$snombre	= $params['snombre'];
		$onombre	= $params['onombre'];
		$papellido	= $params['papellido'];
		$sapellido	= $params['sapellido'];
		$capellido	= $params['capellido'];
		$cui	= $params['cui'];
		$nit	= $params['nit'];
		$id_institucion = $params['id_institucion'];
		$id_departamento = $params['id_departamento'];
		$id_municipio = $params['id_municipio'];
		$id_ministerio= $params['id_ministerio'];
		$encontrado	= $params['encontrado'];
		$noencontrado= $params['noencontrado'];
		$nuevo= $params['nuevo'];
		$boleta= $params['boleta'];
		$visitas= $params['visitas'];
		
		$this->db->trans_start();

		/*$sql =  ;*/
		$sql4 = "INSERT INTO reporte(pnombre,snombre,onombre,papellido,sapellido,capellido,dpi,nit,id_departamento,id_institucion,id_municipio,id_ministerio,encontrado,noencontrado,nuevo,fecha,id_usuario_empadronador,boleta,visitas) VALUES('${pnombre}','${snombre}','${onombre}','${papellido}','${sapellido}','${capellido}',${cui},${nit},${id_departamento},${id_institucion},${id_municipio},${id_ministerio},${encontrado},${noencontrado},${nuevo},'${fecha}',${usuario_id},${boleta},${visitas})";
		$res=$this->db->query($sql4);
		
      
		/*$res = $this->db->query($sql);*/
		
		
		/*$fila = $res->row(); */
		
		/*$data['error'] = $this->db->_error_message();*/
		
		//Se completa la transacción
		$this->db->trans_complete();
		
	}
	
	function obtenerReportePorDPI($cui){
		$sql = "SELECT 		pnombre,snombre,onombre,papellido,sapellido,capellido,dpi,nit,id_departamento,id_institucion,id_ministerio,id_municipio
				FROM 		rrhh.reporte
				WHERE		DPI = ${cui}";

		$res = $this->db->query($sql);

		return $res;
	}
	
	
	}