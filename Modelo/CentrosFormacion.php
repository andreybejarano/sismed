<?php

class centrosFormacion {

    private $idCentroFormacion;
    private $nombreCentroFormacion;
    private $sigla;
    private $direccionCentroFormacion;
    private $telefonoCentroFormacion;
    private $idRegional;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarCentroFormacion() {
        $sql = "INSERT INTO centros_formacion("
                . "idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "regionales_idRegional) "
                . "VALUES (null, "
                . "'{$this->getNombreCentroFormacion()}', "
                . "'{$this->getSigla()}', "
                . "'{$this->getDireccionCentroFormacion()}', "
                . "'{$this->getTelefonoCentroFormacion()}', "
                . "{$this->getIdRegional()})";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarCentrosFormacion() {
        $sql = "SELECT idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "nombreRegional, "
                . "nombreZona "
                . "FROM centros_formacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "INNER JOIN zonas ON zonas_idZona = idZona; ";

        return $this->conexion->consulta($sql);
    }

    public function listarIdCentroFormacion() {
        $sql = "SELECT idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "regionales_idRegional, "
                . "nombreRegional, "
                . "nombreZona "
                . "FROM centros_formacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "INNER JOIN zonas ON zonas_idZona = idZona "
                . "WHERE idCentroFormacion={$this->getIdCentroFormacion()};";

        return $this->conexion->consulta($sql);
    }

    public function listarNombreCentroFormacion() {
        $sql = "SELECT idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "nombreRegional, "
                . "nombreZona "
                . "FROM centros_formacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "INNER JOIN zonas ON zonas_idZona = idZona "
                . "WHERE nombreCentroFormacion LIKE '%{$this->getNombreCentroFormacion()}%'";

        return $this->conexion->consulta($sql);
    }

    public function listarSiglaCentroFormacion() {
        $sql = "SELECT idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "nombreRegional, "
                . "nombreZona "
                . "FROM centros_formacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "INNER JOIN zonas ON zonas_idZona = idZona "
                . "WHERE sigla = '{$this->getSigla()}'";

        return $this->conexion->consulta($sql);
    }
    
    public function listarCentroFormacionRegional() {
        $sql = "SELECT idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "sigla, "
                . "direccionCentroFormacion, "
                . "telefonoCentroFormacion, "
                . "regionales_idRegional, "
                . "nombreRegional, "
                . "nombreZona "
                . "FROM centros_formacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "INNER JOIN zonas ON zonas_idZona = idZona "
                . "WHERE regionales_idRegional = {$this->getIdRegional()}";
                
        return $this->conexion->consulta($sql);
    }

    public function editarCentroFormacion() {
        $sql = "UPDATE centros_formacion "
                . "SET nombreCentroFormacion='{$this->getNombreCentroFormacion()}', "
                . "sigla='{$this->getSigla()}', "
                . "direccionCentroFormacion='{$this->getDireccionCentroFormacion()}', "
                . "telefonoCentroFormacion='{$this->getTelefonoCentroFormacion()}', "
                . "regionales_idRegional={$this->getIdRegional()} "
                . "WHERE idCentroFormacion = {$this->getIdCentroFormacion()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarCentroFormacion() {
        $sql = "DELETE FROM centros_formacion WHERE idCentroFormacion={$this->getIdCentroFormacion()};";

        return $this->conexion->consultaSimple($sql);
    }
    
    public function getIdCentroFormacion() {
        return $this->idCentroFormacion;
    }

    public function getNombreCentroFormacion() {
        return $this->nombreCentroFormacion;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function getDireccionCentroFormacion() {
        return $this->direccionCentroFormacion;
    }

    public function getTelefonoCentroFormacion() {
        return $this->telefonoCentroFormacion;
    }

    public function getIdRegional() {
        return $this->idRegional;
    }

    public function setIdCentroFormacion($idCentroFormacion) {
        $this->idCentroFormacion = $idCentroFormacion;
    }

    public function setNombreCentroFormacion($nombreCentroFormacion) {
        $this->nombreCentroFormacion = $nombreCentroFormacion;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    public function setDireccionCentroFormacion($direccionCentroFormacion) {
        $this->direccionCentroFormacion = $direccionCentroFormacion;
    }

    public function setTelefonoCentroFormacion($telefonoCentroFormacion) {
        $this->telefonoCentroFormacion = $telefonoCentroFormacion;
    }

    public function setIdRegional($idRegional) {
        $this->idRegional = $idRegional;
    }

}
