<?php

class Empleados {

    private $idEmpleado;
    private $identiicacionEmpleado;
    private $nombresEmpleado;
    private $apellidosEmpleado;
    private $conexion;
    
    function __construct() {
        $this->conexion = new Conexiones();
    }

    public function listarEmpleados() {
        $sql = "SELECT idEmpleado, 
                numeroIdentificacionEmpleado, 
                tipoDocumento, 
                nombresEmpleado, 
                apellidosEmpleado, 
                fechaNacimientoEmpleado, 
                tarjetaProfesionalEmpleado, 
                descripcionCargo, 
                descripcionEspecialidad, 
                tipoGenero 
                FROM empleados 
                INNER JOIN tipos_documentos ON idTipoDocumento = tipos_documentos_idTipoDocumento 
                INNER JOIN cargos ON cargos_idCargo = idCargo 
                INNER JOIN especialidades ON especialidades_idEspecialidad = idEspecialidad 
                INNER JOIN generos ON generos_idGenero = idGenero;";
        return $this->conexion->consulta($sql);
    }

}
