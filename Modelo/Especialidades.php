<?php

class Especialidades {
    
    private $idEspecialidad;
    private $descripcionEspecialidad;
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    public function insertarEspecialidad() {
        $sql = "INSERT INTO especialidades(idEspecialidad, descripcionEspecialidad) "
                . "VALUES (null, '{$this->getDescripcionEspecialidad()}');";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function listarEspecialidades() {
        $sql = "SELECT idEspecialidad, descripcionEspecialidad FROM especialidades;";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarIdEspecialidad() {
        $sql = "SELECT idEspecialidad, descripcionEspecialidad "
                . "FROM especialidades "
                . "WHERE idEspecialidad = {$this->getIdEspecialidad()};";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarDescripcionEspecialidad() {
        $sql = "SELECT idEspecialidad, descripcionEspecialidad "
                . "FROM especialidades "
                . "WHERE descripcionEspecialidad LIKE '%{$this->getDescripcionEspecialidad()}%';";
        
        return $this->conexion->consulta($sql);
    }
    
    public function editarEspecialidad() {
        $sql = "UPDATE especialidades "
                . "SET descripcionEspecialidad='{$this->getDescripcionEspecialidad()}' "
                . "WHERE idEspecialidad={$this->getIdEspecialidad()};";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function eliminarEspecialidad() {
        $sql = "DELETE FROM especialidades WHERE idEspecialidad={$this->getIdEspecialidad()}";
        
        return $this->conexion->consultaSimple($sql);
    }
    
    public function getIdEspecialidad() {
        return $this->idEspecialidad;
    }

    public function getDescripcionEspecialidad() {
        return $this->descripcionEspecialidad;
    }

    public function setIdEspecialidad($idEspecialidad) {
        $this->idEspecialidad = $idEspecialidad;
    }

    public function setDescripcionEspecialidad($descripcionEspecialidad) {
        $this->descripcionEspecialidad = $descripcionEspecialidad;
    }


}
