<?php

session_start();

class cargosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Cargos');
    }

    public function cargos() {
        $datos['titulo'] = "Cargos";
        Vista::mostrar('cargos', $datos);
    }

    public function listarCargos() {
        echo json_encode($this->modelo->listarCargos(), FALSE);
    }

    public function listarDescCargo() {
        $this->modelo->setDescripcionCargo($_POST['cargo']);
        echo json_encode($this->modelo->listarDescCargo(), FALSE);
    }

    public function insertarCargo() {
        if (!$_POST){
            header("location: cargos");
        }
        else{
            $this->modelo->setDescripcionCargo($_POST['txfDescipcionCargo']);
            $registro = $this->modelo->insertarCargo();
            if ($registro) {
                $datos['mensaje'] = "Cargo insertado correctamente";
            } else {
                $datos['mensaje'] = "No se inserto el cargo";
            }
            Vista::mostrar('cargos', $datos);
        }
    }
    
    public function editarCargo() {
        if (!$_POST){
            header("location: cargos");
        }
        else{
            $datos['titulo'] = "Editar Cargo";
            $this->modelo->setIdCargo($_POST['idCargo']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['cargo'] = $this->modelo->listarIdCargo();
                Vista::mostrar('editarCargo', $datos);
            }else{
                $this->modelo->setDescripcionCargo($_POST['txfDescipcionCargo']);
                $registro = $this->modelo->editarCargo();
                if ($registro) {
                    $datos['mensaje'] = "Registro actializado correctamente";
                }else{
                    $datos['mensaje'] = "No se actualizo registro";
                }
                Vista::mostrar('cargos', $datos);
            }
        }
    }
    
    public function eliminarCargo() {
        if (!$_POST){
            header("location: cargos");
        }
        else{
            $this->modelo->setIdCargo($_POST['idCargo']);
            $registro = $this->modelo->eliminarCargo();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            Vista::mostrar('cargos', $datos);
        }
    }

}
