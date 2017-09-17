<?php
session_start();
class bienvenidoControlador {
    
    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: '.URL_BASE);
        };
    }
    
    public function principal() {
        $datos['titulo'] = "Bienvenido";
        Vista::mostrar('principal',$datos);
    }
}
