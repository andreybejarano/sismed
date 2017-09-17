<?php

class sesionControlador {

    private $modelo;

    public function __construct() {
        $this->modelo = Modelo::cargar('Usuarios');
    }

    public function principal($datos = array()) {
        $datos['titulo'] = "Bienvenido";
        if (!empty($_POST)) :
            if (!empty($_POST['txtLogin']) && !empty($_POST['txtContrasenia'])) :
                $this->modelo->setCorreoEmpleado($_POST['txtLogin']);
                $this->modelo->setContrasenia($_POST['txtContrasenia']);
                $sesion = $this->modelo->verificarUsuario();
                if ($sesion) :
                    session_start();
                    $_SESSION['valido'] = TRUE;
                    $_SESSION['usuario'] = $sesion[0]['nombresEmpleado']." ".$sesion[0]['apellidosEmpleado'];
                    $_SESSION['rol'] = $sesion[0]['roles_idRol'];
                    Vista::mostrar('principal',$datos);
                else:
                    $datos['mensaje'] = "<strong>Error: </strong>Usuario y/o Contraseña Incorrectos";
                    Vista::mostrar('login', $datos);
                endif;
            else:
                $this->validar();
            endif;

        else :
            $this->validar();
        endif;
    }

    public function validar() {
        $datos['titulo'] = "Bienvenido";
        session_start();
        if (!isset($_SESSION['valido'])) :
            Vista::mostrar('login');
        else:
            Vista::mostrar('principal',$datos);
        endif;
    }

    public function cerrarSesion() {
        session_start();
        unset($_SESSION);
        session_destroy();
        header('Location:' . URL_BASE);
    }

}
