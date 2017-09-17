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
        if ($_SESSION['rol']== 3 || $_SESSION['rol']== 2) {
            header('location: '.URL_BASE);
        }
        
        $this->modelo = Modelo::cargar('Usuarios');
    }

    public function insertarUsuario() {
        $datos['titulo'] = "Registrar Usuario";
        if (!$_POST) :
            header("location: usuarios");
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
        if (isset($_POST['btnEditarUsuario'])) {
            
            $datos['titulo'] = "Editar usuario";
            $this->modelo->setIdUsuario($_POST['idUsuario']);
            
            if (!isset($_POST['btnGuardar'])) {
                $datos['usuario'] = $this->modelo->listarIdUsuario();
                Vista::mostrar('editarUsuario', $datos);
            } else {
                
                $this->modelo->setContrasenia($_POST['txfContrasenia']);
                $this->modelo->setIdRol($_POST['cmbRol']);
                $this->modelo->setEstadoUsuario($_POST['cmbEstadoUsuario']);
                
                $datos['mensaje'] = $this->modelo->editarUsuario();
                Vista::mostrar('usuarios', $datos);
            }
        }else{
            header("location: usuarios");
        }
    }
    
    public function editarContrasenia (){
            // echo '-'.$_POST['txfContraseniaActual'].'<br>';
            // echo '-'.$_POST['idUsuario'].'<br>';
            $this->modelo->setContrasenia($_POST['txfContraseniaActual']);
            $this->modelo->setIdUsuario($_POST['idUsuario']);
            $respuesta = $this->modelo->verificarContrasenia();
            if ($respuesta)
            {
                $this->modelo->setContrasenia($_POST['txfNuevaContrasenia']);
                $registro = $this->modelo->editarContrasenia();
                if ($registro)
                {
                    $datos['mensaje'] = "Registro Actualizado Correctamente";
                }
                else
                {
                    $datos['mensaje'] = "Fallo La Actualizacion Del Registro";
                }
                Vista::mostrar('usuarios',$datos);   
            } 
            else
            {
                $datos['mensaje'] = "La contraseña actual no corresponde";
                Vista::mostrar('usuarios',$datos);
            }
    }
    

    public function usuarios() {
        $datos['titulo'] = "Usuarios";
        Vista::mostrar('usuarios', $datos);
    }

    public function eliminarUsuario() {
        if (isset($_POST['btnEliminarUsuario'])){
            $this->modelo->setIdUsuario($_POST['idUsuario']);
            $registro = $this->modelo->eliminarUsuario();
            if ($registro) {
                $datos['mensaje'] = "Registro eliminado correctamente";
            } else {
                $datos['mensaje'] = "Error al eliminar registro";
            }
            Vista::mostrar('usuarios', $datos);
        }
        else{
            header("location: usuarios");
        }
        
    }

}
