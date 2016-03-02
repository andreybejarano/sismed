<?php

session_start();

class consultoriosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Consultorios');
    }

    public function consultorios() {
        $datos['titulo'] = "Consultorios";
        Vista::mostrar('consultorios', $datos);
    }

    public function insertarConsultorio() {
        $this->modelo->setNumeroConsultorio($_POST['txfNumeroConsultorio']);
        $registro = $this->modelo->insertarConsultorio();
        if ($registro) {
            $datos['mensaje'] = "Consultorio insertado correctamente";
        } else {
            $datos['mensaje'] = "Error al insertar Consultorio";
        }
        $datos['titulo'] = "Consultorios";
        Vista::mostrar('consultorios', $datos);
    }

    public function listarConsultorios() {
        echo json_encode($this->modelo->listarConsultorios(), true);
    }

    public function editarConsultorio() {
        $datos['titulo'] = "Editar Consultorio";
        $this->modelo->setIdConsultorio($_POST['idConsultorio']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['consultorio'] = $this->modelo->listarIdConsultorio();
            Vista::mostrar('editarConsultorio', $datos);
        } else {
            $this->modelo->setNumeroConsultorio($_POST['txfNumeroConsultorio']);
            $registro = $this->modelo->editarConsultorio();
            if ($registro) {
                $datos['mensaje'] = "Registro actializado correctamente";
            } else {
                $datos['mensaje'] = "Error al actualizar registro";
            }
            Vista::mostrar('consultorios', $datos);
        }
    }

    public function eliminarConsultorio() {
        $this->modelo->setIdConsultorio($_POST['idConsultorio']);
        $registro = $this->modelo->eliminarConsultorio();
        if ($registro) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        $datos['titulo'] = "Consultorios";
        Vista::mostrar('consultorios', $datos);
    }

}
