<?php

class Cargos {
    
    private $idCargo;
    private $descripcionCargo;
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    public function insertarCargo() {
        $sql = "INSERT INTO cargos(idCargo, descripcionCargo) "
                . "VALUES (null, '{$this->getDescripcionCargo()}')";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function listarCargos() {
        $sql = "SELECT idCargo, descripcionCargo FROM cargos";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarIdCargo() {
        $sql = "SELECT idCargo, descripcionCargo "
                . "FROM cargos WHERE idCargo={$this->getIdCargo()}";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarDescCargo() {
        $sql = "SELECT idCargo, descripcionCargo "
                . "FROM cargos "
                . "WHERE descripcionCargo LIKE '%{$this->getDescripcionCargo()}%'";
        
        return $this->conexion->consulta($sql);
    }
    
    public function editarCargo() {
        $sql = "UPDATE cargos SET descripcionCargo ='{$this->getDescripcionCargo()}' "
        . "WHERE idCargo={$this->getIdCargo()}";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function eliminarCargo() {
        $sql = "DELETE FROM cargos WHERE idCargo={$this->getIdCargo()}";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    public function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }


}
