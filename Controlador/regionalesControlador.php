<?php

class regionalesControlador {
    
    private $modelo;
    
    public function __construct() {
        $this->modelo = Modelo::cargar('Regionales');
    }
    
    public function listarRegionales() {
        echo json_encode($this->modelo->listarRegionales(), TRUE);
    }
    
}
