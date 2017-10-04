<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rrhh_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
                // Your own constructor code
        }
	
	//get	
	function getBoletas()
	{
		$sql = "SELECT		n_institucion, count(1) boletas
				FROM		rrhh.csprostructure_fase2
				WHERE		n_institucion is not null
				GROUP		by n_institucion;";
		
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) 
			return $res;
		else 
			return false;
	}
        
        function _getBoletas($_iddepto, $_idmuni)
	{
		$depto="";
                $muni="";
                
                // -- Departamento
                if (isset($_iddepto) && !empty($_iddepto)) 
                {
                        $depto = " AND c.codigo = ". $_iddepto;                        
                }
                
                // -- Municipio
                if (isset($_idmuni) && !empty($_idmuni)) 
                {
                        $muni = " AND d.codigo = ". $_idmuni;                        
                }
                
                
                $sql = "SELECT         a.n_institucion, count(1) Cantidad
                        FROM           rrhh.csprostructure_fase2 a
                        INNER JOIN     rrhh.departamento c ON c.codigo = trim(a.departamento)
                        INNER JOIN     rrhh.municipio d ON d.codigo = trim(a.municipio) 
                        AND c.codigo = trim(a.departamento)
                        WHERE          n_institucion is not null ".$depto.$muni." GROUP BY a.n_institucion, a.municipio;";
                                        
		
		$res = $this->db->query($sql);
		
		if ($res->num_rows() > 0) 
                {
                        
                        /*foreach ($res->result() as $row) 
			{
                                //echo "Institucion: ".$row-> n_institucion;
                                //echo "Cantidad: ".$row-> Cantidad;                                        
                        }*/
			return $res;
                }
		else 
			return false;
	}
        
        function getDeptos() 
        {	
                $sql = "SELECT id_departamento, codigo, nombre FROM rrhh.departamento;";				
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
                        return $res;
		else 
                        return false;
	}
        
        function getMunis($id_departamento) 
        {	                                                
                $sql = "SELECT id_municipio,nombre FROM rrhh.municipio WHERE id_departamento=".$id_departamento;				
		$res = $this->db->query($sql);
                
		if ($res->num_rows() > 0) 
                        return $res;
		else 
                        return false;
	}

}

