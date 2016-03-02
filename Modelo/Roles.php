<?php

class Roles {

    private $idRol;
    private $nombreRol;
    private $descripcionRol;
    private $conexion;

    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function listarRoles() {
        $sql = "SELECT idRol, nombreRol, descripcionRol FROM roles";

        return $this->conexion->consulta($sql);
    }
    
     public function listarIdRol() {
        $sql = "SELECT idRol, nombreRol, descripcionRol FROM roles WHERE idRol={$this->getIdRol()}";

        return $this->conexion->consulta($sql);
    }

    public function listarNombreRol() {
        $sql = "SELECT idRol, nombreRol, descripcionRol FROM roles WHERE nombreRol like '%{$this->getNombreRol()}%'";

        return $this->conexion->consulta($sql);
    }

    public function insertarRol() {
        $sql = "INSERT INTO roles(idRol, nombreRol, descripcionRol) "
                . "VALUES (null, '{$this->getNombreRol()}', '{$this->getDescripcionRol()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function editarRol() {
        $sql = "UPDATE roles SET nombreRol='{$this->getNombreRol()}', "
                . "descripcionRol='{$this->getDescripcionRol()}' "
                . "WHERE idRol={$this->getIdRol()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarRol() {
        $sql = "DELETE FROM roles WHERE idRol={$this->getIdRol()};";

        return $this->conexion->consultaSimple($sql);
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

    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function setNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }

    public function setDescripcionRol($descripcionRol) {
        $this->descripcionRol = $descripcionRol;
    }

    
}
