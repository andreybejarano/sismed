<?php

session_start();

class centrosFormacionControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('CentrosFormacion');
    }

    public function centrosFormacion() {
        $datos['titulo'] = "centros de formacion";

        Vista::mostrar('centrosFormacion', $datos);
    }

    public function insertarCentroFormacion() {
        $this->modelo->setNombreCentroFormacion($_POST['txfNombreCentroFormacion']);
        $this->modelo->setSigla($_POST['txfSigla']);
        $this->modelo->setDireccionCentroFormacion($_POST['txfDireccionCentroFormacion']);
        $this->modelo->setTelefonoCentroFormacion($_POST['txfTelefonoCentroFormacion']);
        $this->modelo->setIdRegional($_POST['cmbRegionales']);
        $registro = $this->modelo->insertarCentroFormacion();
        if ($registro) {
            $datos['mensaje'] = "Se registro centro de formacion correctamente";
        } else {
            $datos['mensaje'] = "Error al registrar centro de formacion";
        }
        $datos['titulo'] = "centros de formacion";
        Vista::mostrar('centrosFormacion', $datos);
    }

    public function listarNombreCentroFormacion() {
        $this->modelo->setNombreCentroFormacion($_POST['centroFormacion']);
        echo json_encode($this->modelo->listarNombreCentroFormacion(), true);
    }

    public function listarCentrosFormacion() {
        echo json_encode($this->modelo->listarCentrosFormacion(), true);
    }
    
    public function listarCentroFormacionRegional() {
        $this->modelo->setIdRegional($_POST['idRegional']);
        echo json_encode($this->modelo->listarCentroFormacionRegional(), true);
    }

    public function editarCentroFormacion() {
        $datos['titulo'] = "Editar centro de formacion";
        $this->modelo->setIdCentroFormacion($_POST['idCentroFormacion']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['centroFormacion'] = $this->modelo->listarIdCentroFormacion();
            Vista::mostrar('editarCentroFormacion', $datos);
        } else {
            $this->modelo->setNombreCentroFormacion($_POST['txfNombreCentroFormacion']);
            $this->modelo->setSigla($_POST['txfSigla']);
            $this->modelo->setDireccionCentroFormacion($_POST['txfDireccionCentroFormacion']);
            $this->modelo->setTelefonoCentroFormacion($_POST['txfTelefonoCentroFormacion']);
            $this->modelo->setIdRegional($_POST['cmbRegionales']);
            $registro = $this->modelo->editarCentroFormacion();
            if ($registro) {
                $datos['mensaje'] = "Registro actializado correctamente";
            } else {
                $datos['mensaje'] = "No se actualizo registro";
            }
            Vista::mostrar('centrosFormacion', $datos);
        }
    }

    public function eliminarCentroFormacion() {
        $this->modelo->setIdCentroFormacion($_POST['idCentroFormacion']);
        $registro = $this->modelo->eliminarCentroFormacion();
        if ($registro) {
            $datos['mensaje'] = "Se elimino Registro correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar centro de formacion";
        }
        $datos['titulo'] = "centros de formacion";
        Vista::mostrar('centrosFormacion', $datos);
    }

}
