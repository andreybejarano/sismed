<?php

session_start();

class funcionariosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        
        $this->modelo = Modelo::cargar('Funcionarios');
    }

    public function funcionarios() {
        $datos['titulo'] = "Funcionarios";
        Vista::mostrar('funcionarios', $datos);
    }

    public function insertarFuncionario() {
        if (!$_POST) {
            header("location: funcionarios");
        }
        else {
            $this->modelo->setIdentificacionFuncionario($_POST['txfIdentificacionFuncionario']);
            $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
            $this->modelo->setNombresFuncionario($_POST['txfNombresFuncionario']);
            $this->modelo->setApellidosFuncionario($_POST['txfApellidosFuncionario']);
            $this->modelo->setIdGenero($_POST['cmbGenero']);
            $this->modelo->setFechaNacimientoFuncionario($_POST['txfFechaNacimientoFuncionario']);
            $this->modelo->setIdCentroFormacion($_POST['cmbCentroFormacion']);
            $this->modelo->setDireccionFuncionario($_POST['txfDireccionFuncionario']);
            $this->modelo->setTelefonoFuncionario($_POST['txfTelefonoFuncionario']);
            $this->modelo->setMovilFuncionario($_POST['txfMovilFuncionario']);
            $this->modelo->setCorreoFuncionario($_POST['txfCorreoFuncionario']);
            $this->modelo->setEstadoFuncionario($_POST['cmbEstadoFuncionario']);
            $registro = $this->modelo->insertarFuncionario();
            if ($registro) {
                $datos['mensaje'] = "Se inserto Funcionario correctamente";
            } else {
                $datos['mensaje'] = "No se inserto Funcionario";
            }
            $datos['titulo'] = "Funcionarios";
            Vista::mostrar('funcionarios', $datos);
        }
    }

    public function listarFuncionarios() {
        echo json_encode($this->modelo->listarFuncionarios(), TRUE);
    }

    public function listarDocumentoFuncionario() {
        $this->modelo->setIdentificacionFuncionario($_POST['funcionario']);
        echo json_encode($this->modelo->listarDocumentoFuncionario(), TRUE);
    }

    public function editarFuncionario() {
        if (!$_POST) {
            header("location: funcionarios");
        }
        else {
            $datos['titulo'] = "Editar funcionario";
            $this->modelo->setIdFuncionario($_POST['idFuncionario']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['funcionario'] = $this->modelo->listarIdFuncionario();
                Vista::mostrar('editarFuncionario', $datos);
            } else {
                $this->modelo->setIdentificacionFuncionario($_POST['txfIdentificacionFuncionario']);
                $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
                $this->modelo->setNombresFuncionario($_POST['txfNombresFuncionario']);
                $this->modelo->setApellidosFuncionario($_POST['txfApellidosFuncionario']);
                $this->modelo->setIdGenero($_POST['cmbGenero']);
                $this->modelo->setFechaNacimientoFuncionario($_POST['txfFechaNacimientoFuncionario']);
                $this->modelo->setIdCentroFormacion($_POST['cmbCentroFormacion']);
                $this->modelo->setDireccionFuncionario($_POST['txfDireccionFuncionario']);
                $this->modelo->setTelefonoFuncionario($_POST['txfTelefonoFuncionario']);
                $this->modelo->setMovilFuncionario($_POST['txfMovilFuncionario']);
                $this->modelo->setCorreoFuncionario($_POST['txfCorreoFuncionario']);
                $this->modelo->setEstadoFuncionario($_POST['cmbEstadoFuncionario']);
                $registro = $this->modelo->editarFuncionario();
                if ($registro) {
                    $datos['mensaje'] = "Funcionario Editado correctamente";
                } else {
                    $datos['mensaje'] = "No se edito el funcionario";
                }
                $datos['titulo'] = "Funcionarios";
                Vista::mostrar('funcionarios', $datos);
            }
        }
    }
    
    public function eliminarFuncionario() {
        if (!$_POST) {
            header("location: funcionarios");
        }
        else {
            $this->modelo->setIdFuncionario($_POST['idFuncionario']);
            $registro = $this->modelo->eliminarFuncionario();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            $datos['titulo'] = "Funcionarios";
            Vista::mostrar('funcionarios', $datos);
        }
    }
}
