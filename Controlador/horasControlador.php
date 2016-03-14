<?php

session_start();

class horasControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('Horas20');
    }

    public function listarHoras() {
        echo json_encode($this->modelo->listarHoras(), TRUE);
    }

}
