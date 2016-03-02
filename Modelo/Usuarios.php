<?php

class Usuarios {

    private $idUsuario;
    private $correoEmpleado;
    private $contrasenia;
    private $idRol;
    private $nombreRol;
    private $descripcionRol;
    private $numIdentEmpleado;
    private $idEmpleado;
    private $nombreEmpleado;
    private $nombresEmpleado;
    private $apellidosEmpleado;
    private $idCargo;
    private $estadoUsuario;
    private $conexion;

    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function listarUsuarios() {
        $sql = "SELECT idUsuario, "
                . "roles_idRol, "
                . "nombreRol, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "correoEmpleado, "
                . "contrasenia "
                . "FROM usuarios "
                . "INNER JOIN roles ON roles_idRol = idRol "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado;";

        return $this->conexion->consulta($sql);
    }

    public function listarIdUsuario() {
        $sql = "SELECT idUsuario, "
                . "roles_idRol, "
                . "nombreRol, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "correoEmpleado, "
                . "contrasenia "
                . "FROM usuarios "
                . "INNER JOIN roles ON roles_idRol = idRol "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado "
                . "WHERE idUsuario = '{$this->getIdUsuario()}';";

        return $this->conexion->consulta($sql);
    }

    public function listarCorreoUsuario() {
        $sql = "SELECT idUsuario, "
                . "roles_idRol, "
                . "nombreRol, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "correoEmpleado, "
                . "contrasenia "
                . "FROM usuarios "
                . "INNER JOIN roles ON roles_idRol = idRol "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado "
                . "WHERE correoEmpleado like '%{$this->getCorreoEmpleado()}%';";

        return $this->conexion->consulta($sql);
    }

    public function insertarUsuario() {
        $sql = "INSERT INTO usuarios("
                . "idUsuario, "
                . "contrasenia, "
                . "roles_idRol, "
                . "empleados_idEmpleado, "
                . "estadoUsuario) "
                . "VALUE(NULL, "
                . "'{$this->getContrasenia()}', "
                . "{$this->getIdRol()}, "
                . "{$this->getIdEmpleado()}, "
                . "{$this->getEstadoUsuario()});";

        return $this->conexion->consultaSimple($sql);
    }

    public function editarUsuario() {
        $sql = "UPDATE usuarios "
                . "SET contrasenia = '{$this->getContrasenia()}', "
                . "roles_idRol = {$this->getIdRol()}, "
                . "empleados_idEmpleado = {$this->getIdEmpleado()}, "
                . "estadoUsuario = {$this->getEstadoUsuario()} "
                . "WHERE idUsuario = {$this->getIdUsuario()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarUsuario() {
        $sql = "DELETE FROM usuarios WHERE idUsuario = {$this->getIdUsuario()}";

        return $this->conexion->consultaSimple($sql);
    }

    public function verificarUsuario() {
        $sql = "SELECT idUsuario, "
                . "roles_idRol, "
                . "nombreRol, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, "
                . "correoEmpleado, "
                . "contrasenia "
                . "FROM usuarios "
                . "INNER JOIN roles ON roles_idRol = idRol "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado "
                . "WHERE correoEmpleado = '{$this->getCorreoEmpleado()}' "
                . "AND contrasenia = '{$this->getContrasenia()}';";

        return $this->conexion->consulta($sql);
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getCorreoEmpleado() {
        return $this->correoEmpleado;
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

    public function getDescripcionRol() {
        return $this->descripcionRol;
    }

    public function getNumIdentEmpleado() {
        return $this->numIdentEmpleado;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }

    public function getNombresEmpleado() {
        return $this->nombresEmpleado;
    }

    public function getApellidosEmpleado() {
        return $this->apellidosEmpleado;
    }

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getEstadoUsuario() {
        return $this->estadoUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setCorreoEmpleado($correoEmpleado) {
        $this->correoEmpleado = $correoEmpleado;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function setNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }

    public function setDescripcionRol($descripcionRol) {
        $this->descripcionRol = $descripcionRol;
    }

    public function setNumIdentEmpleado($numIdentEmpleado) {
        $this->numIdentEmpleado = $numIdentEmpleado;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    public function setNombresEmpleado($nombresEmpleado) {
        $this->nombresEmpleado = $nombresEmpleado;
    }

    public function setApellidosEmpleado($apellidosEmpleado) {
        $this->apellidosEmpleado = $apellidosEmpleado;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    public function setEstadoUsuario($estadoUsuario) {
        $this->estadoUsuario = $estadoUsuario;
    }


}
