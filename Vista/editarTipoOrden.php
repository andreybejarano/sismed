<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header bg-info letraTitulos">
                    SISMED <small>Cuidarte es nuestro deber</small>
                </h1>
                <ul >
                    <li class="letraTitulos">
                        Sistema de gestión de citas y formulación médica
                    </li>
                </ul>
            </div>
            <div class="col-lg-2">
                <img src="<?php echo URL_BASE; ?>Vista/img/logo2.png" alt="" class="img-responsive" style="max-widht:150px; max-height:150px;">
            </div>
        </div>
        <form action="<?php echo URL_BASE . 'tipoOrdenes/editarTipoOrden'; ?>" method="POST" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <legend>Editar Tipo Orden</legend>
            <div class="form-group">
                <label for="txfTipoOrden">Tipo de Orden: </label>
                <input class="form-control" type="text" name="txfTipoOrden" id="txfTipoOrden" value="<?php echo $tipoOrden[0]['tipoOrden']; ?>">
            </div>
            <div class="form-group">
                <label for="txfDescripcionTipoOrden">Descripcion Tipo de Orden</label>
                <input type="text" id="txfDescripcionTipoOrden" name="txfDescripcionTipoOrden" value="<?php echo $tipoOrden[0]['descripcionTipoOrden']; ?>" class="form-control">
                <span id="errorPasswors" hidden style="color: red"></span>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <input type="hidden" name="idTipoOrden" value="<?php echo $tipoOrden[0]['idTipoOrden']; ?>">
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'tipoOrdenes/tipoOrdenes'; ?>">ATRAS</a></button>
        </form>
        <div class="row" style="margin-top: 40%"></div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>