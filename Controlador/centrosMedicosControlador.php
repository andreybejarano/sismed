<?php

session_start();

class centrosMedicosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('CentrosMedicos');
    }

    public function centrosMedicos() {
        $datos['titulo'] = "Centros medicos";
        Vista::mostrar('centrosMedicos', $datos);
    }

    public function insertarCentroMedico() {
        if(!$_POST){
            header("location: centrosMedicos");
        }
        else{
            $this->modelo->setNombreCentroMedico($_POST['txfNombreCentroMedico']);
            $this->modelo->setTelefonoCentroMedico($_POST['txfTelefonoCentroMedico']);
            $this->modelo->setCelularCentroMedico($_POST['txfCelularCentroMedico']);
            $this->modelo->setDireccionCentroMedico($_POST['txfDireccionCentroMedico']);
            $this->modelo->setCorreoCentroMedico($_POST['txfCorreoCentroMedico']);
            $registro = $this->modelo->insertarCentroMedico();
            if ($registro) {
                $datos['mensaje'] = "Se registro centro de medico correctamente";
            } else {
                $datos['mensaje'] = "Error al registrar centro de medico";
            }
            $datos['titulo'] = "Centros medicos";
            Vista::mostrar('centrosMedicos', $datos);
        }
    }

    public function listarCentrosMedicos() {
        echo json_encode($this->modelo->listarCentrosMedicos(), true);
    }

    public function listarNombreCentroMedico() {
        $this->modelo->setNombreCentroMedico($_POST['centroMedico']);
        echo json_encode($this->modelo->listarNombreCentroMedico(), true);
    }

    public function editarCentroMedico() {
        if(!$_POST){
            header("location: centrosMedicos");
        }
        else{
            $datos['titulo'] = "Editar centro Medico";
            $this->modelo->setIdCentroMedico($_POST['idCentroMedico']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['centroMedico'] = $this->modelo->listarIdCentroMedico();
                Vista::mostrar('editarCentroMedico', $datos);
            } else {
                $this->modelo->setNombreCentroMedico($_POST['txfNombreCentroMedico']);
                $this->modelo->setTelefonoCentroMedico($_POST['txfTelefonoCentroMedico']);
                $this->modelo->setCelularCentroMedico($_POST['txfCelularCentroMedico']);
                $this->modelo->setDireccionCentroMedico($_POST['txfDireccionCentroMedico']);
                $this->modelo->setCorreoCentroMedico($_POST['txfCorreoCentroMedico']);
                $registro = $this->modelo->editarCentroMedico();
                if ($registro) {
                    $datos['mensaje'] = "Registro actializado correctamente";
                } else {
                    $datos['mensaje'] = "No se actualizo registro";
                }
                Vista::mostrar('centrosMedicos', $datos);
            }
        }
    }

    public function eliminarCentroMedico() {
        if(!$_POST){
            header("location: centrosMedicos");
        }
        else{
            $this->modelo->setIdCentroMedico($_POST['idCentroMedico']);
            $registro = $this->modelo->eliminarCentroMedico();
            if ($registro) {
                $datos['mensaje'] = "Se elimino Registro correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar centro de formacion";
            }
            $datos['titulo'] = "centros Medicos";
            Vista::mostrar('centrosMedicos', $datos);
        }
        
    }

}
