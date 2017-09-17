<?php

class Consultas {

    private $conexion;
    private $idCitaMedica;
    //Tabla episodios
    private $idEpisodio;
    private $fechaHoraAtencion;
    private $pesoEpisodio;
    private $temperaturaEpisodio;
    private $presionArterialEpisodio;
    private $anamnesisEpisodio;
    private $exploracionEpisodio;
    #--idCitaMedica
    #--idHistoriaClinica;
    //Tabla diagnosticos
    private $idDiagnostico;
    private $descripcionDiagnostico;
    private $idEnfermedad;
    #--idFormulaMedica
    #--idEpisodio
    //Tabla ordenes
    private $idOrden;
    private $fechaHoraOrden;
    private $cantidadOrden;
    private $observacionesOrden;
    private $idTipoOrden;
    #--idEpisodio
    #--idDiagnostico
    private $idCup;
    //Tabla formulas_medicas
    private $idFormulaMedica;
    private $observacionesFormulaMedica;
    private $posologiaFormulaMedica;
    //Tabla medicamentos_formulas
    private $idMedicamentoFormula;
    #--idFormulaMedica
    #--idMedicamento
    private $cantidadMedicamento;
    private $dosificacionMedicamento;
    //Tabla historias clinicas
    private $idHistoriaClinica;
    private $fechaAperturaHistoria;
    private $estadoHistoria;
    private $idBeneficiario;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    //--------------------------------------------------------------------------
    //EPISODIOS
    //--------------------------------------------------------------------------

    public function insertarEpisodio() {
        $sql = "INSERT INTO episodios(idEpisodio, "
                . "fechaHoraAtencionEpisodio, "
                . "pesoEpisodio, "
                . "temperaturaEpisodio, "
                . "presionArterialEpisodio, "
                . "anamnesisEpisodio, "
                . "exploracionEpisodio, "
                . "citas_medicas_idCitaMedica, "
                . "historias_clinicas_idHistoriaClinica) "
                . "VALUES (null, "
                . "'{$this->getFechaHoraAtencion()}', "
                . "'{$this->getPesoEpisodio()}', "
                . "'{$this->getTemperaturaEpisodio()}', "
                . "'{$this->getPresionArterialEpisodio()}', "
                . "'{$this->getAnamnesisEpisodio()}', "
                . "'{$this->getExploracionEpisodio()}', "
                . "'{$this->getIdCitaMedica()}', "
                . "'{$this->getIdHistoriaClinica()}')";
                
        return $this->conexion->consultaSimple($sql);
    }
    
    public function listarEpisodio() {
        $sql = "SELECT idEpisodio, fechaHoraAtencionEpisodio, pesoEpisodio, 
        temperaturaEpisodio, presionArterialEpisodio, anamnesisEpisodio, 
        exploracionEpisodio, citas_medicas_idCitaMedica, 
        historias_clinicas_idHistoriaClinica FROM episodios 
        WHERE citas_medicas_idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consulta($sql);
    }

    public function editarEpisodio() {
        $sql = "UPDATE episodios SET 
        fechaHoraAtencionEpisodio= '{$this->getFechaHoraAtencion()}',
        pesoEpisodio= '{$this->getPesoEpisodio()}',
        temperaturaEpisodio= '{$this->getTemperaturaEpisodio()}',
        presionArterialEpisodio= '{$this->getPresionArterialEpisodio()}',
        anamnesisEpisodio= '{$this->getAnamnesisEpisodio()}',
        exploracionEpisodio= '{$this->getExploracionEpisodio()}',
        citas_medicas_idCitaMedica= '{$this->getIdCitaMedica()}',
        historias_clinicas_idHistoriaClinica= '{$this->getIdHistoriaClinica()}'
        WHERE citas_medicas_idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarEpisodio() {
        $sql = "DELETE FROM episodios 
        WHERE citas_medicas_idCitaMedica = '{$this->getIdCitaMedica()}'";
        return $this->conexion->consultaSimple($sql);
    }

    //--------------------------------------------------------------------------
    //DIAGNOSTICOS
    //--------------------------------------------------------------------------

    public function insertarDiagnostico() {
        $sql = "INSERT INTO diagnosticos(idDiagnostico, descripcionDiagnostico, 
        enfermedades_idEnfermedad, episodios_idEpisodio) VALUES (null, 
        '{$this->getDescripcionDiagnostico()}', 
        {$this->getIdEnfermedad()}, 
        {$this->getIdEpisodio()})";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarDiagnostico() {
        $sql = "SELECT idDiagnostico, descripcionDiagnostico, 
        enfermedades_idEnfermedad, episodios_idEpisodio, nombreEnfermedad 
        FROM diagnosticos d
        INNER JOIN enfermedades e ON e.idEnfermedad = d.enfermedades_idEnfermedad
        WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consulta($sql);
    }

