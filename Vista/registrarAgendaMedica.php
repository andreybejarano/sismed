<div id="modalRegistrarAgendaMedica" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Agenda Medica</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'agendasMedicas/insertarAgendaMedica'; ?>">
                    <div class="form-group">
                        <label for="txfFechaAgendaMedica">Fecha agenda:</label>
                        <input type="text" name="txfFechaAgendaMedica" id="txfFechaAgendaMedica" class="form-control" placeholder="Fecha" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="cmbIdentificacionEmpleado">Identifiación Empleado</label>
                        <select class="form-control" name="cmbIdentificacionEmpleado" id="cmbIdentificacionEmpleado" required>
                            <option value="">Seleccione empleado</option>
                        </select>
                    </div>
                    <div id="divHoras">
                        
                        
                    </div>
                <button type="submit" class="btn btn-primary" name="btnRegistrarAgendaMedica" id="btnRegistrarAgendaMedica"> Crear Agenda</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    // Trae las horas de la tabla hora_20 de la BD
    $.post('<?php echo URL_BASE; ?>horas/listarHoras', {}, function (data) {
        var datos = JSON.parse(data);
        var cont = 0;
        $.each(datos, function (i, v) {
            cont++;
                $('#divHoras').append("<label><input type='checkbox' name='chk[]' value='"+v.idhora_20+"'/> "+v.hora+"  </label> ");
        });
    });
    
     $.post('<?php echo URL_BASE; ?>empleados/listarEmpleados', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbIdentificacionEmpleado').append('<option value="' + v.idEmpleado + '">' + v.numeroIdentificacionEmpleado + '</option>');
        });
    });
</script>

