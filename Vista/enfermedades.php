<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
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
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>enfermedades/listarEnfermedades', {}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        var cont = 0;
        $.each(datos, function (i, v) {
            cont = cont + 1;
            filas += "<tr>";
            filas += "<td>" + v.nombreEnfermedad + "</td>";
            filas += "<td>" + v.sintomatologiaEnfermedad + "</td>";
            filas += "<td>" + v.tratamientoEnfermedad + "</td>";
            filas += "<td>";
            filas += "<form action='<?php echo URL_BASE; ?>enfermedades/editarEnfermedad' method='POST'>";
            filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEnfermedad'><i class='fa fa-edit'></i></button>";
            filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
            filas += "</form>";
            filas += "</td>";
            filas += "<td>";
            filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEnfermedad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
            filas += "<div class = 'modal fade' id='modalEliminarEnfermedad" + cont + "' tabindex = '-1' role = 'dialog'>";
            filas += "<div class='modal-dialog'>";
            filas += "<div class='modal-content'>";
            filas += "<div class='modal-header'>";
            filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            filas += "<h4 class='modal-title'>Eliminar Enfermedad</h4>";
            filas += "</div>";
            filas += "<div class='modal-body'>";
            filas += "<p>¿Seguro que desea eliminar registro?</p>";
            filas += "</div>";
            filas += "<div class='modal-footer'>";
            filas += "<form action='<?php echo URL_BASE; ?>enfermedades/eliminarEnfermedad' method='POST'>";
            filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
            filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEnfermedad'> Aceptar </button>";
            filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
            filas += "</form>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</td>";
            filas += "</tr>";
        });
        $('#tblEnfermedades tbody').html(filas);
    });

    $('#btnBuscar').click(function () {
        var enfermedad = $('#txtBuscar').val();
        $.post('<?php echo URL_BASE; ?>enfermedades/listarNombreEnfermedad', {enfermedad: enfermedad}, function (data) {
            var datos = JSON.parse(data);
            var filas;
            cont = 0;
            if (datos != false) {
                $.each(datos, function (i, v) {
                    cont = cont + 1;
                    filas += "<tr>";
                    filas += "<td>" + v.nombreEnfermedad + "</td>";
                    filas += "<td>" + v.sintomatologiaEnfermedad + "</td>";
                    filas += "<td>" + v.tratamientoEnfermedad + "</td>";
                    filas += "<td>";
                    filas += "<form action='<?php echo URL_BASE; ?>enfermedades/editarEnfermedad' method='POST'>";
                    filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEnfermedad'><i class='fa fa-edit'></i></button>";
                    filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
                    filas += "</form>";
                    filas += "</td>";
                    filas += "<td>";
                    filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEnfermedad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
                    filas += "<div class = 'modal fade' id='modalEliminarEnfermedad" + cont + "' tabindex = '-1' role = 'dialog'>";
                    filas += "<div class='modal-dialog'>";
                    filas += "<div class='modal-content'>";
                    filas += "<div class='modal-header'>";
                    filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                    filas += "<h4 class='modal-title'>Eliminar Enfermedad</h4>";
                    filas += "</div>";
                    filas += "<div class='modal-body'>";
                    filas += "<p>¿Seguro que desea eliminar registro?</p>";
                    filas += "</div>";
                    filas += "<div class='modal-footer'>";
                    filas += "<form action='<?php echo URL_BASE; ?>enfermedades/eliminarEnfermedad' method='POST'>";
                    filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                    filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEnfermedad'> Aceptar </button>";
                    filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
                    filas += "</form>";
                    filas += "</div>";
                    filas += "</div>";
                    filas += "</div>";
                    filas += "</div>";
                    filas += "</td>";
                    filas += "</tr>";
                });
            } else {
                filas += "<tr>";
                filas += "<td colspan='6'>No existe este Centro de formacion</td>";
                filas += "</tr>";
            }
            $('#tblEnfermedades tbody').html(filas);
        });
    });
</script>

<?php Vista::mostrar('registrarEnfermedad'); ?>

