<?php

session_start();

class historialMedicoControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Consultas');
    }

    public function historial() {
        $datos['titulo'] = "Historial Medico";
        Vista::mostrar('historialMedico', $datos);
    }

}
