<?php

session_start();

class TipoOrdenesControlador {

    private $modelo;

    public function __construct() {
        if (!$_SESSION['valido']) {
            header('Location: ' . URL_BASE);
        }
        $this->modelo = Modelo::cargar('TipoOrdenes');
    }

    public function tipoOrdenes() {
        $datos['titulo'] = "TipoOrdenes";
        Vista::mostrar('tipoOrdenes', $datos);
    }

    public function listarTipoOrden() {
        $this->modelo->setTipoOrden($_POST['tipoOrden']);
        echo json_encode($this->modelo->listarTipoOrden(), true);
    }

    public function listarTipoOrdenes() {
        echo json_encode($this->modelo->listarTipoOrdenes(), false);
    }

    public function insertarTipoOrden() {
        $datos['titulo'] = "Registrar Tipo Orden";
        if (!$_POST) :
            Vista::mostrar('registrarTipoOrden', $datos);
        else :
            $this->modelo->setTipoOrden($_POST['txfTipoOrden']);
            $this->modelo->setDescripcionTipoOrden($_POST['txfDescripcionTipoOrden']);
            $registro = $this->modelo->insertarTipoOrden();
            if ($registro) :
                $datos['mensaje'] = "Registro Ingresado Correctamente";
            else :
                $datos['mensaje'] = "No se actualizo Tipo de Orden";
            endif;
            Vista::mostrar('tipoOrdenes', $datos);
        endif;
    }

    public function editarTipoOrden() {
        $datos['titulo'] = "Editar Tipo de Orden";
        $this->modelo->setIdTipoOrden($_POST['idTipoOrden']);
        if (!isset($_POST['btnGuardar'])) {
            $datos['tipoOrden'] = $this->modelo->listarIdTipoOrden();
            Vista::mostrar('editarTipoOrden', $datos);
        } else {
            $this->modelo->setTipoOrden($_POST['txfTipoOrden']);
            $this->modelo->setDescripcionTipoOrden($_POST['txfDescripcionTipoOrden']);
            $registro = $this->modelo->editarTipoOrden();
            if ($registro) {
                $datos['mensaje'] = "Registro actializado correctamente";
            } else {
                $datos['mensaje'] = "Error al actualizar registro";
            }
            Vista::mostrar('tipoOrdenes', $datos);
        }
    }

    public function eliminarTipoOrden() {
        $this->modelo->setIdTipoOrden($_POST['idTipoOrden']);
        $registro = $this->modelo->eliminarTipoOrden();
        if ($registro) {
            $datos['mensaje'] = "Registro eliminado correctamente";
        } else {
            $datos['mensaje'] = "Error al eliminar registro";
        }
        $datos['titulo'] = "Tipo de Orden";
        Vista::mostrar('tipoOrdenes', $datos);
    }

}


