<?php

class tiposControlador {
    
    private $modelo;
    
    public function __construct() {
        $this->modelo = Modelo::cargar('Tipos');
    }
    
    public function listarTipoDocumento() {
        echo json_encode($this->modelo->listarTipoDocumento(), TRUE);
    }
    
}
