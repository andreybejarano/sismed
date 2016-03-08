<?php

class Conexiones {

    private static $configuracion = 'cfg/configuracion.ini';
    private $conexion;

    function __construct() {
        $ajustes = parse_ini_file(self::$configuracion, TRUE);
        if (!$ajustes) {
            exit('Error al leer el archivo de configuracion ' . self::$configuracion);
        }

        $servidor = $ajustes['conexion']['servidor'];
        $puerto = $ajustes['conexion']['puerto'];
        $bd = $ajustes['conexion']['bd'];
        $usuario = $ajustes['conexion']['usuario'];
        $contrasena = $ajustes['conexion']['contrasena'];
        $dsn = "mysql:host=$servidor;port=$puerto;dbname=$bd;charset=utf8";

        try {
            $this->conexion = new PDO($dsn, $usuario, $contrasena);
            $this->conexion->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            exit('Error al conectar a la base de datos: ' . $e->getMessage());
        }
    }

    //Metodo para realizar una consulta tipo INSERT, UPDATE o DELETE;
    public function consultaSimple($sql) {
        $consulta = $this->conexion->query($sql);
        if (!$consulta) {
            $error = $this->conexion->errorInfo();
            exit('Error en la consulta (' . $error[0] . '): ' . $error[2]);
        }
        $filas = $consulta->rowCount();
        if ($filas > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Metodo que retorna un arreglo con datos de un SELECT
    public function consulta($sql) {
        $consulta = $this->conexion->query($sql);
        if (!$consulta) {
            $error = $this->conexion->errorInfo();
            exit('Error en la consulta (' . $error[0] . '): ' . $error[2]);
        }
        $filas = $consulta->rowCount();
        if ($filas > 1) {
            $registros = array();
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                array_push($registros, $registro);
            }
            return $registros;
        } elseif ($filas == 1) {
            $registros = array();
            array_push($registros, $consulta->fetch(PDO::FETCH_ASSOC));
            return $registros;
        } else {
            return FALSE;
        }
    }

    public function __destruct() {
        unset($this->conexion);
    }

}