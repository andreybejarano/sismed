<?php

session_start();

class enfermedadesControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Enfermedades');
    }

    public function enfermedades() {
        $datos['titulo'] = "Enfermedades";
        Vista::mostrar('enfermedades', $datos);
    }

    public function insertarEnfermedad() {
        $this->modelo->setNombreEnfermedad($_POST['txfNombreEnfermedad']);
        $this->modelo->setSintomatologiaEnfermedad($_POST['txfSintomatologiaEnfermedad']);
        $this->modelo->setTratamientoEnfermedad($_POST['txfTratamientoEnfermedad']);
        $registro = $this->modelo->insertarEnfermedad();
        if ($registro) {
            $datos['mensaje'] = "Se inserto enfermedad correctamente";
        } else {
            $datos['mensaje'] = "No se inserto enfermedad";
        }
        $datos['titulo'] = "Enfermedades";
        Vista::mostrar('Enfermedades', $datos);
    }

    public function listarEnfermedades() {
        echo json_encode($this->modelo->listarEnfermedades(), TRUE);
    }

    public function listarNombreEnfermedad() {
        $this->modelo->setNombreEnfermedad($_POST['enfermedad']);
        echo json_encode($this->modelo->listarNombreEnfermedad(), TRUE);
    }

    public function editarEnfermedad() {
        $datos['titulo'] = "Editar Enfermedad";
        $this->modelo->setIdEnfermedad($_POST['idEnfermedad']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['enfermedad'] = $this->modelo->listarIdEnfermedad();
            Vista::mostrar('editarEnfermedad', $datos);
        } else {
            $this->modelo->setNombreEnfermedad($_POST['txfNombreEnfermedad']);
            $this->modelo->setSintomatologiaEnfermedad($_POST['txfSintomatologiaEnfermedad']);
            $this->modelo->setTratamientoEnfermedad($_POST['txfTratamientoEnfermedad']);
            $registro = $this->modelo->editarEnfermedad();
            if ($registro) {
                $datos['mensaje'] = "Enfermedad Editado correctamente";
            } else {
                $datos['mensaje'] = "No se edito Enfermedad";
            }
            $datos['titulo'] = "Enfermedades";
            Vista::mostrar('enfermedades', $datos);
        }
    }

    public function eliminarEnfermedad() {
        $this->modelo->setIdEnfermedad($_POST['idEnfermedad']);
        $registro = $this->modelo->eliminarEnfermedad();
        if ($registro) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        $datos['titulo'] = "Enfermedades";
        Vista::mostrar('enfermedades', $datos);
    }

}
