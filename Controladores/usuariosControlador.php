<?php

class usuariosControlador {

    private $modelo;
    private $modelo2;

    public function insertarUsuario() {
        require_once '../Modelos/Usuarios.php';
        require_once '../Modelos/Empleados.php';
        $this->modelo = new Usuarios();
        $this->modelo2 = new Empleados();
        if (isset($_POST['btnCrearUsuario'])) {
            $roles = $this->modelo->listarRoles();
            $empleados = $this->modelo2->listarEmpleados();
            require '../Vistas/registrarUsuario.php';
        } else if (isset($_POST['btnRegistrarUsuario'])) {
            $nombresUsuario = $_POST['txfNombresUsuario'];
            $apellidosUsuario = $_POST['txfApellidosUsuario'];
            $inicioSesion = $_POST['txfLogin'];
            $contrasenia = $_POST['txfContrasenia'];
            $confContrasenia = $_POST['txfContraseniaConf'];
            $idRol = $_POST['cmbRol'];
            $idEmpleado = $_POST['cmbIdentificacionEmpleado'];
            $this->modelo->setNombresUsuario($nombresUsuario);
            $this->modelo->setApellidosUsuario($apellidosUsuario);
            $this->modelo->setInicioSesion($inicioSesion);
            $this->modelo->setContrasenia($contrasenia);
            $this->modelo->setIdRol($idRol);
            $this->modelo->setIdEmpleado($idEmpleado);
            $registro = $this->modelo->insertarUsuario();
            if ($registro) {
                session_start();
                $_SESSION['mensaje'] = "Usuario: " . $nombresUsuario . " " . $apellidosUsuario . " registrado correctamente";
                header('Location: ../Vistas/Usuarios.php');
            }
        }
    }

    public function listarUsuarios() {
        require_once '../Modelos/Usuarios.php';
        if (isset($_POST['btnConsultarUsuarios'])) {
            $this->modelo = new Usuarios();
            $usuarios = $this->modelo->listarUsuarios();
            if (!$usuarios) {
                session_start();
                $_SESSION['mensaje'] = "No existen usuarios registrados en la base de datos";
                header('Location: ../Vistas/Usuarios.php');
            } else {
                require '../Vistas/consultarUsuario.php';
            }
        }
    }

    public function editarUsuario() {
        require_once '../Modelos/Usuarios.php';
        $this->modelo = new Usuarios();
        $this->modelo->setIdUsuario($_POST['idUsuario']);
        if (isset($_POST['btnEditarUsuario'])) {
            $datos = $this->modelo->listarIdUsuario();
            require_once '../vistas/editarUsuario.php';
        } else {
            $this->modelo->editarUsuario();
            session_start();
            $_SESSION['mensaje'] = "Se edito usuario correctamente";
            header('Location: ../Vistas/Usuarios.php');
        }
    }

}

$usuario = new usuariosControlador();
if (!empty($_POST['metodo'])) {
    $nombreMetodo = $_POST['metodo'];
    $datos = $usuario->$nombreMetodo();
}



