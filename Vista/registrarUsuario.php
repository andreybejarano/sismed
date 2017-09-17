<div id="modalRegistrarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar usuario</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'usuarios/insertarUsuario'; ?>">
                    <div class="form-group">
                        <label for="cmbIdentificacionEmpleado">Identifiación Empleado</label>
                        <select class="form-control" name="cmbIdentificacionEmpleado" id="cmbIdentificacionEmpleado" required>
                            <option value="">Seleccione empleado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txfContrasenia">Contraseña</label>
                        <input type="password" id="txfContrasenia" name="txfContrasenia" class="form-control" placeholder="Contraseña: " maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="txfContraseniaConf">Contraseña</label>
                        <input type="password" id="txfContraseniaConf" name="txfContraseniaConf" class="form-control" placeholder="Contraseña: " maxlength="16" required>
                        <span id="errorPasswors" hidden style="color: red"></span>
                    </div>
                    <div class="form-group">
                        <label for="cmbRol">Roles</label>
                        <select class="form-control" name="cmbRol" id="cmbRol" required>
                            <option value="">Seleccione Rol</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbEstadoUsuario">Estado</label>
                        <select class="form-control" name="cmbEstadoUsuario" id="cmbEstadoUsuario">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button disabled type="submit" class="btn btn-primary" name="btnRegistrarUsuario" id="btnRegistrarUsuario"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>empleados/listarEmpleados', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbIdentificacionEmpleado').append('<option value="' + v.idEmpleado + '">' + v.numeroIdentificacionEmpleado + ' - ' + v.nombresEmpleado + ' ' + v.apellidosEmpleado + '</option>');
        });
    });

    $.post('<?php echo URL_BASE; ?>roles/listarRoles', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (ind, val) {
            $('#cmbRol').append('<option value="' + val.idRol + '">' + val.nombreRol + '</option>');
        });
    });

    $('#txfContraseniaConf').keyup(function () {
        var pass1 = $('#txfContrasenia').val();
        var pass2 = $('#txfContraseniaConf').val();
        if (pass1 != pass2) {
            if (pass2 === '') {
                $('#errorPasswors').removeAttr('hidden');
                $('#btnRegistrarUsuario').prop('disabled', true);
                $('#errorPasswors').html(' ');
            } else {
                $('#errorPasswors').removeAttr('hidden');
                $('#btnRegistrarUsuario').prop('disabled', true);
                $('#errorPasswors').html('Las contraseñas no coinciden');
            }
        } else {
            $('#btnRegistrarUsuario').removeAttr('disabled');
            $('#errorPasswors').html(' ');
        }
    });
</script>
