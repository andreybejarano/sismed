<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controlador
 *
 * @author Cristian Gómez
 */
class Controlador {

    public static function principal() {

        //Invoco a las clases del Nucleo
        require 'Configuracion.php';
        require 'Modelo.php';
        require 'Vista.php';

        //Componemos el Nombre del Controlador
        //http://localhost/atumesa/index.php?controlador=Bienvenido&metodo=principal
        //http://localhost/atumesa/bienvenido/principal/2
        if (!empty($_GET['controlador']))
            $nombreControlador = $_GET['controlador'] . 'Controlador';
        else
            $nombreControlador = CONTROLADOR_PRINCIPAL . 'Controlador';

        if (!empty($_GET['metodo']))
            $nombreMetodo = $_GET['metodo'];
        else
            $nombreMetodo = 'principal';

        //Construimos la Ruta del Controlador
        $rutaControlador = DIRECTORIO_CONTROLADORES . $nombreControlador . '.php';

        //verificamos si existe el controlador
        if (is_file($rutaControlador))
            require $rutaControlador;
        else
            exit('El controlador ' . $rutaControlador . ' No existe - 404');

        //Verificamos si es ejecutable el metodo
        if (is_callable(array($nombreControlador, $nombreMetodo) == FALSE)) {
            trigger_error($nombreControlador . '->' . $nombreMetodo . ' No existe', E_USER_ERROR);
            return FALSE;
        }

        $controlador = new $nombreControlador();
        $controlador->$nombreMetodo();
    }

}
