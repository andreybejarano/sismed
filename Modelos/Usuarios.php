<?php

require_once 'Conexiones.php';

class Usuarios {
	
	private $idUsuario;
	private $nombresUsuario;
	private $apellidosUsuario;
	private $inicioSesion;
	private $contrasenia;
	private $idRol;
	private $nombreRol;
        private $idEmpleado;
        private $nombreEmpleado;
	private $conexion;
	
	function __construct() {
		$this->conexion = new Conexiones();
	}
	
	public function listarUsuarios() {
		$sql = "SELECT idUsuario, 
				nombresUsuario, 
				apellidosUsuario, 
				inicioSesion, 
				contrasenia, 
				nombreRol, 
                                numeroIdentificacionEmpleado, 
                                nombresEmpleado, 
                                apellidosEmpleado 
				FROM usuarios 
				INNER JOIN roles ON idRol = roles_idRol 
                                INNER JOIN empleados ON idEmpleado = empleados_idEmpleado;";
		
		return $this->conexion->consulta($sql);
	}
	
	public function insertarUsuario() {
		$sql = "INSERT INTO usuarios(idUsuario, 
				nombresUsuario, 
				apellidosUsuario, 
				inicioSesion, 
				contrasenia, 
				roles_idRol, 
                                empleados_idEmpleado) 
				VALUE(NULL, 
				'{$this->getNombresUsuario()}', 
				'{$this->getApellidosUsuario()}', 
				'{$this->getInicioSesion()}', 
				'{$this->getContrasenia()}', 
				{$this->getIdRol()}, 
                                {$this->getIdEmpleado()});";
		
		return $this->conexion->consultaSimple($sql);
	}
	
	public function listarIdUsuario() {
		$sql = "SELECT idUsuario, 
				nombresUsuario, 
				apellidosUsuario, 
				inicioSesion, 
				contrasenia, 
				roles_idRol, 
				nombreRol, 
                                numeroIdentificacionEmpleado, 
                                nombresEmpleado, 
                                apellidosEmpleado 
				FROM usuarios 
				INNER JOIN roles ON roles_idRol = idRol 
                                INNER JOIN empleados ON idEmpleado = empleados_idEmpleado 
				WHERE idUsuario = {$this->getIdUsuario()};";
		
		return $this->conexion->consulta($sql);
	}
	
	public function editarUsuario() {
		$sql = "UPDATE usuarios 
				SET nombresUsuario = '{$this->getNombresUsuario()}', 
				apellidosUsuario = '{$this->getApellidosUsuario()}', 
				inicioSesion = '{$this->getInicioSesion()}', 
				contrasenia = '{$this->getContrasenia()}', 
				roles_idRol = {$this->getIdRol()} 
                                empleados_idEmpleado = {$this->getIdEmpleado()} 
				WHERE idUsuario = {$this->getIdUsuario()};";

		return $this->conexion->consultaSimple($sql);
	}
	
	public function eliminarUsuario() {
		$sql = "DELETE FROM usuarios 
				WHERE idUsuario = {$this->getIdUsuario()}";
				
		return $this->conexion->consultaSimple($sql);
	}
	
	public function listarRoles() {
            $sql = "SELECT idRol, 
                    nombreRol, 
                    descripcionRol 
                    FROM roles;";
            return $this->conexion->consulta($sql);
        }
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	
	public function setNombresUsuario($nombresUsuario){
		$this->nombresUsuario = $nombresUsuario;
	}
	
	public function setApellidosUsuario($apellidosUsuario){
		$this->apellidosUsuario = $apellidosUsuario;
	}
	
	public function setInicioSesion($inicioSesion){
		$this->inicioSesion = $inicioSesion;
	}
	
	public function setContrasenia($contrasenia){
		$this->contrasenia = $contrasenia;
	}
	
	public function setIdRol($idRol){
		$this->idRol = $idRol;
	}
	
	public function setNombreRol($nombreRol){
		$this->nombreRol = $nombreRol;
	}
        
        public function setIdEmpleado($idEmpleado) {
            $this->idEmpleado = $idEmpleado;
        }

        public function setNombreEmpleado($nombreEmpleado) {
            $this->nombreEmpleado = $nombreEmpleado;
        }
	
	public function getIdUsuario() {
		return $this->idUsuario;
	}
	
	public function getNombresUsuario() {
		return $this->nombresUsuario;
	}
	
	public function getApellidosUsuario() {
		return $this->apellidosUsuario;
	}
	
	public function getInicioSesion() {
		return $this->inicioSesion;
	}
	
	public function getContrasenia() {
		return $this->contrasenia;
	}
	
	public function getIdRol() {
		return $this->idRol;
	}
	
	public function getNombreRol() {
		return $this->nombreRol;
	}
        
        public function getIdEmpleado() {
            return $this->idEmpleado;
        }

        public function getNombreEmpleado() {
            return $this->nombreEmpleado;
        }
}

//$objeto = new Usuarios();
//$objeto->setIdUsuario(2);
//$objeto->eliminarUsuario();
///*$objeto->setNombresUsuario('Fabio');
//$objeto->setApellidosUsuario('Angulo');
//$objeto->setInicioSesion('yunior');
//$objeto->setContrasenia('123456');
//$objeto->setIdRol(1);
//$objeto->editarUsuario();
//$insertar = $objeto->insertarUsuario();
//if($insertar){
//	echo "Usuario creado correctamente<br>";
//}*/
////listar Todos los usuarios;
//$arreglo = $objeto->listarUsuarios();
//foreach($arreglo as $indice){
//	echo $indice['idUsuario']."<br>";
//	echo $indice['nombresUsuario']."<br>";
//}
//
////listar usuario creado;
//echo "<hr>";
//$objeto->setIdUsuario('1');
//$usuario = $objeto->listarIdUsuario();
//if(!empty($usuario)){
//	foreach($usuario as $indice){
//		echo $indice['idUsuario']."<br>";
//		echo $indice['nombresUsuario']."<br>";
//		echo $indice['nombreRol'];
//	}
//}else {
//	echo "No hay usuarios con este id";
//}