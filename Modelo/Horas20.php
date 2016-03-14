<?php

class Horas20 {
    
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexiones();
    }
    
     public function listarHoras() {
        $sql = "SELECT idhora_20, hora FROM hora_20";
        
        return $this->conexion->consulta($sql);
    } 
}
