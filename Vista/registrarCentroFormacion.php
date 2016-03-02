<div id="modalRegistrarCentroFormacion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar centro de formacion</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'CentrosFormacion/insertarCentroFormacion'; ?>">
                    <div class="form-group">
                        <label for="txfNombreCentroFormacion">Nombre </label>
                        <input type="text" id="txfNombreCentroFormacion" name="txfNombreCentroFormacion" class="form-control" placeholder="Nombre centro de formacion" required>
                    </div>
                    <div class="form-group">
                        <label for="txfSigla">Sigla</label>
                        <input type="text" id="txfSigla" name="txfSigla" class="form-control" placeholder="Sigla" required>
                    </div>
                    <div class="form-group">
                        <label for="txfDireccionCentroFormacion">Direccion</label>
                        <input type="text" id="txfDireccionCentroFormacion" name="txfDireccionCentroFormacion" class="form-control" placeholder="Direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="txfTelefonoCentroFormacion">Telefono</label>
                        <input type="text" id="txfTelefonoCentroFormacion" name="txfTelefonoCentroFormacion" class="form-control" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="cmbRegionales">Regional</label>
                        <select class="form-control" name="cmbRegionales" id="cmbRegionales" required>
                            <option value="">Seleccione Regional</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarCentroFormacion" id="btnRegistrarCentroFormacion"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>regionales/listarRegionales', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (ind, val) {
            $('#cmbRegionales').append('<option value="' + val.idRegional + '">' + val.nombreRegional + '</option>');
        });
    });
</script>
