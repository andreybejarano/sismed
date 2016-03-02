<?php

class CentrosMedicos {

    private $idCentroMedico;
    private $nombreCentroMedico;
    private $telefonoCentroMedico;
    private $celularCentroMedico;
    private $direccionCentroMedico;
    private $correoCentroMedico;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarCentroMedico() {
        $sql = "INSERT INTO centros_medicos("
                . "idCentroMedico, "
                . "nombreCentroMedico, "
                . "telefonoCentroMedico, "
                . "celularCentroMedico, "
                . "direccionCentroMedico, "
                . "correoCentroMedico) "
                . "VALUES (null, "
                . "'{$this->getNombreCentroMedico()}', "
                . "'{$this->getTelefonoCentroMedico()}', "
                . "'{$this->getCelularCentroMedico()}', "
                . "'{$this->getDireccionCentroMedico()}', "
                . "'{$this->getCorreoCentroMedico()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarCentrosMedicos() {
        $sql = "SELECT idCentroMedico, "
                . "nombreCentroMedico, "
                . "telefonoCentroMedico, "
                . "celularCentroMedico, "
                . "direccionCentroMedico, "
                . "correoCentroMedico "
                . "FROM centros_medicos";

        return $this->conexion->consulta($sql);
    }

    public function listarIdCentroMedico() {
        $sql = "SELECT idCentroMedico, "
                . "nombreCentroMedico, "
                . "telefonoCentroMedico, "
                . "celularCentroMedico, "
                . "direccionCentroMedico, "
                . "correoCentroMedico "
                . "FROM centros_medicos "
                . "WHERE idCentroMedico={$this->getIdCentroMedico()};";

        return $this->conexion->consulta($sql);
    }

    public function listarNombreCentroMedico() {
        $sql = "SELECT idCentroMedico, "
                . "nombreCentroMedico, "
                . "telefonoCentroMedico, "
                . "celularCentroMedico, "
                . "direccionCentroMedico, "
                . "correoCentroMedico "
                . "FROM centros_medicos "
                . "WHERE nombreCentroMedico LIKE '%{$this->getNombreCentroMedico()}%';";

        return $this->conexion->consulta($sql);
    }

    public function editarCentroMedico() {
        $sql = "UPDATE centros_medicos "
                . "SET nombreCentroMedico='{$this->getNombreCentroMedico()}', "
                . "telefonoCentroMedico='{$this->getTelefonoCentroMedico()}', "
                . "celularCentroMedico='{$this->getCelularCentroMedico()}', "
                . "direccionCentroMedico='{$this->getDireccionCentroMedico()}', "
                . "correoCentroMedico='{$this->getCorreoCentroMedico()}' "
                . "WHERE idCentroMedico={$this->getIdCentroMedico()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarCentroMedico() {
        $sql = "DELETE FROM centros_medicos WHERE idCentroMedico={$this->getIdCentroMedico()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdCentroMedico() {
        return $this->idCentroMedico;
    }

    public function getNombreCentroMedico() {
        return $this->nombreCentroMedico;
    }

    public function getTelefonoCentroMedico() {
        return $this->telefonoCentroMedico;
    }

    public function getCelularCentroMedico() {
        return $this->celularCentroMedico;
    }

    public function getDireccionCentroMedico() {
        return $this->direccionCentroMedico;
    }

    public function getCorreoCentroMedico() {
        return $this->correoCentroMedico;
    }

    public function setIdCentroMedico($idCentroMedico) {
        $this->idCentroMedico = $idCentroMedico;
    }

    public function setNombreCentroMedico($nombreCentroMedico) {
        $this->nombreCentroMedico = $nombreCentroMedico;
    }

    public function setTelefonoCentroMedico($telefonoCentroMedico) {
        $this->telefonoCentroMedico = $telefonoCentroMedico;
    }

    public function setCelularCentroMedico($celularCentroMedico) {
        $this->celularCentroMedico = $celularCentroMedico;
    }

    public function setDireccionCentroMedico($direccionCentroMedico) {
        $this->direccionCentroMedico = $direccionCentroMedico;
    }

    public function setCorreoCentroMedico($correoCentroMedico) {
        $this->correoCentroMedico = $correoCentroMedico;
    }

}
