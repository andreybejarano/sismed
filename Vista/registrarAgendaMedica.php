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
                        <label for="cmbIdentificacionEmpleado">Identifiación Medico</label>
                        <select class="form-control" name="cmbIdentificacionEmpleado" id="cmbIdentificacionEmpleado" maxlength="20" required>
                            <option value="">Seleccione medico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbConsultorio">Consultorio</label>
                        <select class="form-control" name="cmbConsultorio" id="cmbConsultorio" maxlength="20" required>
                            <option value="">Seleccione Consultorio</option>
                        </select>
                    </div>
                    <div id="divHoras">
                    </div>
                <button type="submit" class="btn btn-primary" name="btnRegistrarAgendaMedica" id="btnRegistrarAgendaMedica"> Crear Agenda </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL_BASE; ?>Vista/js/registrarAgendaMedica.js"></script>