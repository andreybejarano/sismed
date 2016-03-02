<?php

session_start();

//OJO::
//Verificar contraseña actual para cambiar de contraseña;
class usuariosControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Usuarios');
    }

    public function insertarUsuario() {
        $datos['titulo'] = "Registrar Usuario";
        if (!$_POST) :
            Vista::mostrar('registrarUsuario', $datos);
        else :
            $this->modelo->setContrasenia($_POST['txfContrasenia']);
            $this->modelo->setIdRol($_POST['cmbRol']);
            $this->modelo->setIdEmpleado($_POST['cmbIdentificacionEmpleado']);
            $this->modelo->setEstadoUsuario($_POST['cmbEstadoUsuario']);
            $registro = $this->modelo->insertarUsuario();
            if ($registro) :
                $datos['mensaje'] = "Registro Ingresado Correctamente";
            else :
                $datos['mensaje'] = "Error al Ingresar";
            endif;
            Vista::mostrar('usuarios', $datos);
        endif;
    }

    public function listarUsuarios() {
        echo json_encode($this->modelo->listarUsuarios(), true);
    }

    public function listarCorreoUsuario() {
        $this->modelo->setCorreoEmpleado($_POST['correo']);
        echo json_encode($this->modelo->listarCorreoUsuario(), true);
    }

    public function editarUsuario() {
        $datos['titulo'] = "Editar usuario";
        $this->modelo->setIdUsuario($_POST['idUsuario']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['usuario'] = $this->modelo->listarIdUsuario();
            Vista::mostrar('editarUsuario', $datos);
        } else {
            $datos['mensaje'] = $this->modelo->editarUsuario();
            Vista::mostrar('usuarios', $datos);
        }
    }

    public function usuarios() {
        $datos['titulo'] = "Usuarios";
        Vista::mostrar('usuarios', $datos);
    }

    public function eliminarUsuario() {
        $this->modelo->setIdUsuario($_POST['idUsuario']);
        $registro = $this->modelo->eliminarUsuario();
        if ($registro) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        Vista::mostrar('usuarios', $datos);
    }

}
