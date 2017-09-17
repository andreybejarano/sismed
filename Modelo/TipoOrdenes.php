<?php

class TipoOrdenes {

    private $idTipoOrden;
    private $tipoOrden;
    private $descripcionTipoOrden;
    private $conexion;

    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function listarTipoOrdenes() {
        $sql = "SELECT idTipoOrden, tipoOrden, descripcionTipoOrden FROM tipos_ordenes";

        return $this->conexion->consulta($sql);
    }
    
     public function listarIdTipoOrden() {
        $sql = "SELECT idTipoOrden, tipoOrden, descripcionTipoOrden  FROM tipos_ordenes WHERE idTipoOrden={$this->getIdTipoOrden()}";

        return $this->conexion->consulta($sql);
    }

    public function listarTipoOrden() {
        $sql = "SELECT idTipoOrden, tipoOrden, descripcionTipoOrden FROM tipos_ordenes WHERE tipoOrden like '%{$this->getTipoOrden()}%'";

        return $this->conexion->consulta($sql);
    }

    public function insertarTipoOrden() {
        $sql = "INSERT INTO tipos_ordenes(idTipoOrden, tipoOrden, descripcionTipoOrden) "
                . "VALUES (null, '{$this->getTipoOrden()}', '{$this->getDescripcionTipoOrden()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function editarTipoOrden() {
        $sql = "UPDATE tipos_ordenes SET tipoOrden='{$this->getTipoOrden()}',descripcionTipoOrden='{$this->getDescripcionTipoOrden()}'"
                . "WHERE idTipoOrden = '{$this->getIdTipoOrden()}';";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarTipoOrden() {
        $sql = "DELETE FROM tipos_ordenes WHERE idTipoOrden={$this->getIdTipoOrden()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdTipoOrden() {
        return $this->idTipoOrden;
    }

    public function getTipoOrden() {
        return $this->tipoOrden;
    }
    
    public function getDescripcionTipoOrden() {
        return $this->descripcionTipoOrden;
    }

    public function setIdTipoOrden($idTipoOrden) {
        $this->idTipoOrden = $idTipoOrden;
    }

    public function setTipoOrden($tipoOrden) {
        $this->tipoOrden = $tipoOrden;
    }
    
    public function setDescripcionTipoOrden($descripcionTipoOrden) {
        $this->descripcionTipoOrden = $descripcionTipoOrden;
    }

}


