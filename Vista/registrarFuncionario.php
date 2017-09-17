<div id="modalRegistrarFuncionario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Funcionario</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'funcionarios/insertarFuncionario'; ?>">
                    <div class="form-group">
                        <label for="txfIdentificacionFuncionario">Numero de Documento</label>
                        <input type="text" id="txfIdentificacionFuncionario" name="txfIdentificacionFuncionario" class="form-control" placeholder="Numero de Documento" required>
                    </div>
                    <div class="form-group">
                        <label for="cmbTipoDocumento">Tipo Documento</label>
                        <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                            <option value="">Tipo Documento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfNombresFuncionario">Nombres</label>
                        <input type="text" id="txfNombresFuncionario" name="txfNombresFuncionario" class="form-control" placeholder="Nombres: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfApellidosFuncionario">Apellidos</label>
                        <input type="text" id="txfApellidosFuncionario" name="txfApellidosFuncionario" class="form-control" placeholder="Apellidos: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbGenero">Genero</label>
                        <select class="form-control" name="cmbGenero" id="cmbGenero" required>
                            <option value="">Seleccione Genero</option>
                            <option value="1">Femenino</option>
                            <option value="2">Masculino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfFechaNacimientoFuncionario">Fecha nacimiento</label>
                        <input type="text" id="txfFechaNacimientoFuncionario" name="txfFechaNacimientoFuncionario" class="form-control" placeholder="Fecha Nacimiento: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbRegional">Regional</label>
                        <select class="form-control" name="cmbRegional" id="cmbRegional" required>
                            <option value="">Seleccione Regional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbCentroFormacion">Centro de formacion</label>
                        <select disabled class="form-control" name="cmbCentroFormacion" id="cmbCentroFormacion" required>
                            <option value="">Seleccione Centro de formacion</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfDireccionFuncionario">Direccion</label>
                        <input type="text" id="txfDireccionFuncionario" name="txfDireccionFuncionario" class="form-control" placeholder="Direccion: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfTelefonoFuncionario">Telefono</label>
                        <input type="number" id="txfTelefonoFuncionario" name="txfTelefonoFuncionario" class="form-control" placeholder="Telefono: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfMovilFuncionario">Movil</label>
                        <input type="number" id="txfMovilFuncionario" name="txfMovilFuncionario" class="form-control" placeholder="Movil: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfCorreoFuncionario">Correo electronico</label>
                        <input type="email" id="txfCorreoFuncionario" name="txfCorreoFuncionario" class="form-control" placeholder="Correo electronico: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbEstadoFuncionario">Estado</label>
                        <select class="form-control" name="cmbEstadoFuncionario" id="cmbEstadoFuncionario">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarFuncionario" id="btnRegistrarFuncionario"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>tipos/listarTipoDocumento', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbTipoDocumento').append('<option value="' + v.idTipoDocumento + '">' + v.tipoDocumento + '</option>');
        });
    });

    $.post('<?php echo URL_BASE; ?>regionales/listarRegionales', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbRegional').append('<option value="' + v.idRegional + '">' + v.nombreRegional + '</option>');
        });
    });

    $('#cmbRegional').change(function () {
        var idRegional = $(this).val();
        $('#cmbCentroFormacion').removeAttr('disabled')
        $.post('<?php echo URL_BASE; ?>centrosFormacion/listarCentroFormacionRegional', {idRegional: idRegional}, function (data) {
            var datos = JSON.parse(data);
            $.each(datos, function (ind, val) {
                $('#cmbCentroFormacion').append('<option value="' + val.idCentroFormacion + '">' + val.nombreCentroFormacion + '</option>');
            });
        });
    });
    
    $('#txfFechaNacimientoFuncionario').datetimepicker({
        timepicker: false,
	    format: 'Y-m-d',
	    maxDate:'0'
    });

</script>
