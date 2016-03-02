<?php

class Empleados {

    private $idEmpleado;
    private $identificacionEmpleado;
    private $idTipoDocumento;
    private $tipoDocumento;
    private $nombresEmpleado;
    private $apellidosEmpleado;
    private $fechaNacimientoEmpleado;
    private $tarjetaProfesionalEmpleado;
    private $idCargo;
    private $descripcionCargo;
    private $idEspecialidad;
    private $descripcionEspecialidad;
    private $idGenero;
    private $tipoGenero;
    private $estadoEmpleado;
    private $direccionEmpleado;
    private $telefonoEmpleado;
    private $movilEmpleado;
    private $correoEmpleado;
    private $conexion;

    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarEmpleado() {
        $sql = "INSERT INTO empleados(idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "tipos_documentos_idTipoDocumento, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "fechaNacimientoEmpleado, "
                . "tarjetaProfesionalEmpleado, "
                . "cargos_idCargo, "
                . "especialidades_idEspecialidad, "
                . "generos_idGenero, "
                . "estadoEmpleado, "
                . "direccionEmpleado, "
                . "telefonoEmpleado, "
                . "movilEmpleado, "
                . "correoEmpleado) "
                . "VALUES (null, "
                . "'{$this->getIdentificacionEmpleado()}', "
                . "{$this->getIdTipoDocumento()}, "
                . "'{$this->getNombresEmpleado()}', "
                . "'{$this->getApellidosEmpleado()}', "
                . "'{$this->getFechaNacimientoEmpleado()}', "
                . "'{$this->getTarjetaProfesionalEmpleado()}', "
                . "{$this->getIdCargo()}, "
                . "{$this->getIdEspecialidad()}, "
                . "{$this->getIdGenero()}, "
                . "{$this->getEstadoEmpleado()}, "
                . "'{$this->getDireccionEmpleado()}', "
                . "'{$this->getTelefonoEmpleado()}', "
                . "'{$this->getMovilEmpleado()}', "
                . "'{$this->getCorreoEmpleado()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarEmpleados() {
        $sql = "SELECT idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "tipoDocumento, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "fechaNacimientoEmpleado, "
                . "tarjetaProfesionalEmpleado,  "
                . "descripcionCargo, "
                . "descripcionEspecialidad, "
                . "tipoGenero, "
                . "estadoEmpleado, "
                . "direccionEmpleado, "
                . "telefonoEmpleado, "
                . "movilEmpleado, "
                . "correoEmpleado "
                . "FROM empleados "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN cargos ON cargos_idCargo = idCargo "
                . "INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad "
                . "INNER JOIN generos ON generos_idGenero = idGenero;";

        return $this->conexion->consulta($sql);
    }
    
    public function listarIdEmpleado() {
        $sql = "SELECT idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "tipos_documentos_idTipoDocumento, "
                . "tipoDocumento, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "fechaNacimientoEmpleado, "
                . "tarjetaProfesionalEmpleado, "
                . "cargos_idCargo, "
                . "descripcionCargo, "
                . "especialidades_idEspecialidad, "
                . "descripcionEspecialidad, "
                . "generos_idGenero, "
                . "tipoGenero, "
                . "estadoEmpleado, "
                . "direccionEmpleado, "
                . "telefonoEmpleado, "
                . "movilEmpleado, "
                . "correoEmpleado "
                . "FROM empleados "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN cargos ON cargos_idCargo = idCargo "
                . "INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "WHERE idEmpleado = {$this->getIdEmpleado()};";

        return $this->conexion->consulta($sql);
    }
    
    public function listarDocumentoEmpleado() {
        $sql = "SELECT idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "tipoDocumento, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "fechaNacimientoEmpleado, "
                . "tarjetaProfesionalEmpleado,  "
                . "descripcionCargo, "
                . "descripcionEspecialidad, "
                . "tipoGenero, "
                . "estadoEmpleado, "
                . "direccionEmpleado, "
                . "telefonoEmpleado, "
                . "movilEmpleado, "
                . "correoEmpleado "
                . "FROM empleados "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN cargos ON cargos_idCargo = idCargo "
                . "INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "WHERE numeroIdentificacionEmpleado = '{$this->getIdentificacionEmpleado()}';";

        return $this->conexion->consulta($sql);
    }
    