    public function editarDiagnostico() {
        $sql = "UPDATE diagnosticos SET
        descripcionDiagnostico= '{$this->getDescripcionDiagnostico()}',
        enfermedades_idEnfermedad= '{$this->getIdEnfermedad()}',
        episodios_idEpisodio=  '{$this->getIdEpisodio()}'
        WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarDiagnostico() {
        $sql = "DELETE FROM diagnosticos 
        WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consultaSimple($sql);
    }

    //--------------------------------------------------------------------------
    //ORDENES
    //--------------------------------------------------------------------------

    public function insertarOrden() {
        $sql = "INSERT INTO ordenes(idOrden, "
                . "fechaHoraOrden, "
                . "cantidadOrden, "
                . "observacionOrden, "
                . "tipos_ordenes_idTipoOrden, "
                . "episodios_idEpisodio, "
                . "cups_idCup) "
                . "VALUES (null, "
                . "'{$this->getFechaHoraOrden()}', "
                . "{$this->getCantidadOrden()}, "
                . "'{$this->getObservacionesOrden()}', "
                . "{$this->getIdTipoOrden()}, "
                . "{$this->getIdEpisodio()}, "
                . "1)";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarOrdenes() {
        $sql = "SELECT idOrden, fechaHoraOrden, cantidadOrden, observacionOrden,
        tipos_ordenes_idTipoOrden, episodios_idEpisodio, cups_idCup, tipoOrden, descripcionTipoOrden
        FROM ordenes o
        INNER JOIN tipos_ordenes t ON t.idTipoOrden = o.tipos_ordenes_idTipoOrden
        WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consulta($sql);
    }

    public function editarOrden() {
        $sql = "UPDATE ordenes SET fechaHoraOrden= '{$this->getFechaHoraOrden()}',
        cantidadOrden= '{$this->getCantidadOrden()}',
        observacionOrden= '{$this->getObservacionesOrden()}',
        tipos_ordenes_idTipoOrden= '{$this->getIdTipoOrden()}'
        WHERE idOrden = '{$this->getIdOrden()}'";
        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarOrden() {
        $sql = "DELETE FROM ordenes 
        WHERE idOrden = '{$this->getIdOrden()}'";
        return $this->conexion->consultaSimple($sql);
    }

    //--------------------------------------------------------------------------
    //FORMULAS MEDICAS
    //--------------------------------------------------------------------------

    public function insertarFormulaMedica() {
        $sql = "INSERT INTO formulas_medicas(idFormulaMedica, "
                . "observacionesFormulaMedica, "
                . "episodios_idEpisodio) "
                . "VALUES (null, "
                . "'{$this->getObservacionesFormulaMedica()}', "
                . "{$this->getIdEpisodio()});";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarFormulaMedica() {
        $sql = "SELECT idFormulaMedica, "
                . "observacionesFormulaMedica, "
                . "episodios_idEpisodio "
                . "FROM formulas_medicas "
                . "WHERE  episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consulta($sql);
    }

    public function editarFormulaMedica() {
        $sql = "UPDATE formulas_medicas SET 
                observacionesFormulaMedica = '{$this->getObservaciones()}',
                posologiaFormulaMedica = '{$this->getPosologiaFormulaMedica()}',
                WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarFormulaMedica() {
        $sql = "DELETE FROM formulas_medicas 
        WHERE episodios_idEpisodio = '{$this->getIdEpisodio()}'";
        return $this->conexion->consultaSimple($sql);
    }

    //--------------------------------------------------------------------------
    //MEDICAMENTOS FORMULAS
    //--------------------------------------------------------------------------

    public function insertarMedicamentoFormula() {
        $sql = "INSERT INTO medicamentos_formulas(idMedicamentoFormula, "
                . "formulas_medicas_idFormulaMedica, "
                . "medicamentos_idMedicamento, "
                . "cantidadMedicamento, "
                . "dosificacionMedicamento) "
                . "VALUES (null, "
                . "{$this->getIdFormulaMedica()}, "
                . "{$this->getIdMedicamentoFormula()}, "
                . "'{$this->getCantidadMedicamento()}', "
                . "'{$this->getDosificacionMedicamento()}')";
        return $this->conexion->consultaSimple($sql);
    }

    public function listarMedicamentosFormula() {
        $sql = "SELECT *
        FROM medicamentos_formulas mf 
        INNER JOIN medicamentos m ON m.idMedicamento = mf.medicamentos_idMedicamento
        WHERE formulas_medicas_idFormulaMedica = '{$this->getIdFormulaMedica()}' ";
        return $this->conexion->consulta($sql);
    }

    public function editarMedicamentoFormula() {
        $sql = "UPDATE medicamentos_formulas SET 
            formulas_medicas_idFormulaMedica = '{$this->getIdFormulaMedica()}',
            medicamentos_idMedicamento = '{$this->getIdMedicamentoFormula()}',
            cantidadMedicamento = '{$this->getCantidadMedicamento()}',
            dosficacionMedicamento = '{$this->getDosificacionMedicamento()}'
            WHERE  idMedicamentoFormula = '{$this->getIdMedicamentoFormula()}'";
        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarMedicamentoFormula() {
        $sql = "DELETE FROM medicamentos_formulas 
        WHERE idMedicamentoFormula = '{$this->getIdMedicamentoFormula()}'";
        return $this->conexion->consultaSimple($sql);
    }

    //--------------------------------------------------------------------------
    //HISTORIAS CLINICAS
    //--------------------------------------------------------------------------
    public function listarHistoriaClinica() {
        $sql = "SELECT idHistoriaClinica, "
                . "fechaAperturaHistoriaClinica, "
                . "estadoHistoriaClinica, "
                . "beneficiarios_idBeneficiario "
                . "FROM historias_clinicas "
                . "WHERE beneficiarios_idBeneficiario = {$this->getIdBeneficiario()}";
        
        return $this->conexion->consulta($sql);
    }
    
    public function citaMedicaAtendida() {
        $sql = "UPDATE citas_medicas SET estadoCitaMedica=4
        WHERE idCitaMedica={$this->getIdCitaMedica()};";
        return $this->conexion->consulta($sql);
    }

    //--------------------------------------------------------------------------
    //GETTERS AND SETTERS
    //--------------------------------------------------------------------------
    function getIdCitaMedica() {
        return $this->idCitaMedica;
    }

    function getIdEpisodio() {
        return $this->idEpisodio;
    }

    function getFechaHoraAtencion() {
        return $this->fechaHoraAtencion;
    }

    function getPesoEpisodio() {
        return $this->pesoEpisodio;
    }

    function getTemperaturaEpisodio() {
        return $this->temperaturaEpisodio;
    }

    function getAnamnesisEpisodio() {
        return $this->anamnesisEpisodio;
    }

    function getExploracionEpisodio() {
        return $this->exploracionEpisodio;
    }

    function getIdHistoriaClinica() {
        return $this->idHistoriaClinica;
    }

    function getIdDiagnostico() {
        return $this->idDiagnostico;
    }

    function getDescripcionDiagnostico() {
        return $this->descripcionDiagnostico;
    }

    function getIdEnfermedad() {
        return $this->idEnfermedad;
    }

    function getIdOrden() {
        return $this->idOrden;
    }

    function getFechaHoraOrden() {
        return $this->fechaHoraOrden;
    }

    function getCantidadOrden() {
        return $this->cantidadOrden;
    }

    function getObservacionesOrden() {
        return $this->observacionesOrden;
    }

    function getIdTipoOrden() {
        return $this->idTipoOrden;
    }

    function getIdCup() {
        return $this->idCup;
    }

    function getIdFormulaMedica() {
        return $this->idFormulaMedica;
    }

    function getObservacionesFormulaMedica() {
        return $this->observacionesFormulaMedica;
    }

    function getPosologiaFormulaMedica() {
        return $this->posologiaFormulaMedica;
    }

    function getIdMedicamentoFormula() {
        return $this->idMedicamentoFormula;
    }

    function getCantidadMedicamento() {
        return $this->cantidadMedicamento;
    }

    function getDosificacionMedicamento() {
        return $this->dosificacionMedicamento;
    }

    function getPresionArterialEpisodio() {
        return $this->presionArterialEpisodio;
    }

    function getIdBeneficiario() {
        return $this->idBeneficiario;
    }

    function setIdCitaMedica($idCitaMedica) {
        $this->idCitaMedica = $idCitaMedica;
    }

    function setIdEpisodio($idEpisodio) {
        $this->idEpisodio = $idEpisodio;
    }

    function setFechaHoraAtencion($fechaHoraAtencion) {
        $this->fechaHoraAtencion = $fechaHoraAtencion;
    }

    function setPesoEpisodio($pesoEpisodio) {
        $this->pesoEpisodio = $pesoEpisodio;
    }

    function setTemperaturaEpisodio($temperaturaEpisodio) {
        $this->temperaturaEpisodio = $temperaturaEpisodio;
    }

    function setAnamnesisEpisodio($anamnesisEpisodio) {
        $this->anamnesisEpisodio = $anamnesisEpisodio;
    }

    function setExploracionEpisodio($exploracionEpisodio) {
        $this->exploracionEpisodio = $exploracionEpisodio;
    }

    function setIdHistoriaClinica($idHistoriaClinica) {
        $this->idHistoriaClinica = $idHistoriaClinica;
    }

    function setIdDiagnostico($idDiagnostico) {
        $this->idDiagnostico = $idDiagnostico;
    }

    function setDescripcionDiagnostico($descripcionDiagnostico) {
        $this->descripcionDiagnostico = $descripcionDiagnostico;
    }

    function setIdEnfermedad($idEnfermedad) {
        $this->idEnfermedad = $idEnfermedad;
    }

    function setIdOrden($idOrden) {
        $this->idOrden = $idOrden;
    }

    function setFechaHoraOrden($fechaHoraOrden) {
        $this->fechaHoraOrden = $fechaHoraOrden;
    }

    function setCantidadOrden($cantidadOrden) {
        $this->cantidadOrden = $cantidadOrden;
    }

    function setObservacionesOrden($observacionesOrden) {
        $this->observacionesOrden = $observacionesOrden;
    }

    function setIdTipoOrden($idTipoOrden) {
        $this->idTipoOrden = $idTipoOrden;
    }

    function setIdCup($idCup) {
        $this->idCup = $idCup;
    }

    function setIdFormulaMedica($idFormulaMedica) {
        $this->idFormulaMedica = $idFormulaMedica;
    }

    function setObservacionesFormulaMedica($observacionesFormulaMedica) {
        $this->observacionesFormulaMedica = $observacionesFormulaMedica;
    }

    function setPosologiaFormulaMedica($posologiaFormulaMedica) {
        $this->posologiaFormulaMedica = $posologiaFormulaMedica;
    }

    function setIdMedicamentoFormula($idMedicamentoFormula) {
        $this->idMedicamentoFormula = $idMedicamentoFormula;
    }

    function setCantidadMedicamento($cantidadMedicamento) {
        $this->cantidadMedicamento = $cantidadMedicamento;
    }

    function setDosificacionMedicamento($dosificacionMedicamento) {
        $this->dosificacionMedicamento = $dosificacionMedicamento;
    }

    function setPresionArterialEpisodio($presionArterialEpisodio) {
        $this->presionArterialEpisodio = $presionArterialEpisodio;
    }

    function setIdBeneficiario($idBeneficiario) {
        $this->idBeneficiario = $idBeneficiario;
    }
    function getFechaAperturaHistoria() {
        return $this->fechaAperturaHistoria;
    }

    function getEstadoHistoria() {
        return $this->estadoHistoria;
    }

    function setFechaAperturaHistoria($fechaAperturaHistoria) {
        $this->fechaAperturaHistoria = $fechaAperturaHistoria;
    }

    function setEstadoHistoria($estadoHistoria) {
        $this->estadoHistoria = $estadoHistoria;
    }


}
