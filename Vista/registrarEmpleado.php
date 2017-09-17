<div id="modalRegistrarEmpleado" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Empleado</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'empleados/insertarEmpleado'; ?>">
                    <div class="form-group">
                        <label for="txfIdentificacionEmpleado">Numero de Documento</label>
                        <input type="text" id="txfIdentificacionEmpleado" name="txfIdentificacionEmpleado" class="form-control" placeholder="Numero de Documento" required>
                    </div>
                    <div class="form-group">
                        <label for="cmbTipoDocumento">Tipo Documento</label>
                        <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                            <option value="">Tipo Documento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfNombresEmpleado">Nombres</label>
                        <input type="text" id="txfNombresEmpleado" name="txfNombresEmpleado" class="form-control" placeholder="Nombres: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfApellidosEmpleado">Apellidos</label>
                        <input type="text" id="txfApellidosEmpleado" name="txfApellidosEmpleado" class="form-control" placeholder="Apellidos: " required>
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
                        <label for="txfFechaNacimientoEmpleado">Fecha nacimiento</label>
                        <input type="text" id="txfFechaNacimientoEmpleado" name="txfFechaNacimientoEmpleado" class="form-control" placeholder="Fecha Nacimiento: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfTarjetaProfesional">Tarjeta profesional</label>
                        <input type="text" id="txfTarjetaProfesional" name="txfTarjetaProfesional" class="form-control" placeholder="Tarjeta profesional: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbCargo">Cargo</label>
                        <select class="form-control" name="cmbCargo" id="cmbCargo" required>
                            <option value="">Seleccione cargo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbEspecialidad">Especialidad</label>
                        <select class="form-control" name="cmbEspecialidad" id="cmbEspecialidad" required>
                            <option value="">Seleccione especialidad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfDireccionEmpleado">Direccion</label>
                        <input type="text" id="txfDireccionEmpleado" name="txfDireccionEmpleado" class="form-control" placeholder="Tarjeta profesional: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfTelefonoEmpleado">Telefono</label>
                        <input type="number" id="txfTelefonoEmpleado" name="txfTelefonoEmpleado" class="form-control" placeholder="Telefono: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfMovilEmpleado">Movil</label>
                        <input type="number" id="txfMovilEmpleado" name="txfMovilEmpleado" class="form-control" placeholder="Movil: " required>
                    </div>
                    <div class="form-group">
                        <label for="txfCorreoEmpleado">Correo electronico</label>
                        <input type="email" id="txfCorreoEmpleado" name="txfCorreoEmpleado" class="form-control" placeholder="Correo electronico: " required>
                    </div>
                    <div class="form-group">
                        <label for="cmbEstadoEmpleado">Estado</label>
                        <select class="form-control" name="cmbEstadoEmpleado" id="cmbEstadoEmpleado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarEmpleado" id="btnRegistrarEmpleado"> ENVIAR </button>
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

    $.post('<?php echo URL_BASE; ?>cargos/listarCargos', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbCargo').append('<option value="' + v.idCargo + '">' + v.descripcionCargo + '</option>');
        });
    });

    $.post('<?php echo URL_BASE; ?>especialidades/listarEspecialidades', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (ind, val) {
            $('#cmbEspecialidad').append('<option value="' + val.idEspecialidad + '">' + val.descripcionEspecialidad + '</option>');
        });
    });
    
    $('#txfFechaNacimientoEmpleado').datetimepicker({
        timepicker: false,
	    format: 'Y-m-d',
	    maxDate:'0'
    });


</script>
