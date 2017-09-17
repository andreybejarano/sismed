<?php

session_start();

class citasMedicasControlador {

    private $modelo;
    private $modeloAgenda;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('CitasMedicas');
        $this->modeloAgenda = Modelo::cargar('AgendasMedicas');
    }

    public function citas() {
        $datos['titulo'] = "Citas Medicas";
        Vista::mostrar('citasMedicas', $datos);
    }

    public function insertarCitaMedica() {
        if ($_POST){
            
            $this->modelo->setComentariosCitaMedica($_POST['txfComentario']);
            $this->modelo->setIdBeneficarios($_POST['cmbBeneficiario']);
            $this->modelo->setIdAgendaMedica($_POST['cmbHoraCita']);
            $registro = $this->modelo->insertarCitaMedica();
            $this->modeloAgenda->setIdAgendaMedica($_POST['cmbHoraCita']);
            $this->modeloAgenda->setDiponibilidadAgendaMedica(0);
            $registroAgenda = $this->modeloAgenda->editarDisponibilidad();
            if ($registro && $registroAgenda) {
                $datos['mensaje'] = "Se inserto la Cita Medica correctamente";
            } else {
                $datos['mensaje'] = "No se inserto la Cita Medica";
            }
            $datos['titulo'] = "Citas Medicas";
            Vista::mostrar('citasMedicas', $datos);
        }
        else{
            header("location: citas");
           
        }
    }
    
    public function listarIdCitaMedica() {
        $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
        echo json_encode($this->modelo->listarIdCitaMedica(), TRUE);
    }

    public function listarCitasMedicas (){
        echo json_encode($this->modelo->listarCitasMedicas(), TRUE);
    }
    
    public function listarCitasMedicasAtentidas (){
        echo json_encode($this->modelo->listarCitasMedicasAtentidas(), TRUE);
    }
    
    public function listarCitasMedicasBeneficiario (){
        $this->modelo->setIdentificacionBeneficiario($_POST['beneficiario']);
        $this->modelo->setFechaCitaMedica($_POST['fecha']);
        echo json_encode($this->modelo->listarCitasMedicasBeneficiario(), TRUE);
    }
    
     public function listarCitasMedicasHoy (){
        echo json_encode($this->modelo->listarCitasMedicasHoy(), TRUE);
    }

    public function editarcitaMedica() {
        if (!$_POST){
            header("location: citas");
        }
        else{
            $datos['titulo'] = "Editar Cita Medica";
            $this->modelo->setIdcitaMedica($_POST['idCitaMedica']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['citaMedica'] = $this->modelo->listarIdCitaMedica(); 
                Vista::mostrar('editarCitaMedica', $datos);
            } else {
                
                $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
                $this->modelo->setComentariosCitaMedica($_POST['txfComentario']);
                $this->modelo->setEstadoCitaMedica($_POST['cmbEstado']);
                $this->modelo->setIdAgendaMedica($_POST['cmbHoraCita']);
                
                $registro = $this->modelo->editarCitaMedica();
                if ($registro) {
                    $datos['mensaje'] = "Cita Medica Editada correctamente";
                } else {
                    $datos['mensaje'] = "No se edito el Cita Medica";
                }
                $datos['titulo'] = "Citas Medicas";
                Vista::mostrar('citasMedicas', $datos);
            }
        }
    }
    
    public function eliminarcitaMedica() {
        if (!$_POST){
            header("location: citas");
        }
        else{
            $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
            $registro = $this->modelo->eliminarCitaMedica();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            $datos['titulo'] = "Citas Medicas";
            Vista::mostrar('citasMedicas', $datos);
        }
    }
    
    public function estadoCitaMedica (){
        if (!$_POST){
            header("location: citas");
        }
        else{
            $this->modelo->setIdCitaMedica($_POST['idCitaMedica']);
            $this->modelo->setEstadoCitaMedica($_POST['IdEstadoCitaMedica']);
            $registro = $this->modelo->estadoCitaMedica();
            if($registro) {
                $datos['mensaje'] = "La cita cambio de estado correctamente";
            }
            else {
                $datos['mensaje'] = "la cita no cambio de estado";
            }
            $datos['titulo'] = "Citas Medicas";
            Vista::mostrar('citasMedicas', $datos);
        }
    }
}
