<?php

class Medicamentos {
    
    
    private $idMedicamento;
    private $codigoMedicamento;
    private $nombreGenericoMedicamento;
    private $descripcionMedicamento;
    private $formaFarmaceuticaMedicamento;
    private $concentracionMedicamento;
    private $dosisMedicamento;
    private $viaFrecuenciaAdministracionMedicamento;
    private $registroInvimaMedicamento;
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    public function insertarMedicamento() {
        $sql = "INSERT INTO medicamentos("
                . "idMedicamento, "
                . "codigoMedicamento, "
                . "nombreGenericoMedicamento, "
                . "descripcionMedicamento, "
                . "formaFarmaceuticaMedicamento, "
                . "concentracionMedicamento, "
                . "dosisMedicamento, "
                . "viaFrecuenciaAdministracionMedicamento, "
                . "registroInvimaMedicamento) "
                . "VALUES (null, "
                . "'{$this->getCodigoMedicamento()}', "
                . "'{$this->getNombreGenericoMedicamento()}', "
                . "'{$this->getDescripcionMedicamento()}', "
                . "'{$this->getFormaFarmaceuticaMedicamento()}', "
                . "'{$this->getConcentracionMedicamento()}', "
                . "'{$this->getDosisMedicamento()}', "
                . "'{$this->getViaFrecuenciaAdministracionMedicamento()}', "
                . "'{$this->getRegistroInvimaMedicamento()}');";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function listarMedicamentos() {
        $sql = "SELECT idMedicamento, "
                . "codigoMedicamento, "
                . "nombreGenericoMedicamento, "
                . "descripcionMedicamento, "
                . "formaFarmaceuticaMedicamento, "
                . "concentracionMedicamento, "
                . "dosisMedicamento, "
                . "viaFrecuenciaAdministracionMedicamento, "
                . "registroInvimaMedicamento "
                . "FROM medicamentos;";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarIdMedicamento() {
        $sql = "SELECT idMedicamento, "
                . "codigoMedicamento, "
                . "nombreGenericoMedicamento, "
                . "descripcionMedicamento, "
                . "formaFarmaceuticaMedicamento, "
                . "concentracionMedicamento, "
                . "dosisMedicamento, "
                . "viaFrecuenciaAdministracionMedicamento, "
                . "registroInvimaMedicamento "
                . "FROM medicamentos "
                . "WHERE idMedicamento={$this->getIdMedicamento()};";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarNombreMedicamento() {
        $sql = "SELECT idMedicamento, "
                . "codigoMedicamento, "
                . "nombreGenericoMedicamento, "
                . "descripcionMedicamento, "
                . "formaFarmaceuticaMedicamento, "
                . "concentracionMedicamento, "
                . "dosisMedicamento, "
                . "viaFrecuenciaAdministracionMedicamento, "
                . "registroInvimaMedicamento "
                . "FROM medicamentos "
                . "WHERE nombreGenericoMedicamento LIKE '%{$this->getNombreGenericoMedicamento()}%';";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarCodigoMedicamento() {
        $sql = "SELECT idMedicamento, "
                . "codigoMedicamento, "
                . "nombreGenericoMedicamento, "
                . "descripcionMedicamento, "
                . "formaFarmaceuticaMedicamento, "
                . "concentracionMedicamento, "
                . "dosisMedicamento, "
                . "viaFrecuenciaAdministracionMedicamento, "
                . "registroInvimaMedicamento "
                . "FROM medicamentos "
                . "WHERE codigoMedicamento LIKE '%{$this->getCodigoMedicamento()}%';";
        
        return $this->conexion->consulta($sql);
    }
    
    public function editarMedicamento() {
        $sql = "UPDATE medicamentos "
                . "SET codigoMedicamento='{$this->getCodigoMedicamento()}', "
                . "nombreGenericoMedicamento='{$this->getNombreGenericoMedicamento()}', "
                . "descripcionMedicamento='{$this->getDescripcionMedicamento()}', "
                . "formaFarmaceuticaMedicamento='{$this->getFormaFarmaceuticaMedicamento()}', "
                . "concentracionMedicamento='{$this->getConcentracionMedicamento()}', "
                . "dosisMedicamento='{$this->getDosisMedicamento()}', "
                . "viaFrecuenciaAdministracionMedicamento='{$this->getViaFrecuenciaAdministracionMedicamento()}', "
                . "registroInvimaMedicamento='{$this->getRegistroInvimaMedicamento()}' "
                . "WHERE idMedicamento={$this->getIdMedicamento()};";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function eliminarMedicamento() {
        $sql = "DELETE FROM medicamentos WHERE idMedicamento={$this->getIdMedicamento()};";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    
    public function getIdMedicamento() {
        return $this->idMedicamento;
    }

    public function getCodigoMedicamento() {
        return $this->codigoMedicamento;
    }

    public function getNombreGenericoMedicamento() {
        return $this->nombreGenericoMedicamento;
    }

    public function getDescripcionMedicamento() {
        return $this->descripcionMedicamento;
    }

    public function getFormaFarmaceuticaMedicamento() {
        return $this->formaFarmaceuticaMedicamento;
    }

    public function getConcentracionMedicamento() {
        return $this->concentracionMedicamento;
    }

    public function getDosisMedicamento() {
        return $this->dosisMedicamento;
    }

    public function getViaFrecuenciaAdministracionMedicamento() {
        return $this->viaFrecuenciaAdministracionMedicamento;
    }

    public function getRegistroInvimaMedicamento() {
        return $this->registroInvimaMedicamento;
    }

    public function setIdMedicamento($idMedicamento) {
        $this->idMedicamento = $idMedicamento;
    }

    public function setCodigoMedicamento($codigoMedicamento) {
        $this->codigoMedicamento = $codigoMedicamento;
    }

    public function setNombreGenericoMedicamento($nombreGenericoMedicamento) {
        $this->nombreGenericoMedicamento = $nombreGenericoMedicamento;
    }

    public function setDescripcionMedicamento($descripcionMedicamento) {
        $this->descripcionMedicamento = $descripcionMedicamento;
    }

    public function setFormaFarmaceuticaMedicamento($formaFarmaceuticaMedicamento) {
        $this->formaFarmaceuticaMedicamento = $formaFarmaceuticaMedicamento;
    }

    public function setConcentracionMedicamento($concentracionMedicamento) {
        $this->concentracionMedicamento = $concentracionMedicamento;
    }

    public function setDosisMedicamento($dosisMedicamento) {
        $this->dosisMedicamento = $dosisMedicamento;
    }

    public function setViaFrecuenciaAdministracionMedicamento($viaFrecuenciaAdministracionMedicamento) {
        $this->viaFrecuenciaAdministracionMedicamento = $viaFrecuenciaAdministracionMedicamento;
    }

    public function setRegistroInvimaMedicamento($registroInvimaMedicamento) {
        $this->registroInvimaMedicamento = $registroInvimaMedicamento;
    }


    
}
