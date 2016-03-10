<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
?>


<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan') ?>
        <div class="row" style="margin-top: 5%"></div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                    <input type="text" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Numero de documento">
                    <span class="input-group-btn">
                        <button class="btn btn-info" id="btnBuscar" type="button">Buscar</button>
                    </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-info col-xs-12" data-toggle="modal" data-target="#modalRegistrarCitaMedica">Crear</button>
            </div>
        </div>

        <div class="row" style="margin-top: 10px"></div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Citas medicas</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tblCitasMedicas" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Número de documento
                                </th>
                                <th>
                                    Nombres
                                </th>
                                <th>
                                    Apellidos
                                </th>
                                <th>
                                    Hora cita
                                </th>
                                <th>
                                    Consultorio
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th colspan="2">
                                    Acciones
                                </th>
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
    $.post('<?php echo URL_BASE; ?>beneficiarios/listarBeneficiarios', {}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        var cont = 0;
        $.each(datos, function (i, v) {
            cont = cont + 1;
            filas += "<tr>";
            filas += "<td>" + v.numeroIdentificacionBeneficiario + "</td>";
            filas += "<td>" + v.tipoDocumento + "</td>";
            filas += "<td>" + v.nombresBeneficiario + "</td>";
            filas += "<td>" + v.apellidosBeneficiario + "</td>";
            filas += "<td>" + v.tipoGenero + "</td>";
            filas += "<td>" + v.fechaNacimientoBeneficiario + "</td>";
            filas += "<td>" + v.numeroIdentificacionFuncionario + "</td>";
            filas += "<td>" + v.nombresFuncionario + " " + v.apellidosFuncionario + "</td>";
            filas += "<td>" + v.direccionBeneficiario + "</td>";
            filas += "<td>" + v.telefonoBeneficiario + "</td>";
            filas += "<td>" + v.movilBeneficiario + "</td>";
            filas += "<td>" + v.correoBeneficiario + "</td>";
            filas += "<td>" + v.estadoBeneficiario + "</td>";
            filas += "<td>";
            filas += "<form action='<?php echo URL_BASE; ?>beneficiarios/editarBeneficiario' method='POST'>";
            filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarBeneficiario'><i class='fa fa-edit'></i></button>";
            filas += "<input type='hidden' name='idBeneficiario' value='" + v.idBeneficiario + "'>";
            filas += "</form>";
            filas += "</td>";
            filas += "<td>";
            filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarBeneficiario" + cont + "' name='btnModalEliminarBeneficiario'><i class='fa fa-close'></i></button>";
            filas += "<div class = 'modal fade' id='modalEliminarBeneficiario" + cont + "' tabindex = '-1' role = 'dialog'>";
            filas += "<div class='modal-dialog'>";
            filas += "<div class='modal-content'>";
            filas += "<div class='modal-header'>";
            filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            filas += "<h4 class='modal-title'>Eliminar Beneficiario</h4>";
            filas += "</div>";
            filas += "<div class='modal-body'>";
            filas += "<p>¿Seguro que desea eliminar registro?</p>";
            filas += "</div>";
            filas += "<div class='modal-footer'>";
            filas += "<form action='<?php echo URL_BASE; ?>beneficiarios/eliminarBeneficiario' method='POST'>";
            filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
            filas += "<button class='btn btn-primary' type='submit' name='btnEliminarBeneficiario'> Aceptar </button>";
            filas += "<input type='hidden' name='idBeneficiario' value='" + v.idBeneficiario + "'>";
            filas += "</form>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</div>";
            filas += "</td>";
            filas += "</tr>";
        });
        $('#tblBeneficiarios tbody').html(filas);
    });

    $('#btnBuscar').click(function () {
        var beneficiario = $('#txtBuscar').val();
        $.post('<?php echo URL_BASE; ?>beneficiarios/listarDocumentoBeneficiario', {beneficiario: beneficiario}, function (data) {
            var datos = JSON.parse(data);
            var cont = 0;
            if (datos != false) {
                var filas;
                $.each(datos, function (i, v) {
                    cont = cont + 1;
                    filas += "<tr>";
                    filas += "<td>" + v.numeroIdentificacionBeneficiario + "</td>";
                    filas += "<td>" + v.tipoDocumento + "</td>";
                    filas += "<td>" + v.nombresBeneficiario + "</td>";
                    filas += "<td>" + v.apellidosBeneficiario + "</td>";
                    filas += "<td>" + v.tipoGenero + "</td>";
                    filas += "<td>" + v.fechaNacimientoBeneficiario + "</td>";
                    filas += "<td>" + v.numeroIdentificacionFuncionario + "</td>";
                    filas += "<td>" + v.nombresFuncionario + " " + v.apellidosFuncionario + "</td>";
                    filas += "<td>" + v.direccionBeneficiario + "</td>";
                    filas += "<td>" + v.telefonoBeneficiario + "</td>";
                    filas += "<td>" + v.movilBeneficiario + "</td>";
                    filas += "<td>" + v.correoBeneficiario + "</td>";
                    filas += "<td>" + v.estadoBeneficiario + "</td>";
                    filas += "<td>";
                    filas += "<form action='<?php echo URL_BASE; ?>beneficiarios/editarBeneficiario' method='POST'>";
                    filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarBeneficiario'><i class='fa fa-edit'></i></button>";
                    filas += "<input type='hidden' name='idBeneficiario' value='" + v.idBeneficiario + "'>";
                    filas += "</form>";
                    filas += "</td>";
                    filas += "<td>";
                    filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarBeneficiario" + cont + "' name='btnModalEliminarBeneficiario'><i class='fa fa-close'></i></button>";
                    filas += "<div class = 'modal fade' id='modalEliminarBeneficiario" + cont + "' tabindex = '-1' role = 'dialog'>";
                    filas += "<div class='modal-dialog'>";
                    filas += "<div class='modal-content'>";
                    filas += "<div class='modal-header'>";
                    filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                    filas += "<h4 class='modal-title'>Eliminar Beneficiario</h4>";
                    filas += "</div>";
                    filas += "<div class='modal-body'>";
                    filas += "<p>¿Seguro que desea eliminar registro?</p>";
                    filas += "</div>";
                    filas += "<div class='modal-footer'>";
                    filas += "<form action='<?php echo URL_BASE; ?>beneficiarios/eliminarBeneficiario' method='POST'>";
                    filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                    filas += "<button class='btn btn-primary' type='submit' name='btnEliminarBeneficiario'> Aceptar </button>";
                    filas += "<input type='hidden' name='idBeneficiario' value='" + v.idBeneficiario + "'>";
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
                filas += "<td colspan='6'>No existe Beneficiario con este Numero de documento</td>";
                filas += "</tr>";
            }
            $('#tblBeneficiarios tbody').html(filas);
        });
    });
</script>

<?php Vista::mostrar('registrarBeneficiario', $datos); ?>