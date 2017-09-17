<?php

class Beneficiarios {

    private $idBeneficiario;
    private $identificacionBeneficiario;
    private $nombresBeneficiario;
    private $apellidosBeneficiario;
    private $fechaNacimientoBeneficiario;
    private $idFuncionario;
    private $identificacionFuncionario;
    private $idTipoDocumento;
    private $idGenero;
    private $cronicoBeneficiario;
    private $direccionBeneficiario;
    private $telefonoBeneficiario;
    private $movilBeneficiario;
    private $correoBeneficiario;
    private $estadoBeneficiario;
    //Table Historias clinicas
    private $estadoHistoriaClinica;
    
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarBeneficiario() {
        $sql = "INSERT INTO beneficiarios(idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "fechaNacimientoBeneficiario, "
                . "funcionarios_idFuncionario, "
                . "tipos_documentos_idTipoDocumento, "
                . "generos_idGenero, "
                . "estadoBeneficiario, "
                . "cronicoBeneficiario, "
                . "direccionBeneficiario, "
                . "telefonoBeneficiario, "
                . "movilBeneficiario, "
                . "correoBeneficiario) "
                . "VALUES (null, "
                . "'{$this->getIdentificacionBeneficiario()}', "
                . "'{$this->getNombresBeneficiario()}', "
                . "'{$this->getApellidosBeneficiario()}', "
                . "'{$this->getFechaNacimientoBeneficiario()}', "
                . "{$this->getIdFuncionario()}, "
                . "{$this->getIdTipoDocumento()}, "
                . "{$this->getIdGenero()}, "
                . "{$this->getEstadoBeneficiario()}, "
                . "{$this->getCronicoBeneficiario()}, "
                . "'{$this->getDireccionBeneficiario()}', "
                . "'{$this->getTelefonoBeneficiario()}', "
                . "'{$this->getMovilBeneficiario()}', "
                . "'{$this->getCorreoBeneficiario()}');";
                
        return $this->conexion->consultaSimple($sql);
    }
    
    public function insertarHistoriaClinica (){
        $sql ="INSERT INTO historias_clinicas(idHistoriaClinica, 
        fechaAperturaHistoriaClinica, estadoHistoriaClinica, 
        beneficiarios_idBeneficiario) 
        VALUES (
            NULL,
            CURDATE(),
            '{$this->getEstadoHistoriaClinica()}',
            '{$this->getIdBeneficiario()}')";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarBeneficiarios() {
        $sql = "SELECT idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "b.tipos_documentos_idTipoDocumento, "
                . "t.tipoDocumento, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "b.generos_idGenero, "
                . "g.tipoGenero, "
                . "fechaNacimientoBeneficiario, "
                . "funcionarios_idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "estadoBeneficiario, "
                . "cronicoBeneficiario, "
                . "direccionBeneficiario, "
                . "telefonoBeneficiario, "
                . "movilBeneficiario, "
                . "correoBeneficiario "
                . "FROM beneficiarios b "
                . "INNER JOIN tipos_documentos t ON b.tipos_documentos_idTipoDocumento = t.idTipoDocumento "
                . "INNER JOIN generos g ON b.generos_idGenero = g.idGenero "
                . "INNER JOIN funcionarios ON funcionarios_idFuncionario = idFuncionario;";

