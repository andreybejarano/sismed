<?php

session_start();

class agendasMedicasControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('AgendasMedicas');
    }

    public function agenda() {
        $datos['titulo'] = "Agendas Medicas";
        Vista::mostrar('AgendasMedicas', $datos);
    }

    public function insertarAgendaMedica() {
        $idHora = $_POST['chk'];
        $cont = count($idHora);
        for ($i = 0; $i < $cont; $i++) {
            $this->modelo->setFechaAgendaMedica($_POST['txfFechaAgendaMedica']);
            $this->modelo->setDiponibilidadAgendaMedica(1);
            $this->modelo->setIdEmpleado($_POST['cmbIdentificacionEmpleado']);
            $this->modelo->setIdHora($idHora[$i]);
            $registro = $this->modelo->insertarAgendaMedica();
        }
        if ($registro) {
            $datos['mensaje'] = "Se inserto Agenda Medica correctamente";
        } else {
            $datos['mensaje'] = "No se inserto Agenda Medica";
        }
        $datos['titulo'] = "Agendas Medicas";
        Vista::mostrar('AgendasMedicas', $datos);
    }

    public function listarAgendasMedicas() {
        echo json_encode($this->modelo->listarAgendasMedicas(), TRUE);
    }

    public function listarHorasEmpleado() {
        $this->modelo->setIdEmpleado($_POST['idEmpleado']);
        echo json_encode($this->modelo->listarHorasEmpleado(), TRUE);
    }

    public function listarAgendaEmpleado() {
        $this->modelo->setNumeroIdentificacionEmpleado($_POST['identificacionEmpleado']);
        echo json_encode($this->modelo->listarAgendaEmpleado(), TRUE);
    }

    public function eliminarAgendaMedica() {
        $this->modelo->setIdEmpleado($_POST['idEmpleado']);
        $this->modelo->setFechaAgendaMedica($_POST['fecha']);
        $registro = $this->modelo->eliminarAgendaMedica();
        if ($registro) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        $datos['titulo'] = "Agendas Medicas";
        Vista::mostrar('AgendasMedicas', $datos);
    }

}
