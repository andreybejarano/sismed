<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan'); ?>

        <div class="row" style="margin-top: 5%"></div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                    <input type="text" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Nombre Enfermedad">
                    <span class="input-group-btn">
                        <button class="btn btn-info" id="btnBuscar" type="button">Buscar</button>
                    </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-info col-xs-12" data-toggle="modal" data-target="#modalRegistrarEnfermedad"> Crear </button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Enfermedades</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tblEnfermedades" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Sintomatologia
                                </th>
                                <th>
                                    Tratamiento
                                </th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie', $datos); ?>
<script type="text/javascript" src="<?php echo URL_BASE; ?>Vista/js/enfermedades.js"></script>
<?php Vista::mostrar('registrarEnfermedad'); ?>