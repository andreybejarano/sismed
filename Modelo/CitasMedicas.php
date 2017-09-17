<?php

class CitasMedicas {

    private $idCitaMedica;
    private $fechaHoraRegistro;
    private $fechaCitaMedica;
    private $horaCitaMedica;
    private $duracionCitaMedica;
    private $comentariosCitaMedica;
    private $estadoCitaMedica;
    private $idBeneficarios;
    private $idAgendaMedica;
    private $conexion;
    //Table beneficiarios
    private $identificacionBeneficiario;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarCitaMedica() {
        $sql = "INSERT INTO citas_medicas("
                . "idCitaMedica,"
                . "fechaHoraRegistroCitaMedica,"
                . "duracionCitaMedica, "
                . "comentariosCitaMedica, "
                . "estadoCitaMedica, "
                . "beneficiarios_idBeneficiario, "
                . "agendas_medicas_idAgendasMedica) "
                . "VALUES("
                . "NULL ,"
                . "CURRENT_TIMESTAMP ,"
                . "'00:20:00', "
                . "'{$this->getComentariosCitaMedica()}', "
                . "1, "
                . "'{$this->getIdBeneficarios()}', "
                . "'{$this->getIdAgendaMedica()}')";
                
        return $this->conexion->consultaSimple($sql);
    }
    
    public function listarIdCitaMedica(){
        $sql ="SELECT idCitaMedica, 
           fechaHoraRegistroCitaMedica, 
           am.fechaAgendaMedica, 
           hs.hora, 
           duracionCitaMedica,
           comentariosCitaMedica, 
           estadoCitaMedica, 
           b.idBeneficiario,
           numeroIdentificacionBeneficiario,
           nombresBeneficiario, 
           apellidosBeneficiario, 
           ct.agendas_medicas_idAgendasMedica,
           nombresEmpleado, 
           apellidosEmpleado,
			c.numeroConsultorio
        FROM citas_medicas ct
        INNER JOIN beneficiarios b ON b.idBeneficiario = ct.beneficiarios_idBeneficiario
        INNER JOIN agendas_medicas am ON am.idAgendaMedica = ct.agendas_medicas_idAgendasMedica
		INNER JOIN consultorios c ON c.idConsultorio = am.consultorios_idConsultorio
        INNER JOIN empleados e ON e.idEmpleado = am.empleados_idEmpleado
        INNER JOIN hora_20 hs ON hs.idhora_20 = am.hora_20_idhora_20
        WHERE ct.idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consulta($sql);
    }

    public function listarCitasMedicas() {
       $sql ="SELECT idCitaMedica, 
           fechaHoraRegistroCitaMedica, 
           am.fechaAgendaMedica, 
           hs.hora, 
           duracionCitaMedica,
           comentariosCitaMedica, 
           estadoCitaMedica, 
           b.idBeneficiario,
           numeroIdentificacionBeneficiario,
           nombresBeneficiario, 
           apellidosBeneficiario, 
           ct.agendas_medicas_idAgendasMedica,
           nombresEmpleado, 
           apellidosEmpleado,
			c.numeroConsultorio
        FROM citas_medicas ct
        INNER JOIN beneficiarios b ON b.idBeneficiario = ct.beneficiarios_idBeneficiario
        INNER JOIN agendas_medicas am ON am.idAgendaMedica = ct.agendas_medicas_idAgendasMedica
		INNER JOIN consultorios c ON c.idConsultorio = am.consultorios_idConsultorio
        INNER JOIN empleados e ON e.idEmpleado = am.empleados_idEmpleado
        INNER JOIN hora_20 hs ON hs.idhora_20 = am.hora_20_idhora_20
        WHERE estadoCitaMedica != 4";
               
        return $this->conexion->consulta($sql);
    }

    public function listarCitasMedicasAtentidas() {
       $sql ="SELECT idCitaMedica, 
           fechaHoraRegistroCitaMedica, 
           am.fechaAgendaMedica, 
           hs.hora, 
           duracionCitaMedica,
           comentariosCitaMedica, 
           estadoCitaMedica, 
           b.idBeneficiario,
           numeroIdentificacionBeneficiario,
           nombresBeneficiario, 
           apellidosBeneficiario, 
           ct.agendas_medicas_idAgendasMedica,
           nombresEmpleado, 
           apellidosEmpleado,
			c.numeroConsultorio
        FROM citas_medicas ct
        INNER JOIN beneficiarios b ON b.idBeneficiario = ct.beneficiarios_idBeneficiario
        INNER JOIN agendas_medicas am ON am.idAgendaMedica = ct.agendas_medicas_idAgendasMedica
		INNER JOIN consultorios c ON c.idConsultorio = am.consultorios_idConsultorio
        INNER JOIN empleados e ON e.idEmpleado = am.empleados_idEmpleado
        INNER JOIN hora_20 hs ON hs.idhora_20 = am.hora_20_idhora_20
        WHERE estadoCitaMedica = 4";
        return $this->conexion->consulta($sql);
    }    
    
