<?php

class Regionales {
    
    private $idRegional;
    private $nombreRegional;
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    public function listarRegionales() {
        $sql = "SELECT idRegional, nombreRegional, zonas_idZona FROM regionales ORDER BY nombreRegional";
        
        return $this->conexion->consulta($sql);
    }
}
