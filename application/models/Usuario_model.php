<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Autentica un usuario
	function autenticarUsuario($datos){
		
		$hsh = sha1($datos['password']);
		//$u = pg_escape_string($datos['userid']);
		$u = $datos['userid'];
		
		$sql = "SELECT		A.ID_USUARIO, A.USUARIO, A.ID_PERSONA, C.DPI, D.NOMBRE ROL, C.PNOMBRE, C.EMPADRONADOR
				FROM		rrhh.usuario A
				LEFT JOIN	rrhh.rol_usuario B ON A.ID_USUARIO = B.ID_USUARIO
				INNER JOIN	rrhh.persona C ON C.ID_PERSONA = A.ID_PERSONA
				LEFT JOIN	rrhh.rol D ON D.ID_ROL = B.ID_ROL
				WHERE		A.ESTADO = 1
				AND			A.USUARIO = '${u}'
				AND 		A.HASH_CLAVE = '${hsh}'";

		$res = $this->db->query($sql);

		if ($res->num_rows() > 0) {
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			//TO DO: Actualizar fecha_ult_acceso tabla usuario
			return $res;
		}

		return false;
	}

	//Obtiene un único usuario
	function obtenerUsuario($id_usuario){
		$sql = "SELECT ID_USUARIO, NOMBRE, NOMBRE_PERSONA, FECHA_REGISTRO, FECHA_ULT_ACCESO FROM USUARIO U WHERE ID_USUARIO = ${id_usuario} AND ESTADO = 'A'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

	//Obtiene todos los usuarios en el sistema
	function obtenerUsuarios(){
		$sql = "SELECT ID_USUARIO, NOMBRE, NOMBRE_PERSONA, FECHA_REGISTRO, FECHA_ULT_ACCESO FROM USUARIO U WHERE ESTADO = 'A'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

	//Obtiene todos los usuarios en el sistema con rol
	function obtenerUsuariosRol(){
		$sql = "SELECT U.ID_USUARIO, U.NOMBRE, U.NOMBRE_PERSONA, U.FECHA_REGISTRO, U.FECHA_ULT_ACCESO, R.NOMBRE ROL
				FROM USUARIO U
				INNER JOIN ROL_USUARIO RU ON U.ID_USUARIO = RU.ID_USUARIO
				INNER JOIN ROL R ON R.ID_ROL = RU.ID_ROL
				WHERE U.ESTADO = 'A'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

	//Guarda sesión de usuario
	function guardarSesion(){
		$usuario_id = $this->session->userdata('usuario_id');
		
		$sql = "SELECT SP_INSERT_SESION(0, ${usuario_id})";
		
		$res = $this->db->query($sql);

		if ($res->num_rows() > 0) {
			//retorna el ID de la sesion que se ha creado en la BD
			return $res->result()[0]->sp_insert_sesion;
		}

		return 0;
	}

	//Fin de la sesión
	function finSesion() {
		$session_id = $this->session->userdata('sesion_id');

		$sql = "SELECT SP_INSERT_SESION(${session_id}, 0)";
		$res = $this->db->query($sql);

		if ($res->num_rows() > 0) {
			//retorna el ID de la sesion que se ha creado en la BD
			return $res->result()[0]->sp_insert_sesion;
		}

		return 0;
	}

	//Obtiene todos aquellos usuarios que no son médicos
	function obtenerUsuariosNoSonMedicos(){
		$sql = "SELECT ID_USUARIO, NOMBRE, NOMBRE_PERSONA, FECHA_REGISTRO, FECHA_ULT_ACCESO FROM USUARIO U WHERE ESTADO = 'A' AND ID_USUARIO NOT IN (SELECT ID_USUARIO FROM MEDICO M WHERE  M.ID_USUARIO = U.ID_USUARIO )";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

	//Inserta un usuario
	function insertarUsuario($params){
		$usuario = pg_escape_string($params['usuario']);
		$nombre = pg_escape_string($params['nombre']);
		$clave = sha1(pg_escape_string($params['clave']));
		$id_rol = pg_escape_string($params['rol']);

		//Inicia la transacción
		$this->db->trans_start();

		//Se verifica si ya existe
		$sql = "SELECT COUNT(*) CONTADOR FROM USUARIO WHERE NOMBRE = '${usuario}' AND ESTADO = 'A'";
		$result = $this->db->query($sql);
		$id_usuario = -1;

		$num_id = $result->row();
		if ($num_id->contador > 0)
		{
			$sql2 = "SELECT ID_USUARIO FROM USUARIO WHERE NOMBRE = '${usuario}' AND ESTADO = 'A'";
			$result = $this->db->query($sql2);
			$identificador = $result->row();
			$id_usuario = $identificador->id_usuario;
		}
		else
		{
			$sql2 = "SELECT NEXTVAL('SEQ_ID_USUARIO') ID_USUARIO";
			$result = $this->db->query($sql2);
			$identificador = $result->row();
			$id_usuario = $identificador->id_usuario;
			$id_usuario++; //Por corrección con el SP
		}

		$sql3 = "SELECT CAST(now() AS DATE) FECHA";
		$result =  $this->db->query($sql3);
		$fecha_result = $result->row();
		$fecha = $fecha_result->fecha;

		$sql = "SELECT SP_INSERT_USUARIO(${id_usuario},'${usuario}','${clave}','${nombre}',CAST(now() AS DATE),'A');" ;
		$this->db->query($sql);
		
		//Se asigna el rol
		$sql4 = "INSERT INTO ROL_USUARIO(ID_ROL, ID_USUARIO) VALUES(${id_rol},${id_usuario})";
		$this->db->query($sql4);

		//Se completa la transacción
		$this->db->trans_complete();
	}

	//Elimina un usuario del sistema
	function eliminarUsuario($id_usuario)
	{
		$id_usuario = pg_escape_string($id_usuario);
		
		//Inicia la transacción
		$this->db->trans_start();

		//Se elimina de la tabla
		$sql = "UPDATE USUARIO SET ESTADO = 'B' WHERE ID_USUARIO=${id_usuario}";
		$this->db->query($sql);

		//Se completa la transacción
		$this->db->trans_complete();
	}

	//Se obtienen los roles para un usuario
	function obtenerRoles()
	{
		$sql = "SELECT ID_ROL, NOMBRE_ROL, DESCRIPCION FROM ROL";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) return $res;
		else return false;
	}

	//Actualiza el nombre y clave del usuarios
	function actualizarClave($params)
	{
		$id_usuario = pg_escape_string($params['id_usuario']);
		$clave = sha1(pg_escape_string($params['clave']));

		//Se actualiza el usuario
		$sql = "UPDATE EMPLEADO SET HASH_CLAVE='${clave}' WHERE ID_PERSONA = ${id_usuario}";
		$this->db->query($sql);
	}

}