        return $this->conexion->consulta($sql);
    }

    public function listarIdBeneficiario() {
        $sql = "SELECT idBeneficiario, 
                numeroIdentificacionBeneficiario, 
                b.tipos_documentos_idTipoDocumento, 
                t.tipoDocumento, 
                nombresBeneficiario,
                apellidosBeneficiario, 
                b.generos_idGenero, 
                g.tipoGenero, 
                fechaNacimientoBeneficiario,
                funcionarios_idFuncionario, 
                numeroIdentificacionFuncionario, 
                nombresFuncionario, 
                apellidosFuncionario, 
                estadoBeneficiario, 
                cronicoBeneficiario, 
                direccionBeneficiario, 
                telefonoBeneficiario, 
                movilBeneficiario, 
                correoBeneficiario,
                cf.nombreCentroFormacion
                FROM beneficiarios b 
                INNER JOIN tipos_documentos t ON b.tipos_documentos_idTipoDocumento = t.idTipoDocumento 
                INNER JOIN generos g ON b.generos_idGenero = g.idGenero 
                INNER JOIN funcionarios f ON b.funcionarios_idFuncionario = f.idFuncionario 
                INNER JOIN centros_formacion cf ON cf.idCentroFormacion = f.centros_formacion_idCentroFormacion
                WHERE idBeneficiario= '{$this->getIdBeneficiario()}';";
        return $this->conexion->consulta($sql);
    }
    
    public function listarIdentificacionBeneficiario (){
        $sql="SELECT * FROM beneficiarios 
        WHERE numeroIdentificacionBeneficiario = '{$this->getIdentificacionBeneficiario()}'";
        return $this->conexion->consulta($sql);
        
    }

    public function listarDocumentoBeneficiario() {
        $sql = "SELECT idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "b.tipos_documentos_idTipoDocumento, "
                . "t.tipoDocumento, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "b.generos_idGenero, "
                . "g.tipoGenero, "
                . "fechaNacimientoBeneficiario, "
                . "funcionarios_idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "estadoBeneficiario, "
                . "cronicoBeneficiario, "
                . "direccionBeneficiario, "
                . "telefonoBeneficiario, "
                . "movilBeneficiario, "
                . "correoBeneficiario "
                . "FROM beneficiarios b "
                . "INNER JOIN tipos_documentos t ON b.tipos_documentos_idTipoDocumento = t.idTipoDocumento "
                . "INNER JOIN generos g ON b.generos_idGenero = g.idGenero "
                . "INNER JOIN funcionarios ON funcionarios_idFuncionario = idFuncionario "
                . "WHERE numeroIdentificacionBeneficiario='{$this->getIdentificacionBeneficiario()}';";

        return $this->conexion->consulta($sql);
    }

    public function listarDocFuncionarioBeneficiario() {
        $sql = "SELECT idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "b.tipos_documentos_idTipoDocumento, "
                . "t.tipoDocumento, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "b.generos_idGenero, "
                . "g.tipoGenero, "
                . "fechaNacimientoBeneficiario, "
                . "funcionarios_idFuncionario, "
                . "numeroIdentificacionFuncionario, "
                . "nombresFuncionario, "
                . "apellidosFuncionario, "
                . "estadoBeneficiario, "
                . "cronicoBeneficiario, "
                . "direccionBeneficiario, "
                . "telefonoBeneficiario, "
                . "movilBeneficiario, "
                . "correoBeneficiario "
                . "FROM beneficiarios b "
                . "INNER JOIN tipos_documentos t ON b.tipos_documentos_idTipoDocumento = t.idTipoDocumento "
                . "INNER JOIN generos g ON b.generos_idGenero = g.idGenero "
                . "INNER JOIN funcionarios ON funcionarios_idFuncionario = idFuncionario "
                . "WHERE numeroIdentificacionFuncionario='{$this->getIdentificacionFuncionario()}';";

        return $this->conexion->consulta($sql);
    }

    public function editarBeneficiario() {
        $sql = "UPDATE beneficiarios "
                . "SET numeroIdentificacionBeneficiario='{$this->getIdentificacionBeneficiario()}', "
                . "nombresBeneficiario='{$this->getNombresBeneficiario()}', "
                . "apellidosBeneficiario='{$this->getApellidosBeneficiario()}', "
                . "fechaNacimientoBeneficiario='{$this->getFechaNacimientoBeneficiario()}', "
                . "funcionarios_idFuncionario={$this->getIdFuncionario()}, "
                . "tipos_documentos_idTipoDocumento={$this->getIdTipoDocumento()}, "
                . "generos_idGenero={$this->getIdGenero()}, "
                . "estadoBeneficiario={$this->getEstadoBeneficiario()}, "
                . "cronicoBeneficiario={$this->getCronicoBeneficiario()}, "
                . "direccionBeneficiario='{$this->getDireccionBeneficiario()}', "
                . "telefonoBeneficiario='{$this->getTelefonoBeneficiario()}', "
                . "movilBeneficiario='{$this->getMovilBeneficiario()}', "
                . "correoBeneficiario='{$this->getCorreoBeneficiario()}' "
                . "WHERE idBeneficiario={$this->getIdBeneficiario()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarBeneficiario() {
        $sql = "DELETE FROM beneficiarios WHERE idBeneficiario={$this->getIdBeneficiario()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getEstadoHistoriaClinica() {
        return $this->estadoHistoriaClinica;
    }
    
    public function getIdBeneficiario() {
        return $this->idBeneficiario;
    }

    public function getIdentificacionBeneficiario() {
        return $this->identificacionBeneficiario;
    }

    public function getNombresBeneficiario() {
        return $this->nombresBeneficiario;
    }

    public function getApellidosBeneficiario() {
        return $this->apellidosBeneficiario;
    }

    public function getFechaNacimientoBeneficiario() {
        return $this->fechaNacimientoBeneficiario;
    }

    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function getIdTipoDocumento() {
        return $this->idTipoDocumento;
    }

    public function getIdGenero() {
        return $this->idGenero;
    }

    public function getCronicoBeneficiario() {
        return $this->cronicoBeneficiario;
    }

    public function getDireccionBeneficiario() {
        return $this->direccionBeneficiario;
    }

    public function getTelefonoBeneficiario() {
        return $this->telefonoBeneficiario;
    }

    public function getMovilBeneficiario() {
        return $this->movilBeneficiario;
    }

    public function getCorreoBeneficiario() {
        return $this->correoBeneficiario;
    }

    public function getEstadoBeneficiario() {
        return $this->estadoBeneficiario;
    }
    
    public function setEstadoHistoriaClinica ($estadoHistoriaClinica){
        $this->estadoHistoriaClinica = $estadoHistoriaClinica;
    }

    public function setIdBeneficiario($idBeneficiario) {
        $this->idBeneficiario = $idBeneficiario;
    }

    public function setIdentificacionBeneficiario($identificacionBeneficiario) {
        $this->identificacionBeneficiario = $identificacionBeneficiario;
    }

    public function setNombresBeneficiario($nombresBeneficiario) {
        $this->nombresBeneficiario = $nombresBeneficiario;
    }

    public function setApellidosBeneficiario($apellidosBeneficiario) {
        $this->apellidosBeneficiario = $apellidosBeneficiario;
    }

    public function setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario) {
        $this->fechaNacimientoBeneficiario = $fechaNacimientoBeneficiario;
    }

    public function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    public function setIdTipoDocumento($idTipoDocumento) {
        $this->idTipoDocumento = $idTipoDocumento;
    }

    public function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    public function setCronicoBeneficiario($cronicoBeneficiario) {
        $this->cronicoBeneficiario = $cronicoBeneficiario;
    }

    public function setDireccionBeneficiario($direccionBeneficiario) {
        $this->direccionBeneficiario = $direccionBeneficiario;
    }

    public function setTelefonoBeneficiario($telefonoBeneficiario) {
        $this->telefonoBeneficiario = $telefonoBeneficiario;
    }

    public function setMovilBeneficiario($movilBeneficiario) {
        $this->movilBeneficiario = $movilBeneficiario;
    }

    public function setCorreoBeneficiario($correoBeneficiario) {
        $this->correoBeneficiario = $correoBeneficiario;
    }

    public function setEstadoBeneficiario($estadoBeneficiario) {
        $this->estadoBeneficiario = $estadoBeneficiario;
    }

    public function getIdentificacionFuncionario() {
        return $this->identificacionFuncionario;
    }

    public function setIdentificacionFuncionario($identificacionFuncionario) {
        $this->identificacionFuncionario = $identificacionFuncionario;
    }

}
