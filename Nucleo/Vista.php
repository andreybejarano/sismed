<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vista
 *
 * @author Cristian Gómez
 */
class Vista {
    
    public static function mostrar($nombreVista, $datos=array()) {
        
        //construyo la ruta de la vista
        $rutaVista = DIRECTORIO_VISTAS.$nombreVista.'.php';
        
        //Evaluo si la Vista Existe
        if (is_file($rutaVista)==FALSE) {
            trigger_error('Vista '.$rutaVista.' no existe',E_USER_NOTICE);
        }
        
        //trato el arreglo de datos
        if(is_array($datos)){
            foreach ($datos as $indice => $valor) {
                $$indice = $valor;
            }   
            require $rutaVista;
        }
    }    
}
