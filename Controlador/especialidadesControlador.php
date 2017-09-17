<?php

session_start();

class especialidadesControlador {
    
    private $modelo;
    
    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Especialidades');
    }
    
    public function especialidades() {
        $datos['titulo'] = "Especialidades";
        Vista::mostrar('especialidades', $datos);
    }
    
    public function insertarEspecialidad() {
        if (!$_POST){
            header("location: especialidades");
        }
        else{
            $this->modelo->setDescripcionEspecialidad($_POST['txfDescipcionEspecialidad']);
            $registro = $this->modelo->insertarEspecialidad();
            if ($registro) {
                $datos['mensaje'] = "Especialidad insertada correctamente";
            } else {
                $datos['mensaje'] = "No se inserto el especialidad";
            }
    
            Vista::mostrar('especialidades', $datos);
        }
    }
    
    public function listarEspecialidades() {
        echo json_encode($this->modelo->listarEspecialidades(), false);
    }
    
    public function listarDescripcionEspecialidad() {
        $this->modelo->setDescripcionEspecialidad($_POST['especialidad']);
        echo json_encode($this->modelo->listarDescripcionEspecialidad(), FALSE);
    }
    
    public function editarEspecialidad() {
        if (!$_POST){
            header("location: especialidades");
        }
        else{
            $datos['titulo'] = "Editar Especialidad";
            $this->modelo->setIdEspecialidad($_POST['idEspecialidad']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['especialidad'] = $this->modelo->listarIdEspecialidad();
                Vista::mostrar('editarEspecialidad', $datos);
            }else{
                $this->modelo->setDescripcionEspecialidad($_POST['txfDescipcionEspecialidad']);
                $registro = $this->modelo->editarEspecialidad();
                if ($registro) {
                    $datos['mensaje'] = "Registro actializado correctamente";
                }else{
                    $datos['mensaje'] = "No se actualizo registro";
                }
                Vista::mostrar('especialidades', $datos);
            }
        }
    }
    
    public function eliminarEspecialidad() {
        if (!$_POST){
            header("location: especialidades");
        }
        else{
            $this->modelo->setIdEspecialidad($_POST['idEspecialidad']);
            $registro = $this->modelo->eliminarEspecialidad();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            Vista::mostrar('especialidades', $datos);
        }
    }
}
