<?php

class Consultorios {

    private $idConsultorio;
    private $numeroConsultorio;
    private $idCentroMedico;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarConsultorio() {
        $sql = "INSERT INTO consultorios(idConsultorio, numeroConsultorio,
        centros_medicos_idCentroMedico) VALUES (null, 
        '{$this->getNumeroConsultorio()}',
        '{$this->getIdCentroMedico()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarConsultorios() {
        $sql = "SELECT idConsultorio, numeroConsultorio, 
            centros_medicos_idCentroMedico, cm.nombreCentroMedico 
            FROM consultorios c 
            INNER JOIN centros_medicos cm ON cm.idCentroMedico = c.centros_medicos_idCentroMedico";
        return $this->conexion->consulta($sql);
    }

    public function listarIdConsultorio() {
        $sql = "SELECT idConsultorio, numeroConsultorio, nombreCentroMedico FROM consultorios c "
                ."INNER JOIN centros_medicos cm ON cm.idCentroMedico = c.centros_medicos_idCentroMedico
                WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consulta($sql);
    }

    public function editarConsultorio() {
        $sql = "UPDATE consultorios SET 
        numeroConsultorio='{$this->getNumeroConsultorio()}',
        centros_medicos_idCentroMedico='{$this->getIdCentroMedico()}'
        WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarConsultorio() {
        $sql = "DELETE FROM consultorios WHERE idConsultorio={$this->getIdConsultorio()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdCentroMedico(){
        return $this->idCentroMedico;
    }
    
    public function getIdConsultorio() {
        return $this->idConsultorio;
    }

    public function getNumeroConsultorio() {
        return $this->numeroConsultorio;
    }

    public function setIdCentroMedico($idCentroMedico) {
        $this->idCentroMedico = $idCentroMedico;
    }

    public function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }

    public function setNumeroConsultorio($numeroConsultorio) {
        $this->numeroConsultorio = $numeroConsultorio;
    }

}
