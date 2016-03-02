<?php

session_start();

class beneficiariosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Beneficiarios');
    }

    public function beneficiarios() {
        $datos['titulo'] = "Beneficiarios";
        Vista::mostrar('beneficiarios', $datos);
    }

    public function insertarBeneficiario() {
        $this->modelo->setIdentificacionBeneficiario($_POST['txfIdentificacionBeneficiario']);
        $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
        $this->modelo->setNombresBeneficiario($_POST['txfNombresBeneficiario']);
        $this->modelo->setApellidosBeneficiario($_POST['txfApellidosBeneficiario']);
        $this->modelo->setIdGenero($_POST['cmbGenero']);
        $this->modelo->setFechaNacimientoBeneficiario($_POST['txfFechaNacimientoBeneficiario']);
        $this->modelo->setIdFuncionario($_POST['cmbIdFuncionario']);
        $this->modelo->setCronicoBeneficiario($_POST['cmbCronico']);
        $this->modelo->setDireccionBeneficiario($_POST['txfDireccionBeneficiario']);
        $this->modelo->setTelefonoBeneficiario($_POST['txfTelefonoBeneficiario']);
        $this->modelo->setMovilBeneficiario($_POST['txfMovilBeneficiario']);
        $this->modelo->setCorreoBeneficiario($_POST['txfCorreoBeneficiario']);
        $this->modelo->setEstadoBeneficiario($_POST['cmbEstadoBeneficiario']);
        $registro = $this->modelo->insertarBeneficiario();
        if ($registro) {
            $datos['mensaje'] = "Se inserto Beneficiario correctamente";
        } else {
            $datos['mensaje'] = "No se inserto Beneficiario";
        }
        $datos['titulo'] = "Beneficiarios";
        Vista::mostrar('Beneficiarios', $datos);
    }

    public function listarBeneficiarios() {
        echo json_encode($this->modelo->listarBeneficiarios(), TRUE);
    }

    public function listarDocumentoBeneficiario() {
        $this->modelo->setIdentificacionBeneficiario($_POST['beneficiario']);
        echo json_encode($this->modelo->listarDocumentoBeneficiario(), TRUE);
    }

    public function listarDocFuncionarioBeneficiario() {
        $this->modelo->setIdentificacionFuncionario($_POST['funcionario']);
        echo json_encode($this->modelo->listarDocFuncionarioBeneficiario(), TRUE);
    }

    public function editarBeneficiario() {
        $datos['titulo'] = "Editar beneficiario";
        $this->modelo->setIdBeneficiario($_POST['idBeneficiario']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['beneficiario'] = $this->modelo->listarIdBeneficiario();
            Vista::mostrar('editarBeneficiario', $datos);
        } else {
            $this->modelo->setIdentificacionBeneficiario($_POST['txfIdentificacionBeneficiario']);
            $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
            $this->modelo->setNombresBeneficiario($_POST['txfNombresBeneficiario']);
            $this->modelo->setApellidosBeneficiario($_POST['txfApellidosBeneficiario']);
            $this->modelo->setIdGenero($_POST['cmbGenero']);
            $this->modelo->setFechaNacimientoBeneficiario($_POST['txfFechaNacimientoBeneficiario']);
            $this->modelo->setIdFuncionario($_POST['cmbIdFuncionario']);
            $this->modelo->setCronicoBeneficiario($_POST['cmbCronico']);
            $this->modelo->setDireccionBeneficiario($_POST['txfDireccionBeneficiario']);
            $this->modelo->setTelefonoBeneficiario($_POST['txfTelefonoBeneficiario']);
            $this->modelo->setMovilBeneficiario($_POST['txfMovilBeneficiario']);
            $this->modelo->setCorreoBeneficiario($_POST['txfCorreoBeneficiario']);
            $this->modelo->setEstadoBeneficiario($_POST['cmbEstadoBeneficiario']);
            $registro = $this->modelo->editarBeneficiario();
            if ($registro) {
                $datos['mensaje'] = "Beneficiario Editado correctamente";
            } else {
                $datos['mensaje'] = "No se edito el funcionario";
            }
            $datos['titulo'] = "Beneficiarios";
            Vista::mostrar('funcionarios', $datos);
        }
    }

    public function eliminarBeneficiario() {
        $this->modelo->setIdBeneficiario($_POST['idBeneficiario']);
        $resultado = $this->modelo->eliminarBeneficiario();
        if ($resultado) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        $datos['titulo'] = "Beneficiarios";
        Vista::mostrar('beneficiarios', $datos);
    }

}
