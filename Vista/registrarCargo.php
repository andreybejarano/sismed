<div id="modalRegistrarCargo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Cargo</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'cargos/insertarCargo'; ?>">
                    <div class="form-group">
                        <label for="txfDescipcionCargo">Descripcion Cargo</label>
                        <input type="text" id="txfDescipcionCargo" name="txfDescipcionCargo" class="form-control" placeholder="Descripcion Cargo " required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarCargo" id="btnRegistrarCargo"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</script>
