<?php

class AgendasMedicas {

    private $idAgendaMedica;
    private $fechaAgendaMedica;
    private $diponibilidadAgendaMedica;
    private $idEmpleado;
    private $numeroIdentificacionEmpleado;
    private $nombresEmpleado;
    private $apellidosEmpleado;
    private $idHora;
    private $hora;
    private $idConsultorio;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarAgendaMedica() {
        $sql = "INSERT INTO agendas_medicas(idAgendaMedica, "
                . "fechaAgendaMedica, "
                . "disponibilidadAgendaMedica, "
                . "empleados_idEmpleado, "
                . "hora_20_idhora_20,consultorios_idConsultorio) "
                . "VALUES (null, "
                . "'{$this->getFechaAgendaMedica()}', "
                . "{$this->getDiponibilidadAgendaMedica()}, "
                . "{$this->getIdEmpleado()}, "
                . "{$this->getIdHora()},'{$this->getIdConsultorio()}') ";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarAgendasMedicas() {
        $sql = "SELECT idAgendaMedica, 
                fechaAgendaMedica, 
                disponibilidadAgendaMedica, 
                empleados_idEmpleado, 
                numeroIdentificacionEmpleado, 
                nombresEmpleado, 
                apellidosEmpleado, numeroConsultorio 
                FROM agendas_medicas 
                INNER JOIN empleados ON empleados_idEmpleado = idEmpleado 
                INNER JOIN hora_20 ON hora_20_idhora_20 = idhora_20
                INNER JOIN consultorios c ON c.idConsultorio = consultorios_idConsultorio
                WHERE fechaAgendaMedica = CURDATE()
                GROUP BY idEmpleado";

        return $this->conexion->consulta($sql);
    }
    
    public function listarAgendaEmpleado() {
        $sql = "SELECT idAgendaMedica, "
                . "fechaAgendaMedica, "
                . "disponibilidadAgendaMedica, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, numeroConsultorio "
                . "FROM agendas_medicas "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado "
                . "INNER JOIN hora_20 ON hora_20_idhora_20 = idhora_20 
                INNER JOIN consultorios c ON c.idConsultorio = consultorios_idConsultorio"
                . "WHERE fechaAgendaMedica = CURDATE() "
                . "AND numeroIdentificacionEmpleado = '{$this->getNumeroIdentificacionEmpleado()}' "
                . "GROUP BY idEmpleado";
        
        return $this->conexion->consulta($sql);
    }

    
    public function listarAgendaFecha() {
        $sql = "SELECT idAgendaMedica, "
                . "fechaAgendaMedica, "
                . "disponibilidadAgendaMedica, "
                . "empleados_idEmpleado, "
                . "numeroIdentificacionEmpleado, "
                . "nombresEmpleado, "
                . "apellidosEmpleado, c.numeroConsultorio "
                . "FROM agendas_medicas "
                . "INNER JOIN empleados ON empleados_idEmpleado = idEmpleado "
                . "INNER JOIN hora_20 ON hora_20_idhora_20 = idhora_20
                INNER JOIN consultorios c ON c.idConsultorio = consultorios_idConsultorio"
                . "WHERE fechaAgendaMedica = '{$this->getFechaAgendaMedica()}'"
                . "GROUP BY idEmpleado";
        
        return $this->conexion->consulta($sql);
    }
    
    public function listarAgendaDatosEmpleado (){ //Funcion para listarConsultaMedica
        $sql="select e.nombresEmpleado, e.apellidosEmpleado, e.numeroIdentificacionEmpleado, td.tipoDocumento from agendas_medicas am
        inner join empleados e ON e.idEmpleado = am.empleados_idEmpleado
        inner join tipos_documentos td ON td.idTipoDocumento = e.tipos_documentos_idTipoDocumento
        where idAgendaMedica = '{$this->getIdAgendaMedica()}';";
        return $this->conexion->consulta($sql);
    }

    public function listarHorasEmpleado() {
        $sql = "SELECT hora "
                . "FROM agendas_medicas "
                . "INNER JOIN hora_20 ON hora_20_idhora_20 = idhora_20 "
                . "INNER JOIN empleados ON empleados_idEmpleado=idEmpleado "
                . "WHERE idEmpleado={$this->getIdEmpleado()} "
                . "AND fechaAgendaMedica = CURDATE()";
        return $this->conexion->consulta($sql);
    }
    
    public function listarFechasDisponibles() {
        $sql = "SELECT idAgendaMedica, "
                . "fechaAgendaMedica "
                . "FROM agendas_medicas "
                . "WHERE empleados_idEmpleado={$this->getIdEmpleado()} "
                . "AND disponibilidadAgendaMedica=1";
        return $this->conexion->consulta($sql);
    }
    
    public function listarHorasDisponibles() {
        $sql = "SELECT idAgendaMedica, hora "
                . "FROM agendas_medicas "
                . "INNER JOIN hora_20 ON hora_20_idhora_20 = idhora_20 "
                . "INNER JOIN empleados ON empleados_idEmpleado=idEmpleado "
                . "WHERE idEmpleado={$this->getIdEmpleado()} "
                . "AND fechaAgendaMedica='{$this->getFechaAgendaMedica()}' "
                . "AND disponibilidadAgendaMedica=1";
        return $this->conexion->consulta($sql);
    }
    
    public function eliminarAgendaMedica() {
        $sql = "DELETE FROM agendas_medicas "
                . "WHERE fechaAgendaMedica='{$this->getFechaAgendaMedica()}' "
                . "AND empleados_idEmpleado={$this->getIdEmpleado()};";
        return $this->conexion->consultaSimple($sql);
    }

    public function editarDisponibilidad (){
        $sql="UPDATE agendas_medicas 
        SET disponibilidadAgendaMedica = {$this->getDiponibilidadAgendaMedica()} 
        WHERE idAgendaMedica = {$this->getIdAgendaMedica()}";
        
        return $this->conexion->consultaSimple($sql);
        
    }

    public function getIdAgendaMedica() {
        return $this->idAgendaMedica;
    }

    public function getFechaAgendaMedica() {
        return $this->fechaAgendaMedica;
    }

    public function getDiponibilidadAgendaMedica() {
        return $this->diponibilidadAgendaMedica;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getNumeroIdentificacionEmpleado() {
        return $this->numeroIdentificacionEmpleado;
    }

    public function getNombresEmpleado() {
        return $this->nombresEmpleado;
    }

    public function getApellidosEmpleado() {
        return $this->apellidosEmpleado;
    }

    public function getIdHora() {
        return $this->idHora;
    }

    public function getHora() {
        return $this->hora;
    }
    
    public function getIdConsultorio() {
        return $this->idConsultorio;
    }

    public function setIdAgendaMedica($idAgendaMedica) {
        $this->idAgendaMedica = $idAgendaMedica;
    }

    public function setFechaAgendaMedica($fechaAgendaMedica) {
        $this->fechaAgendaMedica = $fechaAgendaMedica;
    }

    public function setDiponibilidadAgendaMedica($diponibilidadAgendaMedica) {
        $this->diponibilidadAgendaMedica = $diponibilidadAgendaMedica;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setNumeroIdentificacionEmpleado($numeroIdentificacionEmpleado) {
        $this->numeroIdentificacionEmpleado = $numeroIdentificacionEmpleado;
    }

    public function setNombresEmpleado($nombresEmpleado) {
        $this->nombresEmpleado = $nombresEmpleado;
    }

    public function setApellidosEmpleado($apellidosEmpleado) {
        $this->apellidosEmpleado = $apellidosEmpleado;
    }

    public function setIdHora($idHora) {
        $this->idHora = $idHora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }
}