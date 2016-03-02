<?php

class Funcionarios {

    private $idFuncionario;
    private $IdentificacionFuncionario;
    private $nombresFuncionario;
    private $apellidosFuncionario;
    private $fechaNacimientoFuncionario;
    private $idCentroFormacion;
    private $idGenero;
    private $idTipoDocumento;
    private $estadoFuncionario;
    private $direccionFuncionario;
    private $telefonoFuncionario;
    private $movilFuncionario;
    private $correoFuncionario;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarFuncionario() {
        $sql = "INSERT INTO funcionarios(idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "fechaNacimientoFuncionario, "
                . "centros_formacion_idCentroFormacion, "
                . "generos_idGenero, "
                . "tipos_documentos_idTipoDocumento, "
                . "estadoFuncionario, "
                . "direccionFuncionario, "
                . "telefonoFuncionario, "
                . "movilFuncionario, "
                . "correoFuncionario) "
                . "VALUES (null, "
                . "'{$this->getIdentificacionFuncionario()}', "
                . "'{$this->getNombresFuncionario()}', "
                . "'{$this->getApellidosFuncionario()}', "
                . "'{$this->getFechaNacimientoFuncionario()}', "
                . "{$this->getIdCentroFormacion()}, "
                . "{$this->getIdGenero()}, "
                . "{$this->getIdTipoDocumento()}, "
                . "{$this->getEstadoFuncionario()}, "
                . "'{$this->getDireccionFuncionario()}', "
                . "'{$this->getTelefonoFuncionario()}', "
                . "'{$this->getMovilFuncionario()}', "
                . "'{$this->getCorreoFuncionario()}');";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarFuncionarios() {
        $sql = "SELECT idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "tipos_documentos_idTipoDocumento, "
                . "tipoDocumento, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "generos_idGenero, "
                . "tipoGenero, "
                . "fechaNacimientoFuncionario, "
                . "centros_formacion_idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "regionales_idRegional, "
                . "nombreRegional, "
                . "estadoFuncionario, "
                . "direccionFuncionario, "
                . "telefonoFuncionario, "
                . "movilFuncionario, "
                . "correoFuncionario "
                . "FROM funcionarios "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "INNER JOIN centros_formacion ON centros_formacion_idCentroFormacion = idCentroFormacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional;";

        return$this->conexion->consulta($sql);
    }

    public function listarIdFuncionario() {
        $sql = "SELECT idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "tipos_documentos_idTipoDocumento, "
                . "tipoDocumento, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "generos_idGenero, "
                . "tipoGenero, "
                . "fechaNacimientoFuncionario, "
                . "centros_formacion_idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "regionales_idRegional, "
                . "nombreRegional, "
                . "estadoFuncionario, "
                . "direccionFuncionario, "
                . "telefonoFuncionario, "
                . "movilFuncionario, "
                . "correoFuncionario "
                . "FROM funcionarios "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "INNER JOIN centros_formacion ON centros_formacion_idCentroFormacion = idCentroFormacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "WHERE idFuncionario = {$this->getIdFuncionario()};";

        return$this->conexion->consulta($sql);
    }

    public function listarDocumentoFuncionario() {
        $sql = "SELECT idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "tipos_documentos_idTipoDocumento, "
                . "tipoDocumento, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "generos_idGenero, "
                . "tipoGenero, "
                . "fechaNacimientoFuncionario, "
                . "centros_formacion_idCentroFormacion, "
                . "nombreCentroFormacion, "
                . "regionales_idRegional, "
                . "nombreRegional, "
                . "estadoFuncionario, "
                . "direccionFuncionario, "
                . "telefonoFuncionario, "
                . "movilFuncionario, "
                . "correoFuncionario "
                . "FROM funcionarios "
                . "INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento "
                . "INNER JOIN generos ON generos_idGenero = idGenero "
                . "INNER JOIN centros_formacion ON centros_formacion_idCentroFormacion = idCentroFormacion "
                . "INNER JOIN regionales ON regionales_idRegional = idRegional "
                . "WHERE numeroIdentificacionFuncionario = '{$this->getIdentificacionFuncionario()}';";

        return$this->conexion->consulta($sql);
    }

    public function editarFuncionario() {
        $sql = "UPDATE funcionarios "
                . "SET numeroIdentificacionFuncionario='{$this->getIdentificacionFuncionario()}', "
                . "nombresFuncionario='{$this->getNombresFuncionario()}', "
                . "apellidosFuncionario='{$this->getApellidosFuncionario()}', "
                . "fechaNacimientoFuncionario='{$this->getFechaNacimientoFuncionario()}', "
                . "centros_formacion_idCentroFormacion={$this->getIdCentroFormacion()}, "
                . "generos_idGenero={$this->getIdGenero()}, "
                . "tipos_documentos_idTipoDocumento={$this->getIdTipoDocumento()}, "
                . "estadoFuncionario={$this->getEstadoFuncionario()}, "
                . "direccionFuncionario='{$this->getDireccionFuncionario()}', "
                . "telefonoFuncionario='{$this->getTelefonoFuncionario()}', "
                . "movilFuncionario='{$this->getMovilFuncionario()}', "
                . "correoFuncionario='{$this->getCorreoFuncionario()}' "
                . "WHERE idFuncionario={$this->getIdFuncionario()}";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarFuncionario() {
        $sql = "DELETE FROM funcionarios WHERE idFuncionario={$this->getIdFuncionario()}";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function getIdentificacionFuncionario() {
        return $this->IdentificacionFuncionario;
    }

    public function getNombresFuncionario() {
        return $this->nombresFuncionario;
    }

    public function getApellidosFuncionario() {
        return $this->apellidosFuncionario;
    }

    public function getFechaNacimientoFuncionario() {
        return $this->fechaNacimientoFuncionario;
    }

    public function getIdCentroFormacion() {
        return $this->idCentroFormacion;
    }

    public function getIdGenero() {
        return $this->idGenero;
    }

    public function getIdTipoDocumento() {
        return $this->idTipoDocumento;
    }

    public function getEstadoFuncionario() {
        return $this->estadoFuncionario;
    }

    public function getDireccionFuncionario() {
        return $this->direccionFuncionario;
    }

    public function getTelefonoFuncionario() {
        return $this->telefonoFuncionario;
    }

    public function getMovilFuncionario() {
        return $this->movilFuncionario;
    }

    public function getCorreoFuncionario() {
        return $this->correoFuncionario;
    }

    public function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    public function setIdentificacionFuncionario($IdentificacionFuncionario) {
        $this->IdentificacionFuncionario = $IdentificacionFuncionario;
    }

    public function setNombresFuncionario($nombresFuncionario) {
        $this->nombresFuncionario = $nombresFuncionario;
    }

    public function setApellidosFuncionario($apellidosFuncionario) {
        $this->apellidosFuncionario = $apellidosFuncionario;
    }

    public function setFechaNacimientoFuncionario($fechaNacimientoFuncionario) {
        $this->fechaNacimientoFuncionario = $fechaNacimientoFuncionario;
    }

    public function setIdCentroFormacion($idCentroFormacion) {
        $this->idCentroFormacion = $idCentroFormacion;
    }

    public function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    public function setIdTipoDocumento($idTipoDocumento) {
        $this->idTipoDocumento = $idTipoDocumento;
    }

    public function setEstadoFuncionario($estadoFuncionario) {
        $this->estadoFuncionario = $estadoFuncionario;
    }

    public function setDireccionFuncionario($direccionFuncionario) {
        $this->direccionFuncionario = $direccionFuncionario;
    }

    public function setTelefonoFuncionario($telefonoFuncionario) {
        $this->telefonoFuncionario = $telefonoFuncionario;
    }

    public function setMovilFuncionario($movilFuncionario) {
        $this->movilFuncionario = $movilFuncionario;
    }

    public function setCorreoFuncionario($correoFuncionario) {
        $this->correoFuncionario = $correoFuncionario;
    }

}
