<?php

class Consultorios {

    private $idConsultorio;
    private $numeroConsultorio;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarConsultorio() {
        $sql = "INSERT INTO consultorios(idConsultorio, numeroConsultorio, centros_medicos_idCentroMedico) "
                . "VALUES (null, '{$this->getNumeroConsultorio()}', 1);";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarConsultorios() {
        $sql = "SELECT idConsultorio, numeroConsultorio FROM consultorios;";

        return $this->conexion->consulta($sql);
    }

    public function listarIdConsultorio() {
        $sql = "SELECT idConsultorio, numeroConsultorio FROM consultorios "
                . "WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consulta($sql);
    }

    public function editarConsultorio() {
        $sql = "UPDATE consultorios SET numeroConsultorio='{$this->getNumeroConsultorio()}' "
                . "WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarConsultorio() {
        $sql = "DELETE FROM consultorios WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdConsultorio() {
        return $this->idConsultorio;
    }

    public function getNumeroConsultorio() {
        return $this->numeroConsultorio;
    }

    public function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }

    public function setNumeroConsultorio($numeroConsultorio) {
        $this->numeroConsultorio = $numeroConsultorio;
    }

}
