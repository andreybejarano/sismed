<?php

session_start();

class empleadosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Empleados');
    }

    public function empleados() {
        $datos['titulo'] = "Empleados";
        Vista::mostrar('empleados', $datos);
    }

    public function insertarEmpleado() {
        if (!$_POST){
            header("location: empleados");
        }
        else{
            $this->modelo->setIdentificacionEmpleado($_POST['txfIdentificacionEmpleado']);
            $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
            $this->modelo->setNombresEmpleado($_POST['txfNombresEmpleado']);
            $this->modelo->setApellidosEmpleado($_POST['txfApellidosEmpleado']);
            $this->modelo->setIdGenero($_POST['cmbGenero']);
            $this->modelo->setFechaNacimientoEmpleado($_POST['txfFechaNacimientoEmpleado']);
            $this->modelo->setTarjetaProfesionalEmpleado($_POST['txfTarjetaProfesional']);
            $this->modelo->setIdCargo($_POST['cmbCargo']);
            $this->modelo->setIdEspecialidad($_POST['cmbEspecialidad']);
            $this->modelo->setDireccionEmpleado($_POST['txfDireccionEmpleado']);
            $this->modelo->setTelefonoEmpleado($_POST['txfTelefonoEmpleado']);
            $this->modelo->setMovilEmpleado($_POST['txfMovilEmpleado']);
            $this->modelo->setCorreoEmpleado($_POST['txfCorreoEmpleado']);
            $this->modelo->setEstadoEmpleado($_POST['cmbEstadoEmpleado']);
            $registro = $this->modelo->insertarEmpleado();
            if ($registro) {
                $datos['mensaje'] = "Se inserto empleado correctamente";
            } else {
                $datos['mensaje'] = "No se inserto empleado";
            }
            $datos['titulo'] = "Empleados";
            Vista::mostrar('empleados', $datos);
        }
    }

    public function listarEmpleados() {
        echo json_encode($this->modelo->listarEmpleados(), true);
    }
    
    public function listarMedicos() {
        echo json_encode($this->modelo->listarMedicos(), true);
    }

    public function listarDocumentoEmpleado() {
        $this->modelo->setIdentificacionEmpleado($_POST['empleado']);
        echo json_encode($this->modelo->listarDocumentoEmpleado(), TRUE);
    }

    public function editarEmpleado() {
        if (!$_POST){
            header("location: empleados");
        }
        else{
            $datos['titulo'] = "Editar Empleado";
            $this->modelo->setIdEmpleado($_POST['idEmpleado']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['empleado'] = $this->modelo->listarIdEmpleado();
                Vista::mostrar('editarEmpleado', $datos);
            } else {
                $this->modelo->setIdentificacionEmpleado($_POST['txfIdentificacionEmpleado']);
                $this->modelo->setIdTipoDocumento($_POST['cmbTipoDocumento']);
                $this->modelo->setNombresEmpleado($_POST['txfNombresEmpleado']);
                $this->modelo->setApellidosEmpleado($_POST['txfApellidosEmpleado']);
                $this->modelo->setIdGenero($_POST['cmbGenero']);
                $this->modelo->setFechaNacimientoEmpleado($_POST['txfFechaNacimientoEmpleado']);
                $this->modelo->setTarjetaProfesionalEmpleado($_POST['txfTarjetaProfesional']);
                $this->modelo->setIdCargo($_POST['cmbCargo']);
                $this->modelo->setIdEspecialidad($_POST['cmbEspecialidad']);
                $this->modelo->setDireccionEmpleado($_POST['txfDireccionEmpleado']);
                $this->modelo->setTelefonoEmpleado($_POST['txfTelefonoEmpleado']);
                $this->modelo->setMovilEmpleado($_POST['txfMovilEmpleado']);
                $this->modelo->setCorreoEmpleado($_POST['txfCorreoEmpleado']);
                $this->modelo->setEstadoEmpleado($_POST['cmbEstadoEmpleado']);
                $registro = $this->modelo->editarEmpleado();
                if ($registro) {
                    $datos['mensaje'] = "Empleado Editado correctamente";
                } else {
                    $datos['mensaje'] = "No se edito el empleado";
                }
                $datos['titulo'] = "Empleados";
                Vista::mostrar('empleados', $datos);
            }
        }
    }

    public function eliminarEmpleado() {
        if (!$_POST){
            header("location: empleados");
        }
        else{
            $this->modelo->setIdEmpleado($_POST['idEmpleado']);
            $registro = $this->modelo->eliminarEmpleado();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            $datos['titulo'] = "Empleados";
            Vista::mostrar('empleados', $datos);
        }
    }

}
