<div id="modalRegistrarBeneficiario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Beneficiario</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'beneficiarios/insertarBeneficiario'; ?>">
                    <div class="form-group">
                        <label for="txfIdentificacionBeneficiario">Numero de Documento</label>
                        <input type="text" id="txfIdentificacionBeneficiario" name="txfIdentificacionBeneficiario" class="form-control" placeholder="Numero de Documento" required>
                    </div>
                    <div class="form-group">
                        <label for="cmbTipoDocumento">Tipo Documento</label>
                        <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                            <option value="">Tipo Documento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfNombresBeneficiario">Nombres</label>
                        <input type="text" id="txfNombresBeneficiario" name="txfNombresBeneficiario" class="form-control" placeholder="Nombres: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfApellidosBeneficiario">Apellidos</label>
                        <input type="text" id="txfApellidosBeneficiario" name="txfApellidosBeneficiario" class="form-control" placeholder="Apellidos: " required>
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
                        <label for="txfFechaNacimientoBeneficiario">Fecha nacimiento</label>
                        <input type="text" id="txfFechaNacimientoBeneficiario" name="txfFechaNacimientoBeneficiario" class="form-control" placeholder="Fecha Nacimiento: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbIdFuncionario">Documento funcionario</label>
                        <select class="form-control" name="cmbIdFuncionario" id="cmbIdFuncionario" required>
                            <option value="">Seleccione Funcionario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfDireccionBeneficiario">Direccion</label>
                        <input type="text" id="txfDireccionBeneficiario" name="txfDireccionBeneficiario" class="form-control" placeholder="Direccion: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfTelefonoBeneficiario">Telefono</label>
                        <input type="text" id="txfTelefonoBeneficiario" name="txfTelefonoBeneficiario" class="form-control" placeholder="Telefono: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfMovilBeneficiario">Movil</label>
                        <input type="text" id="txfMovilBeneficiario" name="txfMovilBeneficiario" class="form-control" placeholder="Movil: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfCorreoBeneficiario">Correo electronico</label>
                        <input type="text" id="txfCorreoBeneficiario" name="txfCorreoBeneficiario" class="form-control" placeholder="Correo electronico: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbCronico">Cronico</label>
                        <select class="form-control" name="cmbCronico" id="cmbCronico">
                            <option value="1">Cronico</option>
                            <option value="0">No cronico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbEstadoBeneficiario">Estado</label>
                        <select class="form-control" name="cmbEstadoBeneficiario" id="cmbEstadoBeneficiario">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarBeneficiario" id="btnRegistrarBeneficiario"> ENVIAR </button>
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

    $.post('<?php echo URL_BASE; ?>funcionarios/listarFuncionarios', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbIdFuncionario').append('<option value="' + v.idFuncionario + '">' + v.numeroIdentificacionFuncionario + '</option>');
        });
    });

</script>
