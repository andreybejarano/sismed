<?php

class Empleados {

    private $idEmpleado;
    private $identificacionEmpleado;
    private $tipoDocumento;
    private $nombresEmpleado;
    private $apellidosEmpleado;
    private $fechaNacimientoEmpleado;
    private $tarjetaProfesionalEmpleado;
    private $descripcionCargo;
    private $descripcionEspecialidad;
    private $tipoGenero;
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function listarEmpleados() {
        $sql = "SELECT idEmpleado, 
                numeroIdentificacionEmpleado, 
                tipoDocumento, 
                nombresEmpleado, 
                apellidosEmpleado, 
                fechaNacimientoEmpleado, 
                tarjetaProfesionalEmpleado, 
                descripcionCargo, 
                descripcionEspecialidad, 
                tipoGenero 
                FROM empleados 
                INNER JOIN tipos_documentos ON idTipoDocumento = tipos_documentos_idTipoDocumento 
                INNER JOIN cargos ON cargos_idCargo = idCargo 
                INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad 
                INNER JOIN generos ON generos_idGenero = idGenero;";
        return $this->conexion->consulta($sql);
    }

    public function listarEmpleadosDocumento() {
    	$sql = "SELECT idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "tipoDocumento, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "fechaNacimientoEmpleado, "
                . "tarjetaProfesionalEmpleado, "
                . "descripcionCargo, "
                . "descripcionEspecialidad, "
                . "tipoGenero FROM empleados "
                . "INNER JOIN tipos_documentos ON idTipoDocumento = tipos_documentos_idTipoDocumento "
                . "INNER JOIN cargos ON cargos_idCargo = idCargo "
                . "INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "WHERE numeroIdentificacionEmpleado = '{$this->getIdentificacionEmpleado()}';";
        return $this->conexion->consulta($sql);
    }
    
    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getIdentificacionEmpleado() {
        return $this->identificacionEmpleado;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNombresEmpleado() {
        return $this->nombresEmpleado;
    }

    public function getApellidosEmpleado() {
        return $this->apellidosEmpleado;
    }

    public function getFechaNacimientoEmpleado() {
        return $this->fechaNacimientoEmpleado;
    }

    public function getTarjetaProfesionalEmpleado() {
        return $this->tarjetaProfesionalEmpleado;
    }

    public function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    public function getDescripcionEspecialidad() {
        return $this->descripcionEspecialidad;
    }

    public function getTipoGenero() {
        return $this->tipoGenero;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setIdentificacionEmpleado($identificacionEmpleado) {
        $this->identificacionEmpleado = $identificacionEmpleado;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNombresEmpleado($nombresEmpleado) {
        $this->nombresEmpleado = $nombresEmpleado;
    }

    public function setApellidosEmpleado($apellidosEmpleado) {
        $this->apellidosEmpleado = $apellidosEmpleado;
    }

    public function setFechaNacimientoEmpleado($fechaNacimientoEmpleado) {
        $this->fechaNacimientoEmpleado = $fechaNacimientoEmpleado;
    }

    public function setTarjetaProfesionalEmpleado($tarjetaProfesionalEmpleado) {
        $this->tarjetaProfesionalEmpleado = $tarjetaProfesionalEmpleado;
    }

    public function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }

    public function setDescripcionEspecialidad($descripcionEspecialidad) {
        $this->descripcionEspecialidad = $descripcionEspecialidad;
    }

    public function setTipoGenero($tipoGenero) {
        $this->tipoGenero = $tipoGenero;
    }


}
