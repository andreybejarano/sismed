<?php
session_start();
class reportesControlador{
    
    private $modelo;
    
    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
          if ($_SESSION['rol'] != 1) {
            header('location: '.URL_BASE);
        }
        
        $this->modelo = Modelo::cargar('Reportes');
    }
    
    public function reportes() {
        $datos['titulo'] = "Reportes";
        Vista::mostrar('reportes', $datos);
    }
    
    public function consultasFechas(){
        $this->modelo->setFechaInicioConsulta($_POST['txfechaInicio']);
        $this->modelo->setFechaFinConsulta($_POST['txfechaFin']);
        $datos['regitros'] = $this->modelo->consultasFechas();
        Vista::mostrar('reportes/consultasFechas', $datos);
    }
    
    public function consultaDoctor(){
        $this->modelo->setFechaInicioConsulta($_POST['txfechaInicio1']);
        $this->modelo->setFechaFinConsulta($_POST['txfechaFin1']);
        $this->modelo->setNumeroIdentificacionEmpleado($_POST['txfDocumentoMedico']);
        $datos['regitros'] = $this->modelo->consultaDoctor();
        Vista::mostrar('reportes/consultaDoctor', $datos);
    }
    
    public function consultaFuncionario(){
        $this->modelo->setIdCentroFormacion($_POST['cmbCentroFormacion']);
        $datos['regitros'] = $this->modelo->consultaFuncionario();
        Vista::mostrar('reportes/consultaFuncionario', $datos);
    }

    public function consultaBeneficiario(){
        $this->modelo->setNumeroIdentificacionBeneficiario($_POST['txfDocumentoBeneficiario']);
        $datos['regitros'] = $this->modelo->consultaBeneficiario();
        Vista::mostrar('reportes/consultaBeneficiario', $datos);
    }    
    
    public function consultaMedicamentos(){
           
    }
    
    public function consultaRemisiones(){
        $this->modelo->setFechaInicioConsulta($_POST['txfechaInicio2']);
        $this->modelo->setFechaFinConsulta($_POST['txfechaFin2']);
        $datos['regitros'] = $this->modelo->consultaRemisiones();
        Vista::mostrar('reportes/consultaRemisiones', $datos);
    }
    
    
}