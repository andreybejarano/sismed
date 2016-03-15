<?php

class Enfermedades {

    private $idEnfermedad;
    private $nombreEnfermedad;
    private $sintomatologiaEnfermedad;
    private $tratamientoEnfermedad;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarEnfermedad() {
        $sql = "INSERT INTO enfermedades(idEnfermedad, "
                . "nombreEnfermedad, "
                . "sintomatologiaEnfermedad, "
                . "tratamientoEnfermedad) "
                . "VALUES (null, "
                . "'{$this->getNombreEnfermedad()}', "
                . "'{$this->getSintomatologiaEnfermedad()}', "
                . "'{$this->getTratamientoEnfermedad()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarEnfermedades() {
        $sql = "SELECT idEnfermedad, "
                . "nombreEnfermedad, "
                . "sintomatologiaEnfermedad, "
                . "tratamientoEnfermedad "
                . "FROM enfermedades;";

        return $this->conexion->consulta($sql);
    }

    public function listarIdEnfermedad() {
        $sql = "SELECT idEnfermedad, "
                . "nombreEnfermedad, "
                . "sintomatologiaEnfermedad, "
                . "tratamientoEnfermedad "
                . "FROM enfermedades "
                . "WHERE idEnfermedad={$this->getIdEnfermedad()};";

        return $this->conexion->consulta($sql);
    }

    public function listarNombreEnfermedad() {
        $sql = "SELECT idEnfermedad, "
                . "nombreEnfermedad, "
                . "sintomatologiaEnfermedad, "
                . "tratamientoEnfermedad "
                . "FROM enfermedades "
                . "WHERE nombreEnfermedad LIKE '%{$this->getNombreEnfermedad()}%';";

        return $this->conexion->consulta($sql);
    }

    public function editarEnfermedad() {
        $sql = "UPDATE enfermedades "
                . "SET nombreEnfermedad='{$this->getNombreEnfermedad()}', "
                . "sintomatologiaEnfermedad='{$this->getSintomatologiaEnfermedad()}', "
                . "tratamientoEnfermedad='{$this->getTratamientoEnfermedad()}' "
                . "WHERE idEnfermedad={$this->getIdEnfermedad()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarEnfermedad() {
        $sql = "DELETE FROM enfermedades WHERE idEnfermedad={$this->getIdEnfermedad()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdEnfermedad() {
        return $this->idEnfermedad;
    }

    public function getNombreEnfermedad() {
        return $this->nombreEnfermedad;
    }

    public function getSintomatologiaEnfermedad() {
        return $this->sintomatologiaEnfermedad;
    }

    public function getTratamientoEnfermedad() {
        return $this->tratamientoEnfermedad;
    }

    public function setIdEnfermedad($idEnfermedad) {
        $this->idEnfermedad = $idEnfermedad;
    }

    public function setNombreEnfermedad($nombreEnfermedad) {
        $this->nombreEnfermedad = $nombreEnfermedad;
    }

    public function setSintomatologiaEnfermedad($sintomatologiaEnfermedad) {
        $this->sintomatologiaEnfermedad = $sintomatologiaEnfermedad;
    }

    public function setTratamientoEnfermedad($tratamientoEnfermedad) {
        $this->tratamientoEnfermedad = $tratamientoEnfermedad;
    }

}
