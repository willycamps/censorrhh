<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rrhh_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
                // Your own constructor code
        }
	
        //-- getDepartamentos --
        
        
        //-- getMunicipios --
        function getMunicipios($id_departamento)
        {
		$sql = "SELECT * FROM rrhh.municipio
                        WHERE id_departamento=".$id_departamento;				
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}
               
	//-- getBoletasxInstitucion --	
	function getBoletas()
	{
		$sql = "SELECT	n_institucion, count(1) boletas
				FROM		rrhh.csprostructure_fase2
				WHERE		n_institucion is not null
				GROUP		by n_institucion;";
		
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) 
			return $res;
		else 
			return false;
	}
        
        //-- getBoletasxDepartamento&Municipio	
	function getBoletas($depto, $muni)
	{
                $where = null;
                
                if (isset($depto) && !empty($depto)) 
                {
			$where = " AND c.codigo =".$depto;
		}
                
                if (isset($muni) && !empty($muni)) 
                {
			$where = " AND d.codigo =".$muni;
		}
                                                
		$sql = "SELECT  a.n_institucion, count(1) Cantidad,  
                        c.nombre , c.codigo depto, d.codigo muni
                        FROM          rrhh.csprostructure_fase2 a
                        INNER JOIN    rrhh.departamento c ON c.codigo = trim(a.departamento)
                        INNER JOIN    rrhh.municipio d ON d.codigo = trim(a.municipio) 
                        AND c.codigo = trim(a.departamento)
                        WHERE  n_institucion is not null 
                        ".$where." GROUP BY a.n_institucion, a.municipio;";
		
		$res = $this->db->query($sql);	
                
		if ($res->num_rows() > 0) 
			return $res;
		else 
			return false;
                
	}
        
        function getDeptos() 
        {	
                $sql = "SELECT id_departamento, nombre,codigo FROM rrhh.departamento;";				
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

}

