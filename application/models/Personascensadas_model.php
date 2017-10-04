<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personascensadas_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	
	public function ListadoPersonas($params){
		$id_departamento	= $params['departamento'];
		$id_institucion		= $params['institucion'];
		$id_municipio 		= $params['municipio'];
		$id_ministerio		= $params['ministerio'];
		$f_inicial			= $params['finicial'];
		$f_final 			= $params['ffinal'];
		$empadronador 		= $this->session->userdata('codempadronador');
		
		$sql = "SELECT		r.FECHA,r.BOLETA,r.PNOMBRE,r.DPI,d.NOMBRE as DEPARTAMENTO,m.NOMBRE AS MUNICIPIO,
							i.NOMBRE AS INSTITUCION,mi.NOMBRE AS MINISTERIO
				FROM 		rrhh.reporte as r 
				INNER JOIN 	rrhh.departamento as d on r.id_departamento = d.id_departamento 
				INNER JOIN 	rrhh.municipio as m on r.id_municipio = m.id_municipio
				INNER JOIN	rrhh.institucion as i on r.id_institucion = i.id_institucion
				INNER JOIN	rrhh.ministerio as mi on r.id_ministerio = mi.id_ministerio
				INNER JOIN	rrhh.usuario as u on u.id_usuario = r.id_usuario_empadronador
				INNER JOIN	rrhh.persona as p on p.id_persona = u.id_persona
				WHERE 		((r.fecha >= ${f_inicial}) AND (r.fecha <= ${f_final}))
				AND			p.empadronador = ${empadronador}
				AND 		(r.id_departamento = ${id_departamento} OR ${id_departamento} is null)
				AND 		(r.id_institucion = ${id_institucion} OR ${id_institucion} is null )
                AND 		(r.id_municipio = ${id_municipio} OR ${id_municipio} is null) 
				AND 		(r.id_ministerio = ${id_ministerio} OR ${id_ministerio} is null)";
				
		$res = $this->db->query($sql);
		return $res->result();
	}
	
	
	
	
}

?>