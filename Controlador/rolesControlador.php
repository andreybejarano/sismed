<?php

session_start();

class rolesControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        if ($_SESSION['rol']== 3 || $_SESSION['rol']== 2) {
            header('location: '.URL_BASE);
        }
        $this->modelo = Modelo::cargar('Roles');
    }

    public function roles() {
        $datos['titulo'] = "Roles";
        Vista::mostrar('roles', $datos);
    }
    
    public function listarNombreRol() {
        $this->modelo->setNombreRol($_POST['rol']);
        echo json_encode($this->modelo->listarNombreRol(), true);
    }

    public function listarRoles() {
        echo json_encode($this->modelo->listarRoles(), false);
    }

    public function insertarRol() {
        $datos['titulo'] = "Registrar Rol";
        if (!$_POST) :
            header("location: roles");
        else :
            $this->modelo->setNombreRol($_POST['txfNombreRol']);
            $this->modelo->setDescripcionRol($_POST['txfDescipcionRol']);
            $registro = $this->modelo->insertarRol();
            if ($registro) :
                $datos['mensaje'] = "Registro Ingresado Correctamente";
            else :
                $datos['mensaje'] = "No se actualizo Rol";
            endif;
            Vista::mostrar('roles', $datos);
        endif;
    }

    public function editarRol() {
       $datos['titulo'] = "Editar Rol";
        if (!$_POST){
            header("location: roles");
        }else{
            $this->modelo->setIdRol($_POST['idRol']);
            if (!isset($_POST['btnGuardar'])) {
                $datos['rol'] = $this->modelo->listarIdRol();
                Vista::mostrar('editarRol', $datos);
            } else {
                $this->modelo->setNombreRol($_POST['txfNombreRol']);
                $this->modelo->setDescripcionRol($_POST['txfDescipcionRol']);
                $registro = $this->modelo->editarRol();
                if ($registro) {
                    $datos['mensaje'] = "Registro actializado correctamente";
                } else {
                    $datos['mensaje'] = "Error al actualizar registro";
                }
                Vista::mostrar('roles', $datos);
                //echo "Nombre: ".$_POST['txfNombreRol']."<br>";
                //echo "Descripcion: ".$_POST['txfDescipcionRol']."<br>";
                //echo "idRol: ".$_POST['idRol']."<br>";
            }
        }
    }

    public function eliminarRol() {
        $datos['titulo'] = "Roles";
        if(!$_POST){
            header("location: roles");
        }
        else{
            $this->modelo->setIdRol($_POST['idRol']);
            $registro = $this->modelo->eliminarRol();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            Vista::mostrar('roles', $datos);
        }
        
    }

}
