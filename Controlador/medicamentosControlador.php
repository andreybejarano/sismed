<?php

session_start();

class medicamentosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Medicamentos');
    }

    public function medicamentos() {
        $datos['titulo'] = "Medicamentos";
        Vista::mostrar('medicamentos', $datos);
    }

    public function insertarMedicamento() {
        $this->modelo->setCodigoMedicamento($_POST['txfCodigoMedicamento']);
        $this->modelo->setNombreGenericoMedicamento($_POST['txfNombreMedicamento']);
        $this->modelo->setDescripcionMedicamento($_POST['txfDescripcionMedicamento']);
        $this->modelo->setFormaFarmaceuticaMedicamento($_POST['txfFormaFarmaceuticaMedicamento']);
        $this->modelo->setConcentracionMedicamento($_POST['txfConcentracionMedicamento']);
        $this->modelo->setDosisMedicamento($_POST['txfDosisMedicamento']);
        $this->modelo->setViaFrecuenciaAdministracionMedicamento($_POST['txfViaFrecuenciaAdministracionMedicamento']);
        $this->modelo->setRegistroInvimaMedicamento($_POST['txfRegistroInvimaMedicamento']);
        $registro = $this->modelo->insertarMedicamento();
        if ($registro) {
            $datos['mensaje'] = "Medicamento insertada correctamente";
        } else {
            $datos['mensaje'] = "No se inserto el Medicamento";
        }
        $datos['titulo'] = "Medicamentos";
        Vista::mostrar('medicamentos', $datos);
    }

    public function listarMedicamentos() {
        echo json_encode($this->modelo->listarMedicamentos(), true);
    }

    public function listarNombreMedicamento() {
        $this->modelo->setNombreGenericoMedicamento($_POST['medicamento']);
        echo json_encode($this->modelo->listarNombreMedicamento(), TRUE);
    }

    public function editarMedicamento() {
        $datos['titulo'] = "Editar Medicamento";
        $this->modelo->setIdMedicamento($_POST['idMedicamento']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['medicamento'] = $this->modelo->listarIdMedicamento();
            Vista::mostrar('editarMedicamento', $datos);
        } else {
            $this->modelo->setCodigoMedicamento($_POST['txfCodigoMedicamento']);
            $this->modelo->setNombreGenericoMedicamento($_POST['txfNombreMedicamento']);
            $this->modelo->setDescripcionMedicamento($_POST['txfDescripcionMedicamento']);
            $this->modelo->setFormaFarmaceuticaMedicamento($_POST['txfFormaFarmaceuticaMedicamento']);
            $this->modelo->setConcentracionMedicamento($_POST['txfConcentracionMedicamento']);
            $this->modelo->setDosisMedicamento($_POST['txfDosisMedicamento']);
            $this->modelo->setViaFrecuenciaAdministracionMedicamento($_POST['txfViaFrecuenciaAdministracionMedicamento']);
            $this->modelo->setRegistroInvimaMedicamento($_POST['txfRegistroInvimaMedicamento']);
            $registro = $this->modelo->editarMedicamento();
            if ($registro) {
                $datos['mensaje'] = "Medicamento Editado correctamente";
            } else {
                $datos['mensaje'] = "No se edito el Medicamento";
            }
            $datos['titulo'] = "Medicamentos";
            Vista::mostrar('medicamentos', $datos);
        }
    }
    
    public function eliminarMedicamento() {
        $this->modelo->setIdMedicamento($_POST['idMedicamento']);
        $registro = $this->modelo->eliminarMedicamento();
        if ($registro) {
            $datos['mensaje'] = "Se elimino Registro correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar centro de formacion";
        }
        $datos['titulo'] = "Medicamentos";
        Vista::mostrar('medicamentos', $datos);
    }

}
