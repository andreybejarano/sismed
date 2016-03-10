<?php

class CitasMedicas {

    private $idCitaMedica;
    private $fechaHoraRegistroCitaMedica;
    private $fechaCitaMedica;
    private $horaCitaMedica;
    private $duracionCitaMedica;
    private $comentariosCitaMedica;
    private $estadoCitaMedica;
    private $idBeneficiario;
    private $idConsultorio;
    private $idAgendasMedica;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarCitaMedica() {
        $sql = "INSERT INTO citas_medicas(idCitaMedica, "
                . "fechaHoraRegistroCitaMedica, "
                . "fechaCitaMedica, "
                . "horaCitaMedica, "
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "consultorios_idConsultorio, "
                . "agendas_medicas_idAgendasMedica) "
                . "VALUES (null, "
                . "'{$this->getFechaHoraRegistroCitaMedica()}', "
                . "'{$this->getFechaCitaMedica()}', "
                . "'{$this->getHoraCitaMedica()}', "
                . "'{$this->getDuracionCitaMedica()}', "
                . "'{$this->getComentariosCitaMedica()}', "
                . "{$this->getEstadoCitaMedica()}, "
                . "{$this->getIdBeneficiario()}, "
                . "{$this->getIdConsultorio()}, "
                . "{$this->getIdAgendasMedica()});";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarCitaMedica() {
        $sql = "SELECT idCitaMedica, "
                . "fechaHoraRegistroCitaMedica, "
                . "fechaCitaMedica, "
                . "horaCitaMedica, "
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "consultorios_idConsultorio, "
                . "agendas_medicas_idAgendasMedica "
                . "FROM citas_medicas "
                . "INNER JOIN beneficiarios ON beneficiarios_idBeneficiario = idBeneficiario;";

        return $this->conexion->consulta($sql);
    }

    public function listarCitaMedicaDocBeneficiaro() {
        $sql = "SELECT idCitaMedica, "
                . "fechaHoraRegistroCitaMedica, "
                . "fechaCitaMedica, "
                . "horaCitaMedica, "
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "consultorios_idConsultorio, "
                . "agendas_medicas_idAgendasMedica "
                . "FROM citas_medicas "
                . "INNER JOIN beneficiarios ON beneficiarios_idBeneficiario = idBeneficiario "
                . "WHERE numeroIdentificacionBeneficiario='{$this->getIdBeneficiario()}';";

        return $this->conexion->consulta($sql);
    }

    public function listarIdCitaMedica() {
        $sql = "SELECT idCitaMedica, "
                . "fechaHoraRegistroCitaMedica, "
                . "fechaCitaMedica, "
                . "horaCitaMedica, "
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "consultorios_idConsultorio, "
                . "agendas_medicas_idAgendasMedica "
                . "FROM citas_medicas "
                . "INNER JOIN beneficiarios ON beneficiarios_idBeneficiario = idBeneficiario "
                . "WHERE idCitaMedica={$this->getIdCitaMedica()};";

        return $this->conexion->consulta($sql);
    }

    public function listarCitaMedicaFecha() {
        $sql = "SELECT idCitaMedica, "
                . "fechaHoraRegistroCitaMedica, "
                . "fechaCitaMedica, "
                . "horaCitaMedica, "
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "numeroIdentificacionBeneficiario, "
                . "nombresBeneficiario, "
                . "apellidosBeneficiario, "
                . "consultorios_idConsultorio, "
                . "agendas_medicas_idAgendasMedica "
                . "FROM citas_medicas "
                . "INNER JOIN beneficiarios ON beneficiarios_idBeneficiario = idBeneficiario "
                . "WHERE fechaCitaMedica='{$this->getFechaCitaMedica()}';";

        return $this->conexion->consulta($sql);
    }

    public function editarCitaMedica() {
        $sql = "UPDATE citas_medicas SET fechaHoraRegistroCitaMedica='{$this->getFechaHoraRegistroCitaMedica()}', "
                . "fechaCitaMedica='{$this->getFechaCitaMedica()}', "
                . "horaCitaMedica='{$this->getHoraCitaMedica()}', "
                . "duracionCitaMedica='{$this->getDuracionCitaMedica()}', "
                . "comentariosCitaMedica='{$this->getComentariosCitaMedica()}', "
                . "estadoCitaMedica={$this->getEstadoCitaMedica()}, "
                . "beneficiarios_idBeneficiario={$this->getIdBeneficiario()}, "
                . "consultorios_idConsultorio={$this->getIdConsultorio()}, "
                . "agendas_medicas_idAgendasMedica={$this->getIdAgendasMedica()} "
                . "WHERE idCitaMedica={$this->getIdCitaMedica()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarCitaMedica() {
        $sql = "UPDATE SET estadoCitaMedica=0 WHERE idCitaMedica={$this->getIdCitaMedica()};";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdCitaMedica() {
        return $this->idCitaMedica;
    }

    public function getFechaHoraRegistroCitaMedica() {
        return $this->fechaHoraRegistroCitaMedica;
    }

    public function getFechaCitaMedica() {
        return $this->fechaCitaMedica;
    }

    public function getHoraCitaMedica() {
        return $this->horaCitaMedica;
    }

    public function getDuracionCitaMedica() {
        return $this->duracionCitaMedica;
    }

    public function getComentariosCitaMedica() {
        return $this->comentariosCitaMedica;
    }

    public function getEstadoCitaMedica() {
        return $this->estadoCitaMedica;
    }

    public function getIdBeneficiario() {
        return $this->idBeneficiario;
    }

    public function getIdConsultorio() {
        return $this->idConsultorio;
    }

    public function getIdAgendasMedica() {
        return $this->idAgendasMedica;
    }

    public function setIdCitaMedica($idCitaMedica) {
        $this->idCitaMedica = $idCitaMedica;
    }

    public function setFechaHoraRegistroCitaMedica($fechaHoraRegistroCitaMedica) {
        $this->fechaHoraRegistroCitaMedica = $fechaHoraRegistroCitaMedica;
    }

    public function setFechaCitaMedica($fechaCitaMedica) {
        $this->fechaCitaMedica = $fechaCitaMedica;
    }

    public function setHoraCitaMedica($horaCitaMedica) {
        $this->horaCitaMedica = $horaCitaMedica;
    }

    public function setDuracionCitaMedica($duracionCitaMedica) {
        $this->duracionCitaMedica = $duracionCitaMedica;
    }

    public function setComentariosCitaMedica($comentariosCitaMedica) {
        $this->comentariosCitaMedica = $comentariosCitaMedica;
    }

    public function setEstadoCitaMedica($estadoCitaMedica) {
        $this->estadoCitaMedica = $estadoCitaMedica;
    }

    public function setIdBeneficiario($idBeneficiario) {
        $this->idBeneficiario = $idBeneficiario;
    }

    public function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }

    public function setIdAgendasMedica($idAgendasMedica) {
        $this->idAgendasMedica = $idAgendasMedica;
    }

}