    public function editarEmpleado() {
        $sql = "UPDATE empleados "
                . "SET numeroIdentificacionEmpleado='{$this->getIdentificacionEmpleado()}', "
                . "tipos_documentos_idTipoDocumento={$this->getIdTipoDocumento()}, "
                . "nombresEmpleado='{$this->getNombresEmpleado()}', "
                . "apellidosEmpleado='{$this->getApellidosEmpleado()}', "
                . "fechaNacimientoEmpleado='{$this->getFechaNacimientoEmpleado()}', "
                . "tarjetaProfesionalEmpleado='{$this->getTarjetaProfesionalEmpleado()}', "
                . "cargos_idCargo={$this->getIdCargo()}, "
                . "especialidades_idEspecialidad={$this->getIdEspecialidad()}, "
                . "generos_idGenero={$this->getIdGenero()}, "
                . "estadoEmpleado={$this->getEstadoEmpleado()}, "
                . "direccionEmpleado='{$this->getDireccionEmpleado()}', "
                . "telefonoEmpleado='{$this->getTelefonoEmpleado()}', "
                . "movilEmpleado='{$this->getMovilEmpleado()}', "
                . "correoEmpleado='{$this->getCorreoEmpleado()}' "
                . "WHERE idEmpleado={$this->getIdEmpleado()};";

        return $this->conexion->consultaSimple($sql);
    }
    
    public function eliminarEmpleado() {
        $sql = "DELETE FROM empleados WHERE idEmpleado={$this->getIdEmpleado()};";

        return $this->conexion->consultaSimple($sql);
    }
    
    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getIdentificacionEmpleado() {
        return $this->identificacionEmpleado;
    }

    public function getIdTipoDocumento() {
        return $this->idTipoDocumento;
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

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    public function getIdEspecialidad() {
        return $this->idEspecialidad;
    }

    public function getDescripcionEspecialidad() {
        return $this->descripcionEspecialidad;
    }

    public function getIdGenero() {
        return $this->idGenero;
    }

    public function getTipoGenero() {
        return $this->tipoGenero;
    }

    public function getEstadoEmpleado() {
        return $this->estadoEmpleado;
    }

    public function getDireccionEmpleado() {
        return $this->direccionEmpleado;
    }

    public function getTelefonoEmpleado() {
        return $this->telefonoEmpleado;
    }

    public function getMovilEmpleado() {
        return $this->movilEmpleado;
    }

    public function getCorreoEmpleado() {
        return $this->correoEmpleado;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setIdentificacionEmpleado($identificacionEmpleado) {
        $this->identificacionEmpleado = $identificacionEmpleado;
    }

    public function setIdTipoDocumento($idTipoDocumento) {
        $this->idTipoDocumento = $idTipoDocumento;
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

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    public function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }

    public function setIdEspecialidad($idEspecialidad) {
        $this->idEspecialidad = $idEspecialidad;
    }

    public function setDescripcionEspecialidad($descripcionEspecialidad) {
        $this->descripcionEspecialidad = $descripcionEspecialidad;
    }

    public function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    public function setTipoGenero($tipoGenero) {
        $this->tipoGenero = $tipoGenero;
    }

    public function setEstadoEmpleado($estadoEmpleado) {
        $this->estadoEmpleado = $estadoEmpleado;
    }

    public function setDireccionEmpleado($direccionEmpleado) {
        $this->direccionEmpleado = $direccionEmpleado;
    }

    public function setTelefonoEmpleado($telefonoEmpleado) {
        $this->telefonoEmpleado = $telefonoEmpleado;
    }

    public function setMovilEmpleado($movilEmpleado) {
        $this->movilEmpleado = $movilEmpleado;
    }

    public function setCorreoEmpleado($correoEmpleado) {
        $this->correoEmpleado = $correoEmpleado;
    }



}
