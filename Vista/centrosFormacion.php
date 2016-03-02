<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <div class="row" >
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

        <div class="row" style="margin-top: 5%"></div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                    <input type="text" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Nombre centro">
                    <span class="input-group-btn">
                        <button class="btn btn-info" id="btnBuscar" type="button">Buscar</button>
                    </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-info col-xs-12" data-toggle="modal" data-target="#modalRegistrarCentroFormacion"> Crear </button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Centros de formacion</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tblCentrosFormacion" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Nombre Centro de formacion
                                </th>
                                <th>
                                    Sigla
                                </th>
                                <th>
                                    direccion
                                </th>
                                <th>
                                    Telefono
                                </th>
                                <th>
                                    Regional
                                </th>
                                <th>
                                    Zona
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
    $.post('<?php echo URL_BASE; ?>centrosFormacion/listarCentrosFormacion', {}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        var cont = 0;
        $.each(datos, function (i, v) {
            cont = cont + 1;
            filas += "<tr>";
            filas += "<td>" + v.nombreCentroFormacion + "</td>";
            filas += "<td>" + v.sigla + "</td>";
            filas += "<td>" + v.direccionCentroFormacion + "</td>";
            filas += "<td>" + v.telefonoCentroFormacion + "</td>";
            filas += "<td>" + v.nombreRegional + "</td>";
            filas += "<td>" + v.nombreZona + "</td>";
            filas += "<td>";
            filas += "<form action='<?php echo URL_BASE; ?>centrosFormacion/editarCentroFormacion' method='POST'>";
            filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCentroFormacion'><i class='fa fa-edit'></i></button>";
            filas += "<input type='hidden' name='idCentroFormacion' value='" + v.idCentroFormacion + "'>";
            filas += "</form>";
            filas += "</td>";
            filas += "<td>";
            filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarCentroFormacion" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
            filas += "<div class = 'modal fade' id='modalEliminarCentroFormacion" + cont + "' tabindex = '-1' role = 'dialog'>";
            filas += "<div class='modal-dialog'>";
            filas += "<div class='modal-content'>";
            filas += "<div class='modal-header'>";
            filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            filas += "<h4 class='modal-title'>Eliminar CentroFormacion</h4>";
            filas += "</div>";
            filas += "<div class='modal-body'>";
            filas += "<p>¿Seguro que desea eliminar registro?</p>";
            filas += "</div>";
            filas += "<div class='modal-footer'>";
            filas += "<form action='<?php echo URL_BASE; ?>centrosFormacion/eliminarCentroFormacion' method='POST'>";
            filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
            filas += "<button class='btn btn-primary' type='submit' name='btnEliminarCentroFormacion'> Aceptar </button>";
            filas += "<input type='hidden' name='idCentroFormacion' value='" + v.idCentroFormacion + "'>";
            filas += "</form>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</td>";
            filas += "</tr>";
        });
        $('#tblCentrosFormacion tbody').html(filas);
    });

    $('#btnBuscar').click(function () {
        var centroFormacion = $('#txtBuscar').val();
        $.post('<?php echo URL_BASE; ?>centrosFormacion/listarNombreCentroFormacion', {centroFormacion: centroFormacion}, function (data) {
            var datos = JSON.parse(data);
            var filas;
            cont = 0;
            if (datos != false) {
                $.each(datos, function (i, v) {
                    cont = cont + 1;
                    filas += "<tr>";
                    filas += "<td>" + v.nombreCentroFormacion + "</td>";
                    filas += "<td>" + v.sigla + "</td>";
                    filas += "<td>" + v.direccionCentroFormacion + "</td>";
                    filas += "<td>" + v.telefonoCentroFormacion + "</td>";
                    filas += "<td>" + v.nombreRegional + "</td>";
                    filas += "<td>" + v.nombreZona + "</td>";
                    filas += "<td>";
                    filas += "<form action='<?php echo URL_BASE; ?>centrosFormacion/editarCentroFormacion' method='POST'>";
                    filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCentroFormacion'><i class='fa fa-edit'></i></button>";
                    filas += "<input type='hidden' name='idCentroFormacion' value='" + v.idCentroFormacion + "'>";
                    filas += "</form>";
                    filas += "</td>";
                    filas += "<td>";
                    filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarCentroFormacion" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
                    filas += "<div class = 'modal fade' id='modalEliminarCentroFormacion" + cont + "' tabindex = '-1' role = 'dialog'>";
                    filas += "<div class='modal-dialog'>";
                    filas += "<div class='modal-content'>";
                    filas += "<div class='modal-header'>";
                    filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                    filas += "<h4 class='modal-title'>Eliminar CentroFormacion</h4>";
                    filas += "</div>";
                    filas += "<div class='modal-body'>";
                    filas += "<p>¿Seguro que desea eliminar registro?</p>";
                    filas += "</div>";
                    filas += "<div class='modal-footer'>";
                    filas += "<form action='<?php echo URL_BASE; ?>centrosFormacion/eliminarCentroFormacion' method='POST'>";
                    filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                    filas += "<button class='btn btn-primary' type='submit' name='btnEliminarCentroFormacion'> Aceptar </button>";
                    filas += "<input type='hidden' name='idCentroFormacion' value='" + v.idCentroFormacion + "'>";
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
            $('#tblCentrosFormacion tbody').html(filas);
        });
    });
</script>

<?php Vista::mostrar('registrarCentroFormacion'); ?>

