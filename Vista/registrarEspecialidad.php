<div id="modalRegistrarEspecialidad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Especialidad</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'especialidades/insertarEspecialidad'; ?>">
                    <div class="form-group">
                        <label for="txfDescipcionEspecialidad">Descripcion Especialidad</label>
                        <input type="text" id="txfDescipcionEspecialidad" name="txfDescipcionEspecialidad" class="form-control" placeholder="Descripcion Especialidad " required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarEspecialidad" id="btnRegistrarEspecialidad"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</script>