     public function listarCitasMedicasHoy() {
       $sql ="SELECT idCitaMedica, 
           fechaHoraRegistroCitaMedica, 
           am.fechaAgendaMedica, 
           hs.hora, 
           duracionCitaMedica,
           comentariosCitaMedica, 
           estadoCitaMedica, 
           b.idBeneficiario,
           numeroIdentificacionBeneficiario,
           nombresBeneficiario, 
           apellidosBeneficiario, 
           ct.agendas_medicas_idAgendasMedica,
           nombresEmpleado, 
           apellidosEmpleado,
			c.numeroConsultorio
        FROM citas_medicas ct
        INNER JOIN beneficiarios b ON b.idBeneficiario = ct.beneficiarios_idBeneficiario
        INNER JOIN agendas_medicas am ON am.idAgendaMedica = ct.agendas_medicas_idAgendasMedica
		INNER JOIN consultorios c ON c.idConsultorio = am.consultorios_idConsultorio
        INNER JOIN empleados e ON e.idEmpleado = am.empleados_idEmpleado
        INNER JOIN hora_20 hs ON hs.idhora_20 = am.hora_20_idhora_20
        WHERE am.fechaAgendaMedica = CURDATE()";
        return $this->conexion->consulta($sql);
    }    
    
     public function listarCitasMedicasBeneficiario() {
       $sql ="SELECT idCitaMedica, 
           fechaHoraRegistroCitaMedica, 
           am.fechaAgendaMedica, 
           hs.hora, 
           duracionCitaMedica,
           comentariosCitaMedica, 
           estadoCitaMedica, 
           b.idBeneficiario,
           numeroIdentificacionBeneficiario,
           nombresBeneficiario, 
           apellidosBeneficiario, 
           ct.agendas_medicas_idAgendasMedica,
           nombresEmpleado, 
           apellidosEmpleado,
			c.numeroConsultorio
        FROM citas_medicas ct
        INNER JOIN beneficiarios b ON b.idBeneficiario = ct.beneficiarios_idBeneficiario
        INNER JOIN agendas_medicas am ON am.idAgendaMedica = ct.agendas_medicas_idAgendasMedica
		INNER JOIN consultorios c ON c.idConsultorio = am.consultorios_idConsultorio
        INNER JOIN empleados e ON e.idEmpleado = am.empleados_idEmpleado
        INNER JOIN hora_20 hs ON hs.idhora_20 = am.hora_20_idhora_20
        WHERE b.numeroIdentificacionBeneficiario = '{$this->getIdentificacionBeneficiario()}'
        OR am.fechaAgendaMedica = '{$this->getFechaCitaMedica()}'";
        return $this->conexion->consulta($sql);
    }

    public function editarCitaMedica() {
        $sql = "UPDATE citas_medicas SET 
            comentariosCitaMedica='{$this->getComentariosCitaMedica()}',
            estadoCitaMedica='{$this->getEstadoCitaMedica()}',
            agendas_medicas_idAgendasMedica='{$this->getIdAgendaMedica()}' 
            WHERE idCitaMedica='{$this->getIdCitaMedica()}'";
        return $this->conexion->consultaSimple($sql);
    }
    
    public function estadoCitaMedica (){
        $sql="UPDATE citas_medicas 
        SET estadoCitaMedica = '{$this->getEstadoCitaMedica()}'
        WHERE idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consultaSimple($sql);
    }


    public function eliminarCitaMedica() {
        $sql = "DELETE FROM citas_medicas WHERE idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consultaSimple($sql);
    }

    function getIdentificacionBeneficiario(){
        return $this->identificacionBeneficiario;
    }

    function getIdCitaMedica() {
        return $this->idCitaMedica;
    }

    function getFechaHoraRegistro() {
        return $this->fechaHoraRegistro;
    }

    function getFechaCitaMedica() {
        return $this->fechaCitaMedica;
    }

    function getHoraCitaMedica() {
        return $this->horaCitaMedica;
    }

    function getDuracionCitaMedica() {
        return $this->duracionCitaMedica;
    }

    function getComentariosCitaMedica() {
        return $this->comentariosCitaMedica;
    }

    function getEstadoCitaMedica() {
        return $this->estadoCitaMedica;
    }

    function getIdBeneficarios() {
        return $this->idBeneficarios;
    }

    function getIdConsultorio() {
        return $this->idConsultorio;
    }

    function getIdAgendaMedica() {
        return $this->idAgendaMedica;
    }
    
    function setIdentificacionBeneficiario($identificacionBeneficiario) {
        $this->identificacionBeneficiario = $identificacionBeneficiario;
    }

    function setIdCitaMedica($idCitaMedica) {
        $this->idCitaMedica = $idCitaMedica;
    }

    function setFechaHoraRegistro($fechaHoraRegistro) {
        $this->fechaHoraRegistro = $fechaHoraRegistro;
    }

    function setFechaCitaMedica($fechaCitaMedica) {
        $this->fechaCitaMedica = $fechaCitaMedica;
    }

    function setHoraCitaMedica($horaCitaMedica) {
        $this->horaCitaMedica = $horaCitaMedica;
    }

    function setDuracionCitaMedica($duracionCitaMedica) {
        $this->duracionCitaMedica = $duracionCitaMedica;
    }

    function setComentariosCitaMedica($comentariosCitaMedica) {
        $this->comentariosCitaMedica = $comentariosCitaMedica;
    }

    function setEstadoCitaMedica($estadoCitaMedica) {
        $this->estadoCitaMedica = $estadoCitaMedica;
    }

    function setIdBeneficarios($idBeneficarios) {
        $this->idBeneficarios = $idBeneficarios;
    }

    function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }

    function setIdAgendaMedica($idAgendaMedica) {
        $this->idAgendaMedica = $idAgendaMedica;
    }

}
