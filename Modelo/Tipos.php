<?php

class Tipos {
    
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    public function listarTipoDocumento() {
        $sql = "SELECT idTipoDocumento, tipoDocumento FROM tipos_documentos;";
        
        return $this->conexion->consulta($sql);
    }
}
