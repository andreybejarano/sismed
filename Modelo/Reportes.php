
<?php
    
class Reportes {
    
    private $fechaInicioConsulta; //para el reporte de consultas 
    private $fechaFinConsulta; // para el reporte de consultas
    private $numeroIdentificacionEmpleado ; // para el reporte de consultaDoctor
    private $numeroIdentificacionFuncionario ; // para el reporte de funcionarios
    private $numeroIdentificacionBeneficiario ; // para el reporte de medicamentos
    private $idCentroMedico; //para el reporte de medicamentos y funcionarios
    private $idCentroFormacion;
    private $conexion;

    
    public function __construct() {
        $this->conexion = new Conexiones();
    }
    
    
    public function consultasFechas(){
        //listar las consultas atendidas en un rango de fecha especifico
        $sql = "SELECT idCitaMedica, 
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
        WHERE estadoCitaMedica != 4 and am.fechaAgendaMedica 
        BETWEEN '{$this->getFechaInicioConsulta()}' and '{$this->getFechaFinConsulta()}' ";
        return $this->conexion->consulta($sql);
    }
    
    
    public function consultaDoctor(){
        //listar las consultas atendidas por un doctor determinado
        $sql="
        SELECT idCitaMedica, 
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
        WHERE estadoCitaMedica != 4 and am.fechaAgendaMedica 
        BETWEEN '{$this->getFechaInicioConsulta()}' and '{$this->getFechaFinConsulta()}' 
        and e.numeroIdentificacionEmpleado = '{$this->getNumeroIdentificacionEmpleado()}'";
        return $this->conexion->consulta($sql);
    }
    
    
    public function consultaFuncionario(){
        //listar todos los funcionarios de un centro medico determinado
         $sql = "SELECT idFuncionario, 
                numeroIdentificacionFuncionario, 
                tipos_documentos_idTipoDocumento, 
                tipoDocumento, 
                nombresFuncionario, 
                apellidosFuncionario, 
                generos_idGenero, 
                tipoGenero, 
                fechaNacimientoFuncionario, 
                centros_formacion_idCentroFormacion,
                nombreCentroFormacion, 
                regionales_idRegional, 
                nombreRegional, 
                estadoFuncionario, 
                direccionFuncionario, 
                telefonoFuncionario, 
                movilFuncionario, 
                correoFuncionario 
                FROM funcionarios 
                INNER JOIN tipos_documentos ON tipos_documentos_idTipoDocumento = idTipoDocumento 
                INNER JOIN generos ON generos_idGenero = idGenero 
                INNER JOIN centros_formacion ON centros_formacion_idCentroFormacion = idCentroFormacion 
                INNER JOIN regionales ON regionales_idRegional = idRegional 
				WHERE centros_formacion_idCentroFormacion = {$this->getIdCentroFormacion()}";
        return $this->conexion->consulta($sql);
    }


    public function consultaBeneficiario(){
        //listar las consultas de un beneficiario determinado
        $sql = "SELECT idCitaMedica, 
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
        WHERE estadoCitaMedica != 4 and 
        b.numeroIdentificacionBeneficiario = '{$this->getNumeroIdentificacionBeneficiario()}' ";
        
        return $this->conexion->consulta($sql);
    }    
    
    
    public function consultaMedicamentos(){
        //listar todos los medicamentos de un centro medico determinado
        $sql = "SELECT idMedicamento, 
        codigoMedicamento, 
        nombreGenericoMedicamento, 
        descripcionMedicamento, 
        formaFarmaceuticaMedicamento, 
        concentracionMedicamento, 
        dosisMedicamento, 
        viaFrecuenciaAdministracionMedicamento,
        registroInvimaMedicamento 
        FROM medicamentos 
        WHERE centros_medicos_idCentroMedico = '{$this->getIdCentroMedico()}';";

        return $this->conexion->consulta($sql);
    }
    
    
    public function consultaRemisiones(){
        // consutar las remisiones por fecha
        $sql="select idOrden, fechaHoraOrden, cantidadOrden, observacionOrden,
        tp.descripcionTipoOrden, b.numeroIdentificacionBeneficiario, 
        b.nombresBeneficiario,b.apellidosBeneficiario from ordenes o
        inner join tipos_ordenes tp ON tp.idTipoOrden = o.tipos_ordenes_idTipoOrden
        inner join episodios e ON e.idEpisodio = o.episodios_idEpisodio
        inner join citas_medicas cm ON cm.idCitaMedica = e.citas_medicas_idCitaMedica
        inner join beneficiarios b ON b.idBeneficiario = cm.beneficiarios_idBeneficiario
        WHERE fechaHoraOrden BETWEEN '{$this->getFechaInicioConsulta()}' and '{$this->getFechaFinConsulta()}'";
        return $this->conexion->consulta($sql);
    }
    
    
    function getFechaInicioConsulta() {
        return $this->fechaInicioConsulta;
    }

    function getFechaFinConsulta() {
        return $this->fechaFinConsulta;
    }

    function getNumeroIdentificacionEmpleado() {
        return $this->numeroIdentificacionEmpleado;
    }

    function getNumeroIdentificacionFuncionario() {
        return $this->numeroIdentificacionFuncionario;
    }

    function getNumeroIdentificacionBeneficiario() {
        return $this->numeroIdentificacionBeneficiario;
    }

    function getIdCentroMedico() {
        return $this->idCentroMedico;
    }
    
    function getIdCentroFormacion(){
        return $this->idCentroFormacion;
    }    

    function setFechaInicioConsulta($fechaInicioConsulta) {
        $this->fechaInicioConsulta = $fechaInicioConsulta;
    }

    function setFechaFinConsulta($fechaFinConsulta) {
        $this->fechaFinConsulta = $fechaFinConsulta;
    }

    function setNumeroIdentificacionEmpleado($numeroIdentificacionEmpleado) {
        $this->numeroIdentificacionEmpleado = $numeroIdentificacionEmpleado;
    }

    function setNumeroIdentificacionFuncionario($numeroIdentificacionFuncionario) {
        $this->numeroIdentificacionFuncionario = $numeroIdentificacionFuncionario;
    }

    function setNumeroIdentificacionBeneficiario($numeroIdentificacionBeneficiario) {
        $this->numeroIdentificacionBeneficiario = $numeroIdentificacionBeneficiario;
    }

    function setIdCentroMedico($idCentroMedico) {
        $this->idCentroMedico = $idCentroMedico;
    }
    
    function setIdCentroFormacion($idCentroFormacion){
        $this->idCentroFormacion = $idCentroFormacion;
    }
}